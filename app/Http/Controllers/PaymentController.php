<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{



    public function checkout()
    {

    }
    public function create_payment(Request $request)
    {

    }



    public function vnpay_payment()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('clients.login')->withErrors('Bạn cần đăng nhập để thực hiện thanh toán.');
        }


        $orderID = session()->get('order_id');

        $order = Order::find($orderID);

        if (!$order) {
            return redirect()->route('clients.cart')->withErrors('Không tìm thấy đơn hàng.');
        }
        $minAmount = 10000;
        $maxAmount = 10000000;

        if ($order->total_amount < $minAmount || $order->total_amount > $maxAmount) {
            return redirect()->route('clients.cart')->withErrors('Số tiền thanh toán không hợp lệ. Số tiền phải nằm trong khoảng từ ' . number_format($minAmount) . ' đến ' . number_format($maxAmount) . ' VND.');
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('clients.vnpay_return');
        $vnp_TmnCode = env('VNP_TMNCODE');
        $vnp_HashSecret = env('VNP_HASHSECRET'); // Chuỗi bí mật

        $vnp_TxnRef = $order->id; // ID của đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng #' . $vnp_TxnRef;
        $vnp_OrderType = 'Order';
        $vnp_Amount = $order->total_amount * 100; // Số tiền (VND)
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            return response()->json(['code' => '00', 'message' => 'success', 'data' => $vnp_Url]);
        }
    }


    public function vnpay_return(Request $request)
    {

        $user = $request->user();
        $order = Order::find($request->order_id);

        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $vnp_HashSecret = env('VNP_HASHSECRET');

        $vnp_Data = $request->except('vnp_SecureHash');
        ksort($vnp_Data);
        $vnp_Data = http_build_query($vnp_Data);
        $vnp_SecureHashCheck = hash_hmac('sha512', $vnp_Data, $vnp_HashSecret);

        $status = 'fail';

        if ($vnp_SecureHash === $vnp_SecureHashCheck) {
            $orderId = $request->input('vnp_TxnRef');
            $order = Order::find($orderId);

            if ($order) {

                $order->status = 'paid';
                $order->save();


                Payment::create([
                    'transaction_id' => $request->input('vnp_TxnRef'),
                    'user_id' => $order->user_id,
                    'money' => $order->total_amount,
                    'note' => 'Thanh toán đơn hàng #' . $order->id,
                    'vnp_response_code' => $request->input('vnp_ResponseCode'),
                    'code_vnpay' => $request->input('vnp_TxnRef'),
                    'code_bank' => $request->input('vnp_BankCode'),
                    'time' => now(),
                ]);

                session()->forget('cart');

                // Mail::to($user->email)->send(new PaymentSuccess($user, $order));

                $status = 'success';
                $result = [
                    'vnp_TxnRef' => $order->id,
                    'vnp_Amount' => $order->total_amount * 100,
                    'vnp_OrderInfo' => 'Thanh toán đơn hàng #' . $order->id,
                    'items' => $order->items
                ];
            }
        }

        return view('client.cart.payment_result', [
            'status' => $status,
            'result' => $result ?? []
        ]);
    }





}

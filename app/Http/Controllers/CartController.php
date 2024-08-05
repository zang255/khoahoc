<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function buyNow(Request $request)
    {
        $user = Auth::user();


        $courseId = $request->input('course_id');
        $course = Course::findOrFail($courseId);


        $subtotal = $course->price; 
        $shipping = 0;
        $total = $subtotal + $shipping;


        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        OrderDetail::create([
            'order_id' => $order->id,
            'course_id' => $course->id,
            'price' => $course->price,
        ]);

        session()->put('order_id', $order->id);
        session()->put('total_amount', $total);


        // return redirect()->route('client.cart.checkout')
        // ->with([
        //     'order_id' => $order->id,
        //     'total_amount' => $total,
        // ]);
        return view('client.cart.checkout', compact('total', 'order'));
    }
    public function checkout()
    {
        $user = Auth::user();

        $cart = session()->get('cart', []);
        $subtotal = array_sum(array_column($cart, 'course_price'));
        $shipping = 0;
        $total = $subtotal + $shipping;


        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $total,
            'status' => 'pending',
        ]);


        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'course_id' => $item['course_id'],

                'price' => $item['course_price'],
            ]);
        }


        session()->put('order_id', $order->id);
        session()->put('total_amount', $total);

        return view('client.cart.checkout', compact('cart', 'subtotal', 'shipping', 'total', 'user', 'order'));
    }



    public function showCart()
    {

        $total = 0;
        $subtotal = 0;

        // session()->put('cart');
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            $subtotal += $item['course_price'];
        }

        $shipping = 0;
        $total = $subtotal + $shipping;

        return view('client.cart.index', compact('cart', 'total', 'shipping', 'subtotal'));
    }
    public function addToCart(Request $request)
    {




        $course_id = $request->input('course_id');

        $course = Course::query()->findOrFail($course_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$course_id])) {
            session()->flash('loi', 'Khoá học đã tồn tại trong giỏ hàng');
        } else {
            $cart[$course_id] = [
                'course_id' => $course_id,
                'course_title' => $course->title,
                'course_price' => $course->price,
                'course_img' => $course->img_thumb,
                'instructor' => $course->instructor->name

            ];
        }

        session()->put('cart', $cart);
        session()->flash('thong_bao', 'Thêm vào giỏ hàng thành công');

        return redirect()->back();
    }
    public function updateToCart(Request $request)
    {
        $cartNew = $request->input('cart', []);

        session()->put('cart', $cartNew);
        return redirect()->back();
        // return redirect()->route('clients.checkout');

    }
}

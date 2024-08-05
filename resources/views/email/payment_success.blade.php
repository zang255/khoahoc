<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán thành công</title>
</head>
<body>
    <h1>Cảm ơn bạn đã mua khoá {{ $userName }}!</h1>
    <p>Đơn hàng của bạn đã được xử lý thành công. Dưới đây là chi tiết:</p>
    <ul>
        {{-- @foreach($order->items as $item)
            <li>{{ $item->title }} - {{ $item->duration }} x ${{ $item->price }}</li>
        @endforeach --}}
    </ul>
    <p>Tổng cộng: ${{ $orderDetails->total }}</p>
    <p>Chúng tôi hy vọng bạn sẽ hoàn thành tốt khoá học</p>
</body>
</html>

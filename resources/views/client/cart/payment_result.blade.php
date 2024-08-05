<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả Thanh toán</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Kết quả Thanh toán</h1>
        
        @if($status==='success')
            <div class="alert alert-success">
                <strong>Thành công!</strong> Thanh toán của bạn đã được xử lý thành công.
            </div>
            <p><strong>Mã giao dịch:</strong> {{ $result['vnp_TxnRef'] }}</p>
            <p><strong>Số tiền:</strong> {{ number_format($result['vnp_Amount'] / 100, 0, ',', '.') }} VND</p>
            <p><strong>Thông tin đơn hàng:</strong> {{ $result['vnp_OrderInfo'] }}</p>
        @else
            <div class="alert alert-danger">
                <strong>Thất bại!</strong> Có lỗi xảy ra trong quá trình thanh toán. Vui lòng thử lại.
            </div>
        @endif
        
        <a href="{{ route('clients.home') }}" class="btn btn-primary">Về Trang Chủ</a>
    </div>
</body>
</html>

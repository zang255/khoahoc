@extends('client.master')

@section('header')
    @include('client.partials.header')
@endsection

@section('content')
    <main>
        <!-- breadcrumb start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">Cửa hàng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- checkout start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- Thông tin thanh toán -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin thanh toán</h5>
                            <div class="billing-form-wrap">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">Họ Tên</label>
                                                <input type="text" id="f_name" placeholder="Tên"
                                                    value="{{ $user->name ?? '' }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Địa chỉ Email</label>
                                        <input type="email" id="email" placeholder="Email"
                                            value="{{ $user->email ?? '' }}" required />
                                    </div>


                                    <div class="single-input-item">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" id="phone" placeholder="Số điện thoại"
                                            value="{{ $user->phone ?? '' }}" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Chi tiết đơn hàng -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Tóm tắt đơn hàng</h5>
                            <div class="order-summary-content">
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                <tr>
                                                    <td>{{ $item['course_title'] }} <strong> × 1</strong></td>
                                                    <td>{{ number_format($item['course_price'], 0, '', '.') }}đ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Tổng phụ</td>
                                                <td><strong>{{ number_format($subtotal, 0, '', '.') }}đ</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển</td>
                                                <td>Miễn phí</td>
                                            </tr>
                                            <tr>
                                                <td>Tổng cộng</td>
                                                <td><strong>{{ number_format($total, 0, '', '.') }}đ</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán online</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Thanh toán bằng tài khoản VNP</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Tôi đã đọc và đồng ý với <a
                                                    href="index.html">điều khoản</a>.</label>
                                        </div>
                                        <div style="display: flex">
                                            <form action="{{ route('clients.vnpay_payment') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id}}">
                                                <input type="hidden" name="amount" value="{{ $total }}">
                                                <button type="submit" class="btn btn-sqr" name="redirect">Thanh
                                                    toán</button>
                                            </form>
                                            <button type="button" class="btn btn-sqr" onclick="history.back()"
                                                style="margin-left: 50px">Quay lại</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
@endsection

@section('footer')
    @include('client.partials.footer')
@endsection

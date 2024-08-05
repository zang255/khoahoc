@extends('client.master')

@section('header')
    @include('client.partials.header')
@endsection

@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('clients.updateToCart') }}" method="post">
                                @csrf

                                <!-- Cart Table Area -->
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Ảnh</th>
                                                <th class="pro-title">Khoá học</th>
                                                <th class="pro-price">Giá</th>
                                                <th class="pro-quantity">Giảng viên</th>
                                                <th class="pro-subtotal">Tổng</th>
                                                <th class="pro-remove">Xoá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr>
                                                    <td class="pro-thumbnail"><img src="{{ asset($item['course_img']) }}"
                                                            alt="" width="100px">
                                                        <input type="hidden" name="cart[{{ $key }}][course_img]"
                                                            value="{{ $item['course_img'] }}">

                                                    </td>
                                                    <td class="pro-title">
                                                        <a href="{{ route('clients.courses.show', $key) }}">{{ $item['course_title'] }}
                                                        </a>
                                                        <input type="hidden" name="cart[{{ $key }}][course_title]"
                                                            value="{{ $item['course_title'] }}">
                                                    </td>
                                                    <td class="pro-price">
                                                        <span>{{ number_format($item['course_price'], 0, '', '.') }}</span>đ

                                                        <input type="hidden" name="cart[{{ $key }}][course_price]"
                                                            value="{{ $item['course_price'] }}">
                                                    </td>
                                                    <td>{{ $item['instructor'] }}

                                                        <input type="hidden" name="cart[{{ $key }}][instructor]"
                                                            value="{{ $item['instructor'] }}">
                                                    </td>
                                                    <td class="pro-subtotal">
                                                        <span>{{ number_format($item['course_price'], 0, '', '.') }}</span>đ

                                                    </td>
                                                    <td class="pro-remove" data-price="{{ $item['course_price'] }}"><a
                                                            href="#"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Cart Update Option -->
                                <div class="cart-update-option d-block d-md-flex justify-content-between">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code" />
                                            <button class="btn btn-sqr">Áp dụng</button>
                                        </form>
                                    </div>
                                    <div class="cart-update">
                                        <button type="submit" class="btn btn-sqr">Cập nhật giỏ hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Tổng đơn hàng</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Giá đơn hàng</td>
                                                <td class="sub-total">{{ $subtotal }}<span>đ</span></td>
                                            </tr>
                                            <tr>
                                                <td>Tiền ship</td>
                                                <td class="shipping">{{ $shipping }}<span>đ</span></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng</td>
                                                <td class="total-amount">{{ $total }}<span>đ</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="{{ route('clients.checkout') }}" class="btn btn-sqr d-block">Thanh toán</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img1.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img2.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img3.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img4.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img5.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img1.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img2.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img3.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img4.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="{{ asset('assets/cart/img/product/product-details-img5.jpg') }}"
                                            alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/12/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                        nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!-- JS
                        ============================================ -->
@endsection

@section('js')
    <script>
        // Hàm cập nhật tổng giỏ hàng
        function updateTotal() {
            var subTotal = 0;
            // Tính tổng số tiền của các khóa học trong giỏ hàng
            $('.pro-subtotal span').each(function() {
                var price = parseFloat($(this).text().replace(/\./g, '').replace('đ', ''));
                subTotal += price;
            });

            // Cập nhật giá trị tổng
            $('.sub-total').text(subTotal.toLocaleString() + 'đ');
            var shipping = parseFloat($('.shipping').text().replace('đ', ''));
            var total = subTotal + shipping;
            $('.total-amount').text(total.toLocaleString() + 'đ');
        }

        // Xóa khóa học khỏi giỏ hàng
        $('.pro-remove a').on('click', function(event) {
            event.preventDefault();
            var $row = $(this).closest('tr');
            $row.remove();
            updateTotal(); // Cập nhật tổng giỏ hàng sau khi xóa
        });

        // Cập nhật tổng giỏ hàng ban đầu
        updateTotal();
    </script>
@endsection

@section('footer')
    @include('client.partials.footer')
@endsection

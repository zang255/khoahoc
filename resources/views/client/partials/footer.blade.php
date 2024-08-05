
@section('footer')
  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Mentor</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Số 108, Đường Adam</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Điện thoại:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Liên kết hữu ích</h4>
          <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Về chúng tôi</a></li>
            <li><a href="#">Dịch vụ</a></li>
            <li><a href="#">Điều khoản dịch vụ</a></li>
            <li><a href="#">Chính sách bảo mật</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Dịch vụ của chúng tôi</h4>
          <ul>
            <li><a href="#">Thiết kế web</a></li>
            <li><a href="#">Phát triển web</a></li>
            <li><a href="#">Quản lý sản phẩm</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Thiết kế đồ họa</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Bản tin của chúng tôi</h4>
          <p>Đăng ký nhận bản tin của chúng tôi để nhận thông tin mới nhất về các sản phẩm và dịch vụ!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Đăng ký"></div>
            <div class="loading">Đang tải</div>
            <div class="error-message"></div>
            <div class="sent-message">Yêu cầu đăng ký của bạn đã được gửi. Cảm ơn bạn!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Bản quyền</span> <strong class="px-1 sitename">Mentor</strong> <span>Đã đăng ký bản quyền</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Thiết kế bởi <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>
@endsection

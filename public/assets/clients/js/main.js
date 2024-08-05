/**
* Template Name: Mentor
* Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
* Updated: Jun 29 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

})();
(function($) {
  "use strict";

  /*-------------------------------------
Background image
-------------------------------------*/
  $("[data-bg-image]").each(function() {
      var img = $(this).data("bg-image");
      $(this).css({
          backgroundImage: "url(" + img + ")"
      });
  });

  /*-------------------------------------
  After Load All Content Add a Class
  -------------------------------------*/
  window.onload = addNewClass();

  function addNewClass() {
      $('.fxt-template-animation').imagesLoaded().done(function(instance) {
          $('.fxt-template-animation').addClass('loaded');
      });
  }

  /*-------------------------------------
  Toggle Class
  -------------------------------------*/
  $(".toggle-password").on('click', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });

  /*-------------------------------------
  Youtube Video
  -------------------------------------*/
  if ($.fn.YTPlayer !== undefined && $("#fxtVideo").length) {
      $("#fxtVideo").YTPlayer({ useOnMobile: true });
  }

  /*-------------------------------------
  Vegas Slider
  -------------------------------------*/
  if ($.fn.vegas !== undefined && $("#vegas-slide").length) {
      var target_slider = $("#vegas-slide"),
          vegas_options = target_slider.data('vegas-options');
      if (typeof vegas_options === "object") {
          target_slider.vegas(vegas_options);
      }
  }

  /*-------------------------------------
  OTP Form (Focusing on next input)
  -------------------------------------*/
  $("#otp-form .otp-input").keyup(function() {
      if (this.value.length == this.maxLength) {
          $(this).next('.otp-input').focus();
      }
  });

  /*-------------------------------------
Social Animation
-------------------------------------*/
  $('#fxt-login-option >ul >li').hover(function() {
      $('#fxt-login-option >ul >li').removeClass('active');
      $(this).addClass('active');
  });

  /*-------------------------------------
  Preloader
  -------------------------------------*/
  $('#preloader').fadeOut('slow', function() {
      $(this).remove();
  });

  /*-------------------------------------
  Multi Steps
  -------------------------------------*/
  var current_fs, next_fs, previous_fs; //form
  var opacity;
  var current = 1;
  var steps = $(".fxt-form-step").length;

  $('.fxt-current-step').html(current);
  $('.fxt-total-step').html(steps);

  setProgressBar(current);

  $(".next").on('click', function(e) {
      e.preventDefault();
      current_fs = $(this).parents(".fxt-form-step");
      next_fs = $(this).parents(".fxt-form-step").next();

      //show the next step
      next_fs.show();
      //hide the current step with style
      current_fs.animate({ opacity: 0 }, {
          step: function(now) {
              // for making step appear animation
              opacity = 1 - now;

              current_fs.css({
                  'display': 'none',
                  'position': 'relative'
              });
              next_fs.css({ 'opacity': opacity });
          },
          duration: 500
      });
      setProgressBar(++current);

      $('.fxt-current-step').html(current);
  });

  $(".previous").click(function() {

      current_fs = $(this).parents(".fxt-form-step");
      previous_fs = $(this).parents(".fxt-form-step").prev();

      //show the previous step
      previous_fs.show();

      //hide the current step with style
      current_fs.animate({ opacity: 0 }, {
          step: function(now) {
              // for making step appear animation
              opacity = 1 - now;

              current_fs.css({
                  'display': 'none',
                  'position': 'relative'
              });
              previous_fs.css({ 'opacity': opacity });
          },
          duration: 500
      });
      setProgressBar(--current);
      $('.fxt-current-step').html(current);
  });

  function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
          .css("width", percent + "%")
  }

})(jQuery);
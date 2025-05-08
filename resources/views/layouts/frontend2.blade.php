<html class="no-js" lang="en">



<head>

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Science Clinic Project</title>

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">



  <!-- favicon

		============================================ -->

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico')}}">



  <!-- Google Fonts

		============================================ -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



  <!-- Color Swithcer CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/color-switcher.css')}}">



  <!-- Fontawsome CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css')}}">



  <!-- Metarial Iconic Font CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/material-design-iconic-font.min.css')}}">



  <!-- Bootstrap CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{ asset('front/css/bootstrap-select.min.css')}}">



  <!-- Plugins CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/plugins.css')}}">



  <!-- Style CSS

		============================================ -->

  <link rel="stylesheet" href="{{asset('front/main.css')}}">



  <!-- Color CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/color.css')}}">



  <!-- owl.carousel.css

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css')}}">



  <!-- Responsive CSS

		============================================ -->

  <link rel="stylesheet" href="{{ asset('front/css/responsive.css')}}">



  <!-- Modernizr JS

		============================================ -->



  <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css') }}">

  <!-- Color Css Files

		============================================ -->

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-two.css')}}" title="color-two" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-one.css')}}" title="color-one" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-three.css')}}" title="color-three" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-four.css')}}" title="color-four" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-five.css')}}" title="color-five" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-six.css')}}" title="color-six" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-seven.css')}}" title="color-seven" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-eight.css')}}" title="color-eight" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-nine.css')}}" title="color-nine" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-ten.css')}}" title="color-ten" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/color-ten.css')}}" title="color-ten" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/pattren1.css')}}" title="pattren1" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/pattren2.css')}}" title="pattren2" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/pattren3.css')}}" title="pattren3" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/pattren4.css')}}" title="pattren4" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/pattren5.css')}}" title="pattren5" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/background1.css')}}" title="background1" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/background2.css')}}" title="background2" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/background3.css')}}" title="background3" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/background4.css')}}" title="background4" media="screen" />

  <link rel="alternate stylesheet" type="text/css" href="{{ asset('front/switcher/background5.css')}}" title="background5" media="screen" />
  <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css')}}" />

  @yield('page-css')
  <style type="text/css">
    .subMm
    {
      display: flex !important; flex-direction: column; flex-wrap: wrap; width: max-content !important; height: 100vh; overflow: auto;
    }
    .fixedHeader{
      position: fixed; top: 0; left: 0; z-index: 9999999; width: 100%; background-color: #fff;
    }
    .newHeader
    {
      width: 100%; background-color:#107dc2; color: #fff; padding: 8px; font-size: 17px;
    }
    .htBtn
    {
      border-radius: 20px;
      padding: 12px 24px;
      background-color: #314d59;
      color: #fff;
      text-decoration: none;
    }
/*    */
@media all and (min-width: 992px) {
  .dropdown-menu {
    width: 13rem;
  }
  .mega-submenu {
    left: 100%;
    top: 0;
    min-width: 25rem;
  }
  .ktm-mega-menu {
    position: static;
  }
  .mega-menu {
    left: 0;
    right: 0;
    width: 100%;
  }
  .dropdown-menu li {
    position: relative;
  }
  .dropdown-menu .submenu {
    display: none;
    left: 100%;
    top: 0;
  }
  .dropdown-menu>li:hover>.submenu,
  .dropdown:hover>.dropdown-menu {
    display: block;
  }
}
  </style>
</head>



<body>

  @include('frontend.elements.header_front2')



  @yield('content')

  @include('frontend.elements.footer_front2')





  <script src="{{ asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>



  <!-- popper JS

		============================================ -->

  <script src="{{ asset('front/js/popper.min.js')}}"></script>



  <!-- bootstrap JS

		============================================ -->

  <script src="{{ asset('front/js/bootstrap.min.js')}}"></script>



  <!-- AJax Mail JS

		============================================ -->

  <script src="{{ asset('front/js/ajax-mail.js')}}"></script>



  <!-- plugins JS

		============================================ -->

  <script src="{{ asset('front/js/plugins.js')}}"></script>



  <!-- StyleSwitch JS

		============================================ -->

  <script src="{{ asset('front/js/styleswitch.js')}}"></script>



  <!-- owl carousel Js

		============================================ -->

  <script src="{{ asset('front/js/owl.carousel.js')}}"></script>



  <!-- main JS

		============================================ -->

  <script src="{{ asset('front/js/main.js')}}"></script>



  <script type='text/javascript' src="{{asset('assets/js/widgets.js')}}" defer></script>





  <script src="{{ asset('front/js/bootstrap-select.min.js')}}"></script>
  <script src="{{ asset('front/js/vendor/modernizr-2.8.3.min.js')}}"></script>
  <script src="{{ asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js') }}"></script>
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  @yield('page-js')

  <script>
    toastr.options.closeButton = false;

    toastr.options.tapToDismiss = false;

    toastr.options = {

      "closeButton": false,

      "debug": false,

      "newestOnTop": false,

      "progressBar": false,

      "positionClass": "toast-top-right",

      "preventDuplicates": false,

      "onclick": null,

      "showDuration": "300",

      "hideDuration": "1000",

      "timeOut": "3000",

      "extendedTimeOut": 0,

      "showEasing": "swing",

      "hideEasing": "linear",

      "showMethod": "fadeIn",

      "hideMethod": "fadeOut",

      "tapToDismiss": false

    };
    $('.numberCls').keypress(function(event) {
      if (event.keyCode < 48 || event.keyCode > 57) {
        event.preventDefault();
      }
    });
    $('.numberCls').bind("cut copy paste", function(e) {
      e.preventDefault();
    });
    $(document).ready(function() {

      $("#overlays").click(function() {

        $(".mobile-show.active").removeClass("active");

      });

    });



    $('.header-search').on('click', function() {

      $('.search').toggleClass('open');

      return false;

    });



    function imgError(image) {

      image.onerror = "";

      image.src = "{{asset('img/noimage.jpg')}}";

      return true;

    }
    window.addEventListener("resize", function () {
  "use strict";
  window.location.reload();
});
document.addEventListener("DOMContentLoaded", function () {
  /////// Prevent closing from click inside dropdown
  document.querySelectorAll(".dropdown-menu").forEach(function (element) {
    element.addEventListener("click", function (e) {
      e.stopPropagation();
    });
  });
  // make it as accordion for smaller screens
  if (window.innerWidth < 992) {
    // close all inner dropdowns when parent is closed
    document
      .querySelectorAll(".navbar .dropdown")
      .forEach(function (everydropdown) {
        everydropdown.addEventListener("hidden.bs.dropdown", function () {
          // after dropdown is hidden, then find all submenus
          this.querySelectorAll(".submenu").forEach(function (everysubmenu) {
            // hide every submenu as well
            everysubmenu.style.display = "none";
          });
        });
      });
    document.querySelectorAll(".dropdown-menu a").forEach(function (element) {
      element.addEventListener("click", function (e) {
        let nextEl = this.nextElementSibling;
        if (nextEl && nextEl.classList.contains("submenu")) {
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          console.log(nextEl);
          if (nextEl.style.display == "block") {
            nextEl.style.display = "none";
          } else {
            nextEl.style.display = "block";
          }
        }
      });
    });
  }
  // end if innerWidth
});
// DOMContentLoaded  end

  </script>


</body>



</html>
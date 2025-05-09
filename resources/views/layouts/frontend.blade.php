<html class="no-js" lang="en">



<head>

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Science Clinic – Achieve Academic Excellence with Expert Tuition</title>

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">



  <!-- favicon

		============================================ -->

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico')}}">



  <!-- Google Fonts

		============================================ -->

<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->

<link href="https://db.onlinewebfonts.com/c/0825e48b888e2966c14f17034b133d07?family=Gordita-Regular" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


 {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
 <link rel="stylesheet" href="{{ asset('css/app.css') }}">


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

  <link rel="stylesheet" href="{{asset('front/main-v2.css')}}">
  <link rel="stylesheet" href="{{asset('front/custome.css')}}">

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
    @media (max-width: 991px) {  /* Adjust the max-width as needed */
      .hide-on-mobile {
          display: none;
      }
  }
  </style>
</head>



<body>

  @include('frontend.elements.header_front')



  @yield('content')

  @include('frontend.elements.footer_front')





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
  </script>


</body>



</html>

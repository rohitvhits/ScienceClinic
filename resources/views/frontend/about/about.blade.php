@extends('layouts.frontend')
@section('content')
<!--Main Wrapper Start-->
<div class="as-mainwrapper">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <div id="header"></div>
        <!--End of Header Area-->
        <!--Background Area Start-->


        <!-- <div class="backgrount-area bg-chemistry  full-grayoverlay" style="background-image: linear-gradient(45deg, rgb(45 62 80 / 60%),rgb(45 62 80 / 60%)),url(./img/svg/science-clinic-private-tutors-about-us.png);"> -->
        <div class="banner-content padding-headsection-small">
            <!-- <div class="container">  -->
            <div>
                <div>
                    <div class="position-relative">
                    <div class="about-main">
                            <img src="./img/svg/science-clinic-private-tutors-about-us.png" alt="">
                            <div class="about-overlay">
                                
                            </div>
                            <div class="about-main-center-hero">
                            <div class="text-content text-center">
                                    <h1 class="title1 text-center mb-20 ml-0">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight">Helping your child fulfil</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> their potential</span>
                                    </h1>
                                    <div class="banner-readmore custom-bannerread wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="https://php8.appworkdemo.com/ScienceClinic/public/contact">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- <div>
                            <div class="text-content-wrapper full-width about-small-text position-absolute">
                                <div class="text-content text-center">
                                    <h1 class="title1 text-center mb-20 ml-0">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight">Helping your child fulfil</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> their potential</span>
                                    </h1>
                                    <div class="banner-readmore custom-bannerread wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="{{url('contact')}}">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="backgrount-area bg-chemistry  full-grayoverlay" style="background-image: linear-gradient(45deg, rgb(45 62 80 / 60%),rgb(45 62 80 / 60%)),url(./img/svg/science-clinic-private-tutors-about-us.png);">

                                    </div> -->
                        <!-- <div class="about-small-img" style="background-image: linear-gradient(45deg, rgb(45 62 80 / 60%),rgb(45 62 80 / 60%)),url(./img/svg/science-clinic-private-tutors-about-us.png);">

                        </div> -->
                    </div>
                    <!-- <div class="text-content-wrapper full-width">
                                    <div class="text-content text-center">
                                        <h1 class="title1 text-center mb-20">
                                            <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight">Helping your child fulfil</span>
                                            <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> their potential</span>
                                        </h1>
                                        <div class="banner-readmore custom-bannerread wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                            <a class="button-default" href="contact.html">CONTACT US</a>
                                        </div>
                                    </div>
                                </div> -->
                </div>
            </div>
            <!-- </div> -->
        </div>
        <!-- </div> -->


        <!--About Area Start-->
        @foreach ($about as $val)
        <div class="welcome-about-area">
            <div class="container">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-about-text about-detail">
                            <h4 class="text-center">our Story</h4>
                            <p>
                                {{ $val->content1 }}
                            </p>



                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="welcome-video about-img">
                    <img src="img/svg/about.jpg" alt="">

                </div> -->
        </div>
        <!--End of About Area-->


        <!--Course Area Start-->
        <div class="gray-bgs about-personalize">
            <div class="container">
                <div class="row flex-direct-about">
                    <div class="col-lg-6 col-md-12 res-mb-40">
                        <div>

                            <img src="{{ asset('uploads/about/1661753743630c598f5aa83.jpg') }}">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 res-mb-40">
                        <div class="qualified-text">
                            <div class="qualified-details">
                                {!! $val->content2 !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        <!-- description details end -->
        <!-- English Testimonials area Start-->
        <!-- English Testimonials area End-->


        @include('frontend.subject_offer.subject_offer')

        @include('frontend.testimonial.testmonial')

        <!--Footer Area Start-->
        <div id="footer"></div>
        <!--End of Footer Area-->
    </div>
    <!--End of Bg White-->
</div>
<!--End of Main Wrapper Area-->
@endsection
@section('page-js')
<script>
    $('.testimonial-english').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        autoHeight: true,
        margin: 10,
        nav: true,
        navText: ["<img src='{{ asset('front/img/svg/left-arrow-test.png') }}'>",
            "<img src='{{ asset('front/img/svg/right-arrow-test.png') }}'>"
        ],
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>
@endsection
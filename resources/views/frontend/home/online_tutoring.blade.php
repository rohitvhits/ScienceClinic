@extends('layouts.frontend')
@section('content')
<!--Main Wrapper Start-->
<div class="as-mainwrapper">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <div id="header"></div>
        <!--End of Header Area-->
        <!--background Area Start-->
        <div class="backgrount-area bg-bilology full-grayoverlay">
            <div class="banner-content padding-headsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper text-center full-width">
                                <div class="text-content text-center-content">
                                    <h1 class="title1 text-center max-englishtext mb-20 remove-border">
                                        <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Inspiring Online Tutoring</span>
                                    </h1>
                                    <p>Our tutors prefer to use online platforms that they are already familiar with
                                        like Zoom, Microsoft Teams, Skype, google classroom and Merithub Tutoring Software to deliver the
                                        lessons. Tutors are permitted to use the online platform of their choice to
                                        deliver their lessons but all lessons must be scheduled using Science Clinic
                                        booking System.
                                    </p>
                                    <div class="banner-readmore">
                                    <a class="button-default inline" target="_blank" href="https://scienceclinic-co-uk.zoom.us/signin#/login">Login to your Lesson</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of background Area-->


        <!--About Area Start-->
        <div class="english-abc">
            <div class="container">
                <div class="row" style="flex-direction: row-reverse;">
                    <div class="col-lg-6 col-md-6">
                        <div class="bio-img">
                            <img src="{{asset('front/img/svg/new-image.png')}}" style="object-fit: contain;" class="img-sci-bios" alt="bio-text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="qualified-text">
                            <div class="single-item-text">
                                <h4 class="mb-3">Interactive learning in your home
                                </h4>
                            </div>
                            <div class="qualified-details">
                                <p>Our online tutoring interactive white board was carefully chosen with the help of
                                    our students and tutors, and features everything you need for a smooth,
                                    interactive learning experience. Share screens, swap files, and make notes on
                                    the virtual whiteboard - it’s the perfect tool for online learning.</p>
                                <p>
                                    We also use Microsoft teams, Zoom and Google meet to deliver our virtual lessons
                                    depending on the tutor’s preference.
                                </p>
                            </div>
                            <div class="banner-readmore">
                                <a class="button-default inline" target="_blank" href="{{route('tutors')}}">Book A lesson
                                    with a Tutor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of About Area-->
        @include('frontend.subject_offer.subject_offer')
        @include('frontend.testimonial.testmonial')
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
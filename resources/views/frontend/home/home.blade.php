@extends('layouts.frontend')
@section('content')

<!--Main Wrapper Start-->
<div class="as-mainwrapper ptcls">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <div id="header"></div>
        <!--End of Header Area-->
        <div class="hero-banner-main-video">
            <div class="owl-carousel owl-theme text_carousel">
                <div class="item">
                    <div class="hero-video">
                    <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-3-min.jpg')}}">
                
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="title1 text-center mb-20">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                    </h1>
                                    <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-video">
                            <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-1-min.jpg')}}">
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="title1 text-center mb-20">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                    </h1>
                                    <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-video">
                            <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-2-min.jpg')}}">
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="title1 text-center mb-20">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                    </h1>
                                    <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-video">
                            <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-4.jpg')}}">
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="title1 text-center mb-20">
                                        <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                        <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                    </h1>
                                    <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                        <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Background Area Start-->
        <!-- <div class="background-area pt-0 video-area no-animation res-owl-slider">
            <div class="video-banner text-center ">
            </div>

            <div class="banner-content banner-content2 home-maincontent static-text player">
                <div class="owl-carousel owl-theme text_carousel">
                    <div class="item">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-3-min.jpg')}}">
                        <div class="text-content-wrapper custom-video-text full-width mac-content-wrapper">
                            <div class="text-content text-center">
                                <h1 class="title1 text-center mb-20">
                                    <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                    <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                </h1>
                                <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                    <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-1-min.jpg')}}">
                        <div class="text-content-wrapper custom-video-text full-width mac-content-wrapper">
                            <div class="text-content text-center">
                                <h1 class="title1 text-center mb-20">
                                    <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                    <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                </h1>
                                <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                    <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-2-min.jpg')}}">
                        <div class="text-content-wrapper custom-video-text full-width mac-content-wrapper">
                            <div class="text-content text-center">
                                <h1 class="title1 text-center mb-20 pb-0">
                                    <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                    <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                </h1>
                                <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                    <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-4.jpg')}}">
                        <div class="text-content-wrapper custom-video-text full-width mac-content-wrapper">
                            <div class="text-content text-center">
                                <h1 class="title1 text-center mb-20">
                                    <span class="tlt block" data-in-effect="rollIn" data-out-effect="fadeOutRight"> Fully qualified UK teachers to unlock your child’s</span>
                                    <span class="tlt block" data-in-effect="fadeInLeftBig" data-out-effect="fadeOutRight"> potential!</span>
                                </h1>
                                <div class="banner-readmore wow bounceInUp" data-wow-duration="2500ms" data-wow-delay=".1s">
                                    <a class="button-default" href="{{route('find-tutor')}}">Find a Tutor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!--End of Background Area-->
    <!--About Area Start-->
    <div class="english-abc res-pb-0">
        <div class="container">
            <div class="row">
                <div class="website">
                    <div class="row m-0 align-items-center revers-colum">
                        <div class="col1 col-md-6">
                            <div class="product-details-content product-top-uk product-details-content-2 res-pt-0">
                                <div class="section-title-wrapper test">
                                    <div class="section-title">
                                        <p>Tutoring made easy by our UK trained teachers! </p>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <p>We are a team of teachers that came together for a common cause which is teaching. </p>
                                    <p>We boost your child’s confidence and better the grades at any level of their education.
                                    </p>
                                    <p>Inquire today and receive first class tutoring from our tutor experts. There is no
                                        difficult Subject with us.</p>
                                </div>
                            </div>

                        </div>
                        <div class="col2 col-md-6">
                            <div class="product-details-image tap-setion tap-setion-2">
                                <img src="{{asset('front/img/svg/home1.jpg')}}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ------------ -->
                <div class="website">
                    <div class="row m-0 align-items-center">
                        <div class="col2 col-md-6">
                            <div class="product-details-image tap-setion  tap-setion-2">
                                <img src="{{asset('front/img/svg/home2.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col1 col-md-6">
                            <div class="product-details-content product-top-uk bark-p product-details-content-2 res-pb-0">
                                <div class="section-title-wrapper test">
                                    <div class="section-title">
                                        <p>Tutoring Tailored to your Needs!
                                        </p>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <p>Our qualified teachers are experts in 1:1 online & face–to–face tutoring across a huge
                                        range of subjects and levels, from primary, through to GCSE & A-Level. They’ll work with
                                        you to understand how your child learns
                                        best and help you achieve the results you’re looking for. We follow the national
                                        curriculum
                                    </p>
                                </div>
                                <a href='https://www.bark.com/en/gb/company/science-clinic-private-tutoring-ltd/akN3G/' target='_blank' class='bark-widget bark-img' data-type='reviews' data-id='akN3G' data-image='medium-navy' data-version='3.0'>Science Clinic Private Tutoring Ltd</a>
                                <div>
                                    <p class="mt-3">Please click the above icon to view our feedback and reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of About Area-->

    <!--End of Course Area--> 
    <div class="testimonial-area p-0 res-testimonial-area tutor-slide-btn">
        <div class="container">
            <div class="product-details-content product-top-uk product-details-content-2 res-pt-0">
                <div class="section-title-wrapper test mb-50px">
                    <div class="section-title">
                        <p>Meet some of our tutors!</p>
                    </div>
                </div>
            </div>
            <section class="shop-grid-area pb-testimonials">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="tutor-slide">
                            <div class="owl-carousel owl-theme hero_carousel">
                                @foreach($allTutors as $value)
                                <div class="item">
                                    <a href="{{route('tutors-details',sha1($value->id))}}">
                                        <div class="single-product-item">
                                            <div class="single-product-image">
                                                <img src="{{$value->profile_photo}}">
                                            </div>
                                            <div class="single-product-text">
                                                <h4 class="testing-user"> {{$value->first_name}} @if(isset($value->subject_name))- {{Str::limit($value->subject_name, 20)}}@endif</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!--End of Testimonial Area-->
    <div class="english-abc res-pb-0">
        <div class="container">
            <div class="row">
                <div class="website">
                    <div class="row m-0 align-items-center">
                        <div class="col2 col-md-6">
                            <div class="product-details-image tap-setion tap-setion-2">
                                <img src="{{asset('front/img/svg/home3.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col1 col-md-6">
                            <div class="product-details-content product-top-uk product-details-content-2">
                                <div class="section-title-wrapper test">
                                    <div class="section-title">
                                        <p>Flexible tutoring around your schedule!
                                        </p>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <p>We offer a flexible range of tutoring options to easily fit around your child’s schedule.
                                        with lessons available between 10 and 9 pm including weekends! With online tutoring, you
                                        get to choose between the best tutors
                                        across the whole of the UK, and you’re not bound by location. If you live closer to your
                                        chosen tutor and the tutor is ok with it, we can arrange some face-to-face tutoring.</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- ------------ -->
            </div>
        </div>
    </div>
    <!-- ------------ -->
    <!--Event Area Start-->
    <div class="event-area custom-topbottompd gray gray-bgs res-pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper test">
                        <div class="section-title">
                            <h3 class="mb-4">Complimenting your child’s school learning</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <h5>We work with several exam boards including:
                        </h5>
                        <ul class="pearson-text">
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Pearson Edexcel </li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">AQA (Assessment &
                                Qualification Alliance) </li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">OCR (Oxford, Cambridge and
                                RSA Exams)</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Cambridge</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">WJEC (Welsh Joint
                                Examinations Committee).</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Scottish Curriculum</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Qualifications in Northern
                                Ireland (QualsNI) – Northern Ireland Curriculum</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Slider Area Start-->
                    <div class="logo-slider">
                        <div class="owl-carousel owl-theme testimonial-text child-text">
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child1.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child2.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child3.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child4.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child5.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child6.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child7.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child8.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child9.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child10.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="child1">
                                    <div class="child-img">
                                        <img src="{{asset('front/img/svg/child11.png')}}" class="child1-img" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--End of Slider Area-->
                </div>
                <div class="col-md-12">
                    <div class="you-can-teach">
                        <p>You can be sure that what we teach, compliments their school education and is in line
                            with their school curriculum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Event Area-->
    <!-- column section start-->
    <div class="description-data event-pd home-event-pd">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="paper-section">
                        <div class="paper-card">
                            <div class="paper-body">
                                <div class="paper-flex">
                                    <!-- <h5 class="mb-3">AQA – GCSE (9-1) Biology Topics covered
                                        </h5> -->
                                </div>
                                <div id="accordion">
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingOne">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Description of Teaching levels in England and Wales
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row padding-paper">
                                                    <div class="col-md-12 col-paper">
                                                        <div class="qualified-details">
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS1 - Years 1, 2 & 3
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS2 - Years 4, 5 & 6
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS3 - Years 7 & 8
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS4 (GCSE) – Years 9,10 & 11
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS5 (A-level) – Years 12 & 13
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingOne-two">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne-two" aria-expanded="true" aria-controls="collapseOne-two">
                                                    Description of Teaching levels in Scotland
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseOne-two" class="collapse" aria-labelledby="headingOne-two" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row padding-paper">
                                                    <div class="col-md-12 col-paper">
                                                        <div class="qualified-details">
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">National 5 (N5) – Equivalent
                                                                    to GCSE in England
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">Scottish Highers – Equivalent to A-levels in England
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">S1 – S6 (Equivalent to Y8 – Y13 in England)
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">P1 – P7 (Primary School
                                                                    Education in England) – KS1 & KS2

                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="paper-section mt-60">
                        <div class="paper-card">
                            <div class="paper-body">
                                <div class="paper-flex">
                                    <!-- <h5 class="mb-3">Comparing the education system in all 4 nations in the UK (Primary, Secondary &
                                            College).
                                        </h5> -->
                                </div>
                                <div id="accordion">
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingtwo">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    Comparing the education system in all 4 nations in the UK (Primary, Secondary &
                                                    College).
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="comparing-table">
                                                    <table class="table table-hover ">
                                                        <thead>
                                                            <tr>
                                                                <th class="compare-width">Age during school year</th>
                                                                <th class="compare-width"><a href="" class="green-atag">England</a> and <a href="" class="green-atag">Wales</a>: National Curriculum (plus Foundation Phase in
                                                                    Wales)
                                                                </th>
                                                                <th class="compare-width"><a href="" class="green-atag">Northern Ireland</a>: Curriculum
                                                                </th>
                                                                <th class="compare-width"><a href="" class="green-atag">Scotland</a>: Curriculum for
                                                                    Excellence
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">4-5</th>
                                                                <td>Reception </td>
                                                                <td>Year 1 </td>
                                                                <td>(Nursery)</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5-6</th>
                                                                <td>Year 1 </td>
                                                                <td>Year 2</td>
                                                                <td>P1</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">6-7</th>
                                                                <td>Year 2 </td>
                                                                <td>Year 3 </td>
                                                                <td>P2</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">7-8 </th>
                                                                <td>Year 3 </td>
                                                                <td>Year 4 </td>
                                                                <td>P3
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">8-9 </th>
                                                                <td>Year 4 </td>
                                                                <td>Year 5</td>
                                                                <td>P4</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">9-10 </th>
                                                                <td>Year 5</td>
                                                                <td>Year 6</td>
                                                                <td>P5</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">10-11 </th>
                                                                <td>Year 6 </td>
                                                                <td>Year 7 </td>
                                                                <td>P6
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">11-12</th>
                                                                <td>Year 7</td>
                                                                <td>Year 8</td>
                                                                <td>P7</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">12-13 </th>
                                                                <td>Year 8</td>
                                                                <td>Year 9 </td>
                                                                <td>S1</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">13-14 </th>
                                                                <td>Year 9 </td>
                                                                <td>Year 10</td>
                                                                <td>S2

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">14-15</th>
                                                                <td>Year 10</td>
                                                                <td>Year 11 </td>
                                                                <td>S3
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">15-16 </th>
                                                                <td>Year 11 </td>
                                                                <td>Year 12 </td>
                                                                <td>S4</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="levels-table" colspan="4">A-Levels and SCE Highers </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">16-17</th>
                                                                <td>Year 12 </td>
                                                                <td>Year 13 </td>
                                                                <td>S5

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">17-18 </th>
                                                                <td>Year 13</td>
                                                                <td>Year 14</td>
                                                                <td>S6</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- column section end-->

    @include('frontend.subject_offer.subject_offer')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col1 col-md-12">
                    <div class="product-top-uk product-details-content-2">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <p>Associations</p>
                            </div>
                        </div>
                        <div class="product-details">
                            <p>Science Clinic Private Tutoring is proud to be associated with the following organisations… </p>

                        </div>
                        <div class="">
                            <div class="owl-carousel owl-theme associations-text child-text">

                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://connect.collins.co.uk/school/portal.aspx" target="_black"><img src="{{asset('front/img/associations/a-img-1.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.10ticks.co.uk/" target="_black"><img src="{{asset('front/img/associations/img2.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.pearsonschoolsandfecolleges.co.uk/secondary/activelearn" target="_black"><img src="{{asset('front/img/associations/img3.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://connect.collins.co.uk/school/portal.aspx" target="_black"><img src="{{asset('front/img/associations/img4.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.exampro.co.uk/" target="_black"><img src="{{asset('front/img/associations/img5.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://integralmaths.org/" target="_black"><img src="{{asset('front/img/associations/img6.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://global.oup.com/education/secondary/kerboodle/?region=uk" target="_black"><img src="{{asset('front/img/associations/img7.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.mathletics.com/uk/" target="_black"><img src="{{asset('front/img/associations/img8.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.risingstars-uk.com/" target="_black"><img src="{{asset('front/img/associations/img9.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://global.oup.com/education/?region=uk" target="_black"><img src="{{asset('front/img/associations/img10.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.mymaths.co.uk/" target="_black"><img src="{{asset('front/img/associations/img11.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>

                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="javascript:void(0)" target="_black"><img src="{{asset('front/img/associations/img12.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.hoddereducation.co.uk/dynamic-learning" target="_black"><img src="{{asset('front/img/associations/img13.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.hoddereducation.co.uk/alevelmaths" target="_black"><img src="{{asset('front/img/associations/img14.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="javascript:void(0)" target="_black"><img src="{{asset('front/img/associations/tutors-association.png')}}" class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div id="footer"></div>
</div>


<!--End of Bg White-->

</div>
<!--End of Main Wrapper Area-->

<!-- Color Switcher -->
<div class="ec-colorswitcher">
    <a class="ec-handle" href="#"><i class="zmdi zmdi-settings"></i></a>
    <h3>Style Switcher</h3>
    <div class="ec-switcherarea">
        <h6>Select Layout</h6>
        <div class="layout-btn">
            <a href="#" class="ec-boxed"><span>Boxed</span></a>
            <a href="#" class="ec-wide"><span>Wide</span></a>
        </div>
        <h6>Chose Color</h6>
        <ul class="ec-switcher">
            <li>
                <a href="#" class="cs-color-1 styleswitch" data-rel="color-one"></a>
            </li>
            <li>
                <a href="#" class="cs-color-2 styleswitch" data-rel="color-two"></a>
            </li>
            <li>
                <a href="#" class="cs-color-3 styleswitch" data-rel="color-three"></a>
            </li>
            <li>
                <a href="#" class="cs-color-4 styleswitch" data-rel="color-four"></a>
            </li>
            <li>
                <a href="#" class="cs-color-5 styleswitch" data-rel="color-five"></a>
            </li>
            <li>
                <a href="#" class="cs-color-6 styleswitch" data-rel="color-six"></a>
            </li>
            <li>
                <a href="#" class="cs-color-7 styleswitch" data-rel="color-seven"></a>
            </li>
            <li>
                <a href="#" class="cs-color-8 styleswitch" data-rel="color-eight"></a>
            </li>
            <li>
                <a href="#" class="cs-color-9 styleswitch" data-rel="color-nine"></a>
            </li>
            <li>
                <a href="#" class="cs-color-10 styleswitch" data-rel="color-ten"></a>
            </li>
        </ul>
        <div class="ec-pattren">
            <h6>Chose Pattren</h6>
            <div class="pattren-wrap">
                <a href="#" data-rel="pattren1" class="styleswitch"><img src="{{asset('front/img/ec-pattren/pattren1.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren2" class="styleswitch"><img src="{{asset('front/img/ec-pattren/pattren2.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren3" class="styleswitch"><img src="{{asset('front/img/ec-pattren/pattren3.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren4" class="styleswitch"><img src="{{asset('front/img/ec-pattren/pattren4.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren5" class="styleswitch"><img src="{{asset('front/img/ec-pattren/pattren5.jpg')}}" alt=""></a>
            </div>
        </div>
        <div class="ec-background">
            <h6>Chose Background</h6>
            <div class="background-wrap">
                <a href="#" data-rel="background1" class="styleswitch"><img src="{{asset('front/img/ec-background/bg-1.jpg')}}" alt=""></a>
                <a href="#" data-rel="background2" class="styleswitch"><img src="{{asset('front/img/ec-background/bg-2.jpg')}}" alt=""></a>
                <a href="#" data-rel="background3" class="styleswitch"><img src="{{asset('front/img/ec-background/bg-3.jpg')}}" alt=""></a>
                <a href="#" data-rel="background4" class="styleswitch"><img src="{{asset('front/img/ec-background/bg-4.jpg')}}" alt=""></a>
                <a href="#" data-rel="background5" class="styleswitch"><img src="{{asset('front/img/ec-background/bg-5.jpg')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- Color Switcher end -->


<!-- jquery
		============================================ -->
<script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>

<!-- popper JS
		============================================ -->
<script src="{{asset('front/js/popper.min.js')}}"></script>

<!-- bootstrap JS
		============================================ -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

<!-- AJax Mail JS
		============================================ -->
<script src="{{asset('front/js/ajax-mail.js')}}"></script>

<!-- plugins JS
		============================================ -->
<script src="{{asset('front/js/plugins.js')}}"></script>

<!-- StyleSwitch JS
		============================================ -->
<script src="{{asset('front/js/styleswitch.js')}}"></script>

<!-- owl carousel Js
		============================================ -->
<script src="{{asset('front/js/owl.carousel.js')}}"></script>

<!-- main JS
		============================================ -->
<script src="{{asset('front/js/main.js')}}"></script>

<script src="{{asset('assets/js/widgets.js')}}"></script>

<script>
    $('.hero_carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        autoHeight: true,
        margin: 15,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2200,

        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })

    $('.testimonial-text').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 1500,
        // navText: ["<img src='./img/svg/left-arrow-test.png'>", "<img src='./img/svg/right-arrow-test.png'>"],
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

    $('.associations-text').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 1950,
        // navText: ["<img src='./img/svg/left-arrow-test.png'>", "<img src='./img/svg/right-arrow-test.png'>"],
        dots: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
    $('.text_carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        autoplay: true,
        autoplayTimeout: 16000,
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
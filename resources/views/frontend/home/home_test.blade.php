@extends('layouts.frontend')
@section('page-css')
<link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">
<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />
<style type="text/css">
.m-scroll {
    display: flex;
    position: relative;
    width: 100%;
    /* height: 80px; */
    margin: auto;
    /* background-color: #fff; */
    overflow: hidden;
    z-index: 1;
}

.m-scroll__title {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
    height: 100%;
    white-space: nowrap;
    transition: all 1s ease;
}

.m-scroll__title>div {
    display: flex;
    -webkit-animation: scrollText 50s infinite linear;
    animation: scrollText 50s infinite linear;
}

.testimonialstars img.empty {
    background-color: white;  /* White background for empty stars */
    filter: grayscale(100%);  /* Optional: to make the empty stars look more subtle */
}

.m-scroll__title>div:hover {
    animation-play-state: paused;
}

.m-scroll__title>.logosSlider {
    display: flex;
    -webkit-animation: scrollText 17s infinite linear;
    animation: scrollText 17s infinite linear;
}

.m-scroll__title>.logosSlider:hover {
    animation-play-state: paused;
}

.m-scroll__title h1 {
    margin: 0 5px;
    font-size: 30px;
    color: #ffffff;
    transition: all 2s ease;
    background-color: #083B5C;
    min-height: 100px;
    display: flex;
    align-items: center;
    min-width: 250px;
    justify-content: center;
    padding: 0 2rem;
}

.m-scroll__title a {
    text-decoration: none;
    color: white;
    /* margin: 0px 30px; */
    text-transform: capitalize;
    transition: all 500ms ease;
}

.m-scroll__title a:hover {
    transform: scale(1.1);
}

/*div:hover {
  animation-play-state: paused;
}*/
@-webkit-keyframes scrollText {
    from {
        transform: translateX(0%);
    }

    to {
        transform: translateX(-50%);
    }
}

@keyframes scrollText {
    from {
        transform: translateX(0%);
    }

    to {
        transform: translateX(-50%);
    }
}

.container-form {
    background-color: #107dc2;
    color: white;
    padding: 20px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.group-form {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    width: auto;
}

.forms {
    padding: 10px;
}

.forms label {
    color: #fff;
    font-size: 16px;
    font-weight: bold;
}

.container-form button {
    width: 140px;
    text-align: center;
    padding: 10px 0px;
    border: none;
    border-radius: 20px;
    background-color: white;
    color: black;
    font-weight: bold;
}

.container-form button:hover {
    background-color: black;
    color: white;
    cursor: pointer;
}

.bootstrap-select>.dropdown-toggle {
    min-width: 255px;
}

.filter-option-inner-inner {
    padding-left: 10px;
}

.container-2 {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 50px;
}

.container-2 .section-txt {
    width: 40%;
}

.container-2 .section-txt h3 {
    color: #107dc2;
    font-size: 30px;
    font-weight: bold;
    margin: 20px 0;
}

.container-2 .img {
    width: 40%;
    padding: 30px;

}

.container-2 .img img {
    width: 100%;
    height: 90%;
    padding: 20px;
}

@media screen and (max-width: 767px) {
    .group-form {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto;
        flex-direction: column;
    }

    .container-2 {
        padding: 20px;
        flex-direction: column;
    }

    .container-2 .section-txt {
        width: 100%;
    }

    .container-2 .img {
        width: 100%;
        padding: 0;
    }

    .container-2 .img img {
        padding: 10px;
    }

    .section-3 .container-items {
        flex-direction: column;
    }

    .section-3 .container-items .box {
        width: 100%;
        padding: 0;
        margin: 5px;
        align-items: flex-start;
    }
}

.bootstrap-select .dropdown-menu {
    width: 95%;
}
</style>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection
@section('content')
<!--Main Wrapper Start-->
<div class="as-mainwrapper ptcls">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <div id="header"></div>
        <!--End of Header Area-->
        <div class="hero-banner-main-video">
            <div class="owl-carousel owl-theme text_carousel owl-fade">
                <div class="item">
                    <div class="hero-video">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-1-min.jpg')}}">
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="title1 text-center mb-20">
                                        Fully Qualified UK Teachers To Unlock <br /> Your Child’s Potential!
                                    </h1>
                                    <div class="banner-readmore">
                                        <a class="slider_btn" href="{{route('find-tutor')}}">Find a Tutor</a>
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
                                        We teach all exam boards including:
                                    </h1>
                                    <div class="div_lastSlideBtn justify-center">
                                        <a target="_blank" href="https://qualifications.pearson.com/en/home.html"
                                            class="lastSlideBtn">Edexcel</a>
                                        <a target="_blank" href="https://www.ocr.org.uk/" class="lastSlideBtn">OCR</a>
                                        <a target="_blank" href="https://www.wjec.co.uk/" class="lastSlideBtn">WJEC</a>
                                    </div>
                                    <div class="div_lastSlideBtn justify-between mt-4">
                                        <a target="_blank" href="https://www.aqa.org.uk/" class="lastSlideBtn">AQA</a>
                                        <a target="_blank" href="https://www.cambridgeinternational.org/about-us/"
                                            class="lastSlideBtn">Cambridge</a>
                                    </div>
                                    <div class="banner-readmore">
                                        <a class="slider_btn" href="{{route('find-tutor')}}">Find a Tutor</a>
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
                                    <h1 class="title1 text-center mb-20">We teach all subjects at GCSE, A-level,
                                        KS3,<br /> Primary (KS2 & 1) and 11 Plus to fulfil your<br /> child’s dream.
                                    </h1>
                                    <div class="banner-readmore">
                                        <a class="slider_btn" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-video">
                        <img src="{{asset('front/img/home/SCIENCE-CLINIC-HOME-PAGE-3-min.jpg')}}">
                        <div class="hero-custom-center">
                            <div class="text-content-wrapper custom-video-text full-width">
                                <div class="text-content text-center hero-carousel-title">
                                    <h1 class="text-center mb-20">Qualified Teachers in Maths,<br />English and Sciences
                                    </h1>
                                    <div class="banner-readmore">
                                        <a class="slider_btn" href="{{route('find-tutor')}}">Find a Tutor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="m-scroll">
            <div class="m-scroll__title">
                <div>
                    @foreach($subject_list as $subject)
                    <h1>
                        <a href="{{ $subject->url }}">{{ \Illuminate\Support\Str::lower($subject->main_title) }}</a>
                    </h1>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="find-tutor">
        <img class="vectorImg" src="{{asset('front/img/newimages/findPartVector.png')}}" alt="">
        <div class="find-tutor-group-form">
            <div class="find-tutor-forms">
                <label for="subject">Subject Required</label>
                <select id="subject" class="selectpicker " data-id="subject" name="subject" id="subject"
                    aria-label="Default select example" data-live-search="true" required>
                    <option value="">Select Subject</option>
                    @foreach ($subject_list as $val)
                    <option value="{{$val->url}}">{{$val->main_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="find-tutor-forms">
                <label for="level">Level Required</label>
                <select id="level" class="selectpicker " data-id="level" name="level" id="level"
                    aria-label="Default select example" data-live-search="true" required>
                    <option value="">Select Level</option>
                    @foreach ($allLevelData as $val)
                    <option value="<?= rtrim(strtr(base64_encode($val->title), '+/', '-_'), '='); ?>">
                        {{$val->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="find-tutor-forms">
                <button class="btn btn-primary" type="button" onclick="searchHome()">Find a Tutor</button>
            </div>
        </div>
    </section>
    <section class="tutoring_section">
        <div class="mainBox">
            <div class="box">
                <h1>Tutoring made easy by our UK trained teachers!</h1>
                <div class="contain">
                    <p>Get expert help from qualified educators who make learning simple, effective, and stress-free and
                        know how to get results. Our tutoring is effective, flexible, and built for success. All our
                        tutors
                        are UK-trained teachers and make tutoring easy, enjoyable and tailored to your child's needs. We
                        boost your child’s confidence and better the grades at any level of their education. Inquire
                        today
                        and receive first class tutoring from our tutor experts. There is no difficult Subject with us.
                    </p>
                    <img class="innerImg" src="{{asset('front/img/newimages/sciencelabImg.png')}}" alt="">
                </div>
            </div>
            <img class="outerImg" src="{{asset('front/img/svg/home1.jpg')}}" alt="">
        </div>
    </section>
    <section class="tutoringTailored">
        <div class="mainBox">
            <div class="box">
                <h1>Tutoring Tailored to your Needs!</h1>
                <div class="contain">
                    <p>Our qualified teachers are experts in 1-2-1 online & face–to–face tutoring across a huge range of
                        subjects and levels, from primary, through to GCSE & A-Level. They’ll work with you to
                        understand how your child learns best and help them achieve the results you’re looking for. We
                        follow the UK national curriculum. Our high profile trained teachers offer Personalised &
                        customised lessons tailored to the child’s goals, pace and learning style adapted to your
                        child’s needs.</p>
                    <div class="reviewBox">
                        <img src="{{asset('front/img/newimages/reviewStar.png')}}" alt="">
                        <img src="{{asset('front/img/newimages/arrowVector.png')}}" alt="">
                        <div class="rightBox">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <p>Please click the above icon to view our feedback and reviews</p>
                        </div>
                    </div>
                </div>
            </div>
            <img class="innerImg" src="{{asset('front/img/newimages/teachingimg.png')}}" alt="">
            <img class="outerImg" src="{{asset('front/img/newimages/supportCall.png')}}" alt="">
        </div>
    </section>
    <section class="tutoring_section lastOne">
        <div class="mainBox">
            <div class="box">
                <h1>Flexible tutoring around your schedule!</h1>
                <div class="contain">
                    <p> We offer a flexible range of tutoring options to easily fit around your child’s schedule.
                        Lessons are available between 10 am and 9 pm during the week including weekends! With online
                        tutoring, you get to choose between the best tutors across the whole of the UK, and you’re not
                        bound by location. If you live closer to your chosen tutor and the tutor is ok with it, we can
                        arrange some face-to-face tutoring. We offer Personalised lessons to all our students anytime,
                        anywhere and our lessons are designed to fit your routine.</p>
                    <img class="innerImg" src="{{asset('front/img/newimages/flexibleTutoring.png')}}" alt="">
                </div>
            </div>
            <img class="outerImg" src="{{asset('front/img/newimages/eLearning.png')}}" alt="">
        </div>
    </section>
    <!-- <div class="english-abc res-pb-0">
        <div class="container">
            <div class="row">
                <div class="website">
                    <div class="row m-0 align-items-center revers-colum">
                        <div class="col1 col-md-6" data-aos="fade-right">
                            <div class="product-details-content product-top-uk product-details-content-2 res-pt-0">
                                <div class="section-title-wrapper test">
                                    <div class="section-title">
                                        <p>Tutoring made easy by our UK trained teachers! </p>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <p>We are a team of teachers that came together for a common cause which is
                                        teaching. </p>
                                    <p>We boost your child’s confidence and better the grades at any level of their
                                        education.
                                    </p>
                                    <p>Inquire today and receive first class tutoring from our tutor experts. There is
                                        no
                                        difficult Subject with us.</p>
                                </div>
                            </div>

                        </div>
                        <div class="col2 col-md-6" data-aos="fade-left">
                            <div class="product-details-image tap-setion tap-setion-2">
                                <img src="{{asset('front/img/svg/home1.jpg')}}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="website">
                    <div class="row m-0 align-items-center">
                        <div class="col2 col-md-6" data-aos="fade-right">
                            <div class="product-details-image tap-setion  tap-setion-2">
                                <img src="{{asset('front/img/svg/home2.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col1 col-md-6" data-aos="fade-left">
                            <div
                                class="product-details-content product-top-uk bark-p product-details-content-2 res-pb-0">
                                <div class="section-title-wrapper test">
                                    <div class="section-title">
                                        <p>Tutoring Tailored to your Needs!
                                        </p>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <p>Our qualified teachers are experts in 1:1 online & face–to–face tutoring across a
                                        huge
                                        range of subjects and levels, from primary, through to GCSE & A-Level. They’ll
                                        work with
                                        you to understand how your child learns
                                        best and help you achieve the results you’re looking for. We follow the national
                                        curriculum
                                    </p>
                                </div>
                                <a href='https://www.bark.com/en/gb/company/science-clinic-private-tutoring-ltd/akN3G/'
                                    target='_blank' class='bark-widget bark-img' data-type='reviews' data-id='akN3G'
                                    data-image='medium-navy' data-version='3.0'>Science Clinic Private Tutoring Ltd</a>
                                <div>
                                    <p class="mt-3">Please click the above icon to view our feedback and reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--End of About Area-->
    <section class="whyChoose">
        <div class="section-3">
            <div class="container-fluid">
                <div class="title" data-aos="fade-in">
                    <h1>WHY CHOOSE SCIENCE CLINIC?</h1>
                    <p>Our tutors are fully qualified teachers, experienced and understand the UK curriculum.
                        We tailor each session to your child’s pace, strengths, and goals—no one-size-fits-all lessons
                        here.</p>
                </div>
                <div class="container-items">
                    <div class="box" data-aos="fade-in">
                        <!-- <i class="zmdi zmdi-graduation-cap"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="110" height="109" viewBox="0 0 110 109"
                            fill="none">
                            <g clip-path="url(#clip0_1420_45271)">
                                <path
                                    d="M18.6485 43.6L55 65.4L109.5 32.7L55 0L0.5 32.7H55V43.6H18.6485ZM0.5 43.6V87.2L11.4 75.101V50.14L0.5 43.6ZM55 109L27.75 92.65L16.85 86.11V53.41L55 76.3L93.15 53.41V86.11L55 109Z"
                                    fill="#083B5C" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1420_45271">
                                    <rect width="109" height="109" fill="white" transform="translate(0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <h3>Qualified Teachers</h3>
                        <p>We support every level of the education system in unlocking true potential and achieving
                            academic success.</p>
                    </div>
                    <div class="box" data-aos="fade-out">
                        <!-- <i class="zmdi zmdi-male-alt"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="108" height="108" viewBox="0 0 108 108"
                            fill="none">
                            <path
                                d="M45 99V67.5H36V40.5C36 38.025 36.882 35.907 38.646 34.146C40.41 32.385 42.528 31.503 45 31.5H63C65.475 31.5 67.5945 32.382 69.3585 34.146C71.1225 35.91 72.003 38.028 72 40.5V67.5H63V99H45ZM54 27C51.525 27 49.407 26.1195 47.646 24.3585C45.885 22.5975 45.003 20.478 45 18C44.997 15.522 45.879 13.404 47.646 11.646C49.413 9.88803 51.531 9.00603 54 9.00003C56.469 8.99403 58.5885 9.87603 60.3585 11.646C62.1285 13.416 63.009 15.534 63 18C62.991 20.466 62.1105 22.5855 60.3585 24.3585C58.6065 26.1315 56.487 27.012 54 27Z"
                                fill="#083B5C" />
                        </svg>
                        <h3>Tutor-Pupil Matching Service</h3>
                        <p>Simply share your requirements with Science Clinic, and we will connect you with the right
                            tutor for your child. If you are not satisfied, we will assign an alternative tutor at any
                            time.</p>
                    </div>
                    <div class="box" data-aos="fade-in">
                        <!-- <i class="zmdi zmdi-accounts"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="109" height="109" viewBox="0 0 109 109"
                            fill="none">
                            <path
                                d="M44.4652 73.4523L44.4584 73.4319L43.164 73.0095C37.0079 70.8336 31.607 66.9342 27.6043 61.7757C24.3675 57.6077 22.1435 52.7446 21.1076 47.5701C20.0717 42.3955 20.2523 37.0511 21.6351 31.9583C23.0179 26.8655 25.5651 22.1636 29.0758 18.2236C32.5865 14.2835 36.9646 11.2131 41.8649 9.25438C46.7651 7.29571 52.0535 6.50239 57.3127 6.93701C62.572 7.37163 67.6584 9.02229 72.1706 11.7588C76.6829 14.4953 80.4976 18.2428 83.3139 22.7057C86.1302 27.1686 87.871 32.2248 88.399 37.4755C88.5829 39.349 87.0365 40.875 85.1562 40.875C83.276 40.875 81.7704 39.3421 81.5456 37.4755C80.9376 32.6579 79.0534 28.0903 76.0878 24.2453C73.1222 20.4003 69.1831 17.4175 64.678 15.6056C60.1729 13.7938 55.2655 13.2186 50.4635 13.9397C45.6616 14.6607 41.1395 16.6519 37.3652 19.707C33.591 22.7621 30.7016 26.7702 28.9961 31.3167C27.2907 35.8631 26.831 40.7827 27.6648 45.5664C28.4985 50.3501 30.5954 54.8241 33.7383 58.5255C36.8813 62.2269 40.9563 65.0213 45.5416 66.6194C46.6982 64.5099 48.562 62.8761 50.8048 62.0056C53.0476 61.1352 55.5256 61.084 57.8024 61.8611C60.0792 62.6381 62.0089 64.1935 63.2517 66.2535C64.4944 68.3134 64.9705 70.7458 64.5962 73.1223C64.2218 75.4987 63.021 77.6669 61.2052 79.2451C59.3893 80.8232 57.0749 81.7101 54.6694 81.7495C52.264 81.789 49.9217 80.9784 48.0551 79.4607C46.1885 77.9429 44.9173 75.8153 44.4652 73.4523ZM39.0629 78.732C32.3908 76.008 26.5574 71.5684 22.1543 65.8632C21.0351 67.5417 20.4377 69.5138 20.4375 71.5312V74.9375C20.4375 88.3649 33.1087 102.187 54.5 102.187C75.8913 102.187 88.5625 88.3649 88.5625 74.9375V71.5312C88.5625 68.821 87.4859 66.2218 85.5695 64.3055C83.6531 62.3891 81.0539 61.3125 78.3438 61.3125H68.125C69.5539 63.2207 70.5662 65.4077 71.0965 67.7318C71.6268 70.056 71.6633 72.4656 71.2036 74.8048C70.7439 77.144 69.7982 79.3606 68.4278 81.3112C67.0574 83.2618 65.2927 84.903 63.248 86.1286C61.2032 87.3542 58.924 88.1369 56.5577 88.4261C54.1913 88.7152 51.7907 88.5043 49.511 87.8071C47.2313 87.1099 45.1234 85.9419 43.3236 84.3786C41.5238 82.8154 40.0723 80.8917 39.0629 78.732ZM74.9375 40.875C74.9375 34.6483 72.1512 29.0689 67.7571 25.322C65.6117 23.5048 63.1144 22.1497 60.4214 21.3417C57.7284 20.5336 54.8976 20.2899 52.1061 20.6258C49.3146 20.9617 46.6225 21.87 44.198 23.2938C41.7736 24.7176 39.669 26.6263 38.0159 28.9007C36.3628 31.175 35.1967 33.7659 34.5906 36.5114C33.9846 39.257 33.9515 42.098 34.4935 44.8569C35.0356 47.6158 36.141 50.2331 37.7407 52.5453C39.3405 54.8575 41.4001 56.8147 43.7907 58.2945C46.82 55.8387 50.6003 54.4968 54.5 54.4931C58.398 54.493 62.1781 55.83 65.2092 58.2809C68.1822 56.4518 70.6372 53.8918 72.3402 50.8448C74.0431 47.7979 74.9373 44.3655 74.9375 40.875Z"
                                fill="#083B5C" />
                        </svg>
                        <h3>Personal Customer Support</h3>
                        <p>With years of experience in education, Science Clinic offers a personal touch to customer
                            service, allowing you to contact us anytime to discuss any aspect of your child’s education.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of Course Area-->
    <section class="testimonial-area">
        <div class="container-fluid">
            <!-- <div class="product-details-content product-top-uk product-details-content-2 res-pt-0">
                <div class="section-title-wrapper test mb-50px">
                    <div class="section-title" data-aos="zoom-in">
                        <p>Meet some of our tutors!</p>
                    </div>
                </div>
            </div> -->
            <div class="title" data-aos="fade-in">
                <h1>Meet Some of Our Tutors!</h1>
                <p>Discover the talented and dedicated professionals behind our lessons—each one committed to helping
                    you learn, grow, and achieve your goals with confidence.</p>
            </div>
            <div class="shop-grid-area pb-testimonials">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="tutor-slide">
                            <div class="owl-carousel owl-theme hero_carousel">
                                <!-- <script>
                                const allTutors = @json($allTutors);
                                console.log(allTutors);
                                </script> -->
                                @php $i = 0; @endphp
                                @foreach($allTutors as $value)
                                @if($i == 40)
                                @php break; @endphp
                                @endif
                                <div class="item">
                                    <a href="{{route('tutors-details',sha1($value->id))}}">
                                        <div class="single-product-item" style="border: solid 3px #107dc2;">
                                            <div class="single-product-image">
                                                <img src="{{$value->profile_photo}}">
                                            </div>
                                            <div class="single-product-text before_hover" style="border-bottom: 0;">
                                                <h4 class="testing-user"> {{$value->first_name}}
                                                    @if(isset($value->subject_name))-
                                                    {{Str::limit($value->subject_name, 20)}}@endif</h4>
                                            </div>
                                            <div class="single-product-text-after-hover after_hover">
                                                <h4 class="testing-user">
                                                    {{$value->first_name}}-{{$value->subject_name}}</h4>
                                                <span>{{$value->title}}</span>
                                                <p>{{ strip_tags($value->bio) }}</p>
                                                <button class="bookBtn">Book</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="TutorsbyLevel">
        <div class="container-fluid">
            <div class="title" data-aos="fade-in">
                <div class="info">
                    <h1>Tutors by Level</h1>
                    <p>We hand-pick tutors who specialise in the exact level your child is studying.<br />Whether it’s
                        building a strong foundation or mastering exam technique, your tutor will have the right
                        expertise for the job.</p>
                </div>
                <button class="theme-btn">
                    Online Tutors
                </button>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="{{asset('front/img/newimages/primaryTutors.png')}}" alt="">
                            <div class="tag">Primary Tutors</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="{{asset('front/img/newimages/11plusTutors.jpg')}}" alt="">
                            <div class="tag">11+ Tutors</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="{{asset('front/img/newimages/gcseTutors.jpg')}}" alt="">
                            <div class="tag">GCSE Tutors</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="{{asset('front/img/newimages/levelTutors.jpg')}}" alt="">
                            <div class="tag">A Level Tutors</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="DiscoverOurBlogs">
        <div class="container-fluid">
            <div class="title" data-aos="fade-in">
                <div class="info">
                    <h1>Discover Our Blogs</h1>
                    <p>The latest industry news and more from Private Tutors.</p>
                </div>
                <button class="theme-btn">
                    Find Out More
                </button>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @if(isset($blogList) && count($blogList) > 0)
                    @foreach ($blogList as $blog)

                    <div class="col-md-3">
                        <a href="{{route('blog-detail',($blog->id))}}">
                        <div class="img-box">
                            <img src="{{$blog->image}}" alt="">
                        </div>
                        <div class="tag">{{$blog->title ?? ""}}</div>
                        </a>
                    </div>

                    @endforeach

                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="how-we-match">
        <div class="col-md-12 p-0">
            <div class="row m-0">
                <div class="col-md-7 p-0">
                    <div class="left">
                        <h1 class="title">How We Match Students with Tutors</h1>
                        <div class="contain">
                            <p>At Science Clinic, we believe the right tutor makes all the difference. That’s why we
                                take
                                the time to match each student with a tutor who fits their academic needs, learning
                                style,
                                and personality.</p>
                            <h2>Here’s How It Works :</h2>
                            <ul>
                                <li>
                                    <b>Tell Us What You Need :</b> Whether it’s help with GCSE Biology,&nbsp; A-Level
                                    Chemistry or
                                    any other subject and level, we’ll learn about your goals, subject focus, and
                                    schedule.
                                </li>
                                <li><b>We Assess the Best Fit :</b> Based on your level and learning preferences, we
                                    select
                                    a tutor with the right expertise and teaching style.</li>
                                <li><b>Meet Your Tutor :</b> We’ll introduce you to your matched tutor and set up your
                                    first
                                    session. You can switch tutors anytime if it’s not the perfect fit—no stress!</li>
                                <li><b>Track Progress Together :</b> We regularly check in to ensure you’re seeing
                                    results,
                                    feeling confident and getting the support you need</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 p-0">
                    <div class="right">
                        <img src="{{asset('front/img/newimages/howwematch.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="container-fluid bottom">
                <div class="center">
                    <img src="{{asset('front/img/newimages/howWeMatchBanner.jpg')}}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgbox">
                            <img src="{{asset('front/img/newimages/wego1.jpg')}}" alt="">
                            <img src="{{asset('front/img/newimages/wego2.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contain-box">
                            <h1>
                                <img src="{{asset('front/img/newimages/leftquote.jpg')}}" alt="">
                                We go beyond the traditional tutoring model
                                <img src="{{asset('front/img/newimages/rightquote.jpg')}}" alt="">
                            </h1>
                            <p>We’re not just a directory of tutors where you’re left to browse and choose on your own.
                                Instead, we take a highly personalized approach to pairing students with the right
                                tutors, ensuring a meaningful and effective learning experience.
                            </p>
                            <p>
                                Our process involves two key steps. First, we meticulously build and maintain a network
                                of highly qualified, experienced and passionate online tutors. We collaborate
                                exclusively with certified educators who are experts in their fields, rigorously
                                selecting only the top talent. In fact, we accept just a small fraction of applicants,
                                ensuring your child learns from the very best.
                            </p>
                            <p>
                                Next, we take the time to understand your child’s unique needs, goals and learning
                                preferences. With this insight, we carefully match them with a tutor who is best suited
                                to help them succeed—both academically and personally. During the first session, the
                                tutor conducts an initial assessment to evaluate your child’s current skills and
                                identify areas for growth. If either you or the tutor feels the fit isn’t quite right,
                                we will reassess and find a more suitable match.
                            </p>
                            <p>
                                At Science Clinic, we act as facilitators, ensuring that both students and tutors feel
                                fully supported, comfortable and confident throughout their journey together. This
                                nurturing relationship paves the way for impressive academic progress and long-term
                                success.
                            </p>
                            <p>
                                To enhance the learning experience, we offer the option to record online sessions,
                                allowing students to revisit and reinforce their lessons whenever they need. Our ongoing
                                two-way feedback system continuously refines and optimizes the learning process. Plus,
                                our customer support team consists of experienced educators, ensuring any issues are
                                resolved quickly,&nbsp;professionally and with empathy.
                            </p>
                            <p>
                                If you believe your child could benefit from expert guidance to achieve their
                                educational goals, reach out to Science Clinic today to discover how we can help them
                                excel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="letYourChild">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <img class="bannerimg" src="{{asset('front/img/newimages/letyourchild.jpg')}}" alt="">
                            <div class="featureIcon">
                                <img class="icon" src="{{asset('front/img/newimages/camero.png')}}" alt="">
                                <img class="icon" src="{{asset('front/img/newimages/mic.png')}}" alt="">
                                <img class="icon" src="{{asset('front/img/newimages/video.png')}}" alt="">
                                <img class="icon" src="{{asset('front/img/newimages/call.png')}}" alt="">
                            </div>
                            <h2>Incredible 1-2-1 Online and In-person tutoring for all age groups tutors at unbeatable
                                prices</h2>
                            <ul>
                                <li>
                                    <img src="{{asset('front/img/newimages/lets-icons_book-check-fill.png')}}" alt="">
                                    All boards including AQA, OCR, Edexcel WJEC
                                </li>
                                <li>
                                    <img src="{{asset('front/img/newimages/lets-icons_book-check-fill.png')}}" alt="">
                                    Highly interactive lessons and personalised teaching plans
                                </li>
                                <li>
                                    <img src="{{asset('front/img/newimages/lets-icons_book-check-fill.png')}}" alt="">
                                    Ace you exams, tests and homeworks. Get ahead
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="leftpart">
                            <div class="top">
                                <h2>Let Your Child Shine</h2>
                                <div class="searchBox">
                                    <img src="{{asset('front/img/newimages/icomoon-free_search.png')}}" alt="">
                                    Find a Tutor
                                </div>
                            </div>
                            <ul class="">
                                <li>
                                    <p>Incredible Tutors</p>
                                    <span>1-on-1 Online and In-Person video tutoring with the best tutors</span>
                                </li>
                                <li>
                                    <p>Designed for your child</p>
                                    <span>Personalized learning plans. Tutors matched to your child</span>
                                </li>
                                <li>
                                    <p>Homework and tests Provided</p>
                                    <span>Parents kept up to date</span>
                                </li>
                                <li>
                                    <p>Flexible Scheduling</p>
                                    <span>Pick times/days that suit your child</span>
                                </li>
                                <li>
                                    <p>Speedy Support</p>
                                    <span>Speedy tutor support for urgent questions</span>
                                </li>
                                <li>
                                    <p>Highest Quality Tutoring</p>
                                    <span>From qualified teachers and graduates from high profile universities.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ourFeatured">
        <div class="container-fluid">
            <div class="title">
                <h2>Our Featured Tutor Videos</h2>
                <button class="exploreMore">Explore More</button>
            </div>

            <div class="m-scroll">
                <div class="m-scroll__title">
                    <div class="mainScroll">
                        @if(isset($ourFeatured) && count($ourFeatured)>0)
                        @foreach ($ourFeatured as $val)
                        <div class="ourFeatureBox">
                            <img class="mainimg" src="{{$val->image}}" alt="">
                            <p>{{$val->title}}</p>
                            <a href="{{$val->link}}" target="_blank">
                            <div class="bottom">
                                <button class="learmore">Learn More</button>
                                <img src="{{asset('front/img/newimages/logos_youtube-icon.png')}}" alt="">
                            </div>
                            </a>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inquiryForm">
        <div class="container-fluid mb-5 mt-3">
            <div class="setped">
                <div class="row">
                    <div class="col-md-6 leftpart">
                        <p>Submit your details and we will assign you a qualified teacher within 24-48 hours</p>
                        <img src="{{asset('front/img/newimages/contactimg.jpg')}}">
                    </div>
                    <div class="col-md-6 rightpart">
                        <form id="submitinquiry" method="POST" class="contact-form-area">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 title">
                                    <h3>Request your online tutor Now</h3>
                                    <img src="{{asset('front/img/newimages/starGroup.png')}}" alt="">
                                </div>
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <label for="first_name">Parent’s name<span class="text-danger"
                                            class="required-error">*</span></label>
                                    <input autocomplete="off" type="text" class="form-control mb-0 charCls"
                                        id="first_name" name="full_name" placeholder="First Name" required>
                                    <span class="text-danger" id="error_first_name"></span>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <label for="email">Email address<span class="text-danger"
                                            class="required-error">*</span></label>
                                    <input autocomplete="off" type="text" class="form-control mb-0" id="email"
                                        name="email" placeholder="Email" required>
                                    <span class="text-danger" id="error_email"></span>
                                </div>
                                <!-- <div class="col-md-12 mb-3">
                                    <div class="subject-custom">
                                        <label for="country">Country <span class="text-danger"
                                                class="required-error">*</span></label>
                                        <select id="country" class="selectpicker " data-id="country" name="country"
                                            id="country" aria-label="Default select example" data-live-search="true"
                                            required>
                                            <option value="">Select country</option>
                                            @foreach ($country_list as $val)
                                            <option value="{{ $val->id }}" @if($val->id==222) selected
                                                @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="error_country"></span>
                                    </div>
                                </div> -->
                                <div class="col-12 mb-3">
                                    <label for="phone">Phone number <span class="text-danger"
                                            class="required-error">*</span></label>
                                    <input autocomplete="off" type="text" class="form-control mb-0 numberCls" id="phone"
                                        name="phone" placeholder="Phone " maxlength="12" required>
                                    <span class="text-danger" id="error_phone"></span>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="">Subject Required</label>
                                    <select class="selectpicker " data-id="subject2" name="subject" id="subject2"
                                        aria-label="Default select example" data-live-search="true" required>
                                        <option value="">Select Subject</option>
                                        @foreach ($subject_list as $val)
                                        <option value="{{$val->id}}">{{$val->main_title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="error_subjectinquiry"></span>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="">Level Required</label>
                                    <select class="selectpicker " data-id="level2" name="level" id="level2"
                                        aria-label="Default select example" data-live-search="true" required>
                                        <option value="">Select Level</option>
                                        @foreach ($allLevelData as $val)
                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="error_level"></span>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input terms-condition" type="checkbox" name="term"
                                            value="" id="defaultCheck1">
                                        <label class="form-check-label condition-text" for="defaultCheck1">
                                            <a class="condition-text" target="_blank"
                                                href="{{url('terms-and-conditions')}}">Terms & conditions</a>
                                        </label>
                                    </div>
                                    <span class="text-danger" id="error_term"></span>
                                </div>
                                <div class="col-12 bottomBtn">
                                    <a class="theme-btn" href="javascript:void(0)" onclick="saveinquiry();">Request
                                        a Tutor</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ourServices">
        <div class="container-fluid">
            <div class="title">
                <h2>Our Services</h2>
                <p>Select a service below and contact us directly to discuss your requirements</p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service1.png')}}" alt="">
                            </div>
                            <p>Online Tuition</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service2.png')}}" alt="">
                            </div>
                            <p>Face- 2- Face Home Tuition</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service3.png')}}" alt="">
                            </div>
                            <p>GCSE Tuition</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service4.png')}}" alt="">
                            </div>
                            <p>11+ Tests</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service5.png')}}" alt="">
                            </div>
                            <p>Homeschooling</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/service6.png')}}" alt="">
                            </div>
                            <p>Online Tests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="expertTution">
        <h1 class="mainTitle">Expert Tuition</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 topleft">
                    <img class="mainBannerImg" src="{{asset('front/img/newimages/expertTutionLeft.jpg')}}" alt="">
                </div>
                <div class="col-md-6 topright">
                    <div class="containInfo">
                        <img src="{{asset('front/img/newimages/topright.png')}}" alt="">
                        <h2>How does it work?</h2>
                        <p>We pride ourselves on our speed to find the best tutor for you because we know just how
                            quickly the academic year flashes by! First, fill in our enquiry form and tell us what
                            subject(s) and level you need a tutor for. Next, one of our consultants from the office will
                            call you as soon as possible. After a free consultation, we then match you with the right
                            educator from our army of tutors. The tuition period is open and flexible and you can pause
                            or stop tuition at any time.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 bottomleft">
                    <div class="containInfo">
                        <img src="{{asset('front/img/newimages/bottomleft.png')}}" alt="">
                        <h2>How much does tuition cost?</h2>
                        <p>Our rates are very competitive and are designed to make tuition affordable for parents and
                            students.<br />The hourly rate varies depending on what subject and level you need, but we
                            will tell you
                            exactly how much tuition is per hour during the free consultation once we know what you
                            need.</p>
                        <p class="bold">Please get in touch to discuss how we can help you to succeed.</p>
                    </div>
                </div>
                <div class="col-md-6 bottomright">
                    <img class="mainBannerImg" src="{{asset('front/img/newimages/expertTutionRight.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="experiencedPrivateTutors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="leftpart">
                        <h2>Experienced Private Tutors</h2>
                        <p>We offer online, one on one have extensive experience helping students achieve their
                            potential,
                            and we provide tutoring in all core and elective subjects and across all levels, including
                            Maths, English, Science.
                            We have already helped hundreds of students in their GCSEs, AS/A-Levels, 11 Plus exam
                            preparation and SATS exam preparation.</p>
                        <button class="theme-btn">Find a Tutor</button>
                    </div>
                </div>
                <div class="col-md-6 rightpart">
                    <div class="imgbox">
                        <img class="experienced1" src="{{asset('front/img/newimages/experienced1.jpg')}}" alt="">
                        <div class="innerImgBox">
                            <img class="experienced2" src="{{asset('front/img/newimages/experienced2.jpg')}}" alt="">
                            <img class="experienced3" src="{{asset('front/img/newimages/experienced3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ourPopularSubject">
        <div class="container-fluid">
            <div class="title">
                <h2>Our Popular Subjects</h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg1.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Maths Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg2.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>English Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg3.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Physics Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg4.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Biology Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg5.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Chemistry Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg6.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Economic Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg7.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>History Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg8.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Spanish Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg9.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>French Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg10.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Finance Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg11.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>Business Studies</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mainBox">
                            <div class="servicebox">
                                <img class="mainimg" src="{{asset('front/img/newimages/ourPopularSubjectImg12.jpg')}}"
                                    alt="">
                            </div>
                            <div class="bottom">
                                <p>11+ Tuition</p>
                                <img src="{{asset('front/img/newimages/entypo_forward.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="complimenting">
        <div class="innerPartation">
            <div class="contain">
                <h2>Complimenting your child’s school learning</h2>
                <p>We work with several exam boards including:</p>
            </div>
            <div class="points">
                <ul>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">Pearson Edexcel</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">AQA (Assessment & Qualification
                        Alliance)</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">OCR (Oxford, Cambridge and RSA
                        Exams)</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">Cambridge</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">WJEC (Welsh Joint Examinations
                        Committee).</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">Scottish Curriculum</li>
                    <li><img src="{{asset('front/img/newimages/telegram.png')}}" alt="">Qualifications in Northern
                        Ireland (QualsNI) – Northern Ireland Curriculum</li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="m-scroll">
                <div class="m-scroll__title">
                    <div class="logosSlider">
                        @if(isset($logos) && count($logos) > 0)
                        @foreach ($logos as $logo)
                        @if($logo->type == "1")
                        <div class="imgbox">
                            <a href="{{$logo->link}}"><img src="{{$logo->image}}" alt=""></a>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="accordion">
                <div class="title">You can be sure that what we teach, compliments their school education and is in line
                    with their school curriculum</div>
                <div class="" id="accordion">
                    <div class="main-card mb-3">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Description of Teaching levels in England and Wales
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="biolody-ul pl-20">
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS1 -
                                        Years 1, 2 & 3
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS2 -
                                        Years 4, 5 & 6
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS3 -
                                        Years 7 & 8
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS4
                                        (GCSE) – Years 9,10 & 11
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">KS5
                                        (A-level) – Years 12 & 13
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3">
                        <div class="card-header" id="headingOne-two">
                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse"
                                data-target="#collapseOne-two" aria-expanded="true" aria-controls="collapseOne-two">
                                Description of Teaching levels in Scotland
                            </button>
                        </div>
                        <div id="collapseOne-two" class="collapse" aria-labelledby="headingOne-two"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="biolody-ul pl-20">
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">National
                                        5 (N5) – Equivalent
                                        to GCSE in England
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">Scottish
                                        Highers – Equivalent
                                        to A-levels in England
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">S1 – S6
                                        (Equivalent to Y8 –
                                        Y13 in England)
                                    </li>
                                    <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-down">P1 – P7
                                        (Primary School
                                        Education in England) – KS1 & KS2

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3">
                        <div class="card-header" id="headingtwo">
                            <p class="mb-0">
                                <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Comparing the education system in all 4 nations in the UK (Primary,
                                    Secondary &
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
                                                <th class="compare-width"><a href="" class="green-atag">England</a>
                                                    and <a href="" class="green-atag">Wales</a>: National
                                                    Curriculum (plus Foundation Phase in
                                                    Wales)
                                                </th>
                                                <th class="compare-width"><a href="" class="green-atag">Northern
                                                        Ireland</a>:
                                                    Curriculum
                                                </th>
                                                <th class="compare-width"><a href="" class="green-atag">Scotland</a>:
                                                    Curriculum for
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
                                                <th class="levels-table" colspan="4">A-Levels and SCE
                                                    Highers </th>
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
    </section>

    <section class="weOffer">
        <div class="container-fluid">
            <div class="main-box">
                <div class="innerBox">
                    <div class="sameWidth firstDiv">
                        <h1><span>Subjects</span>
                            <br>we offer
                        </h1>
                        <div class="imgBox gallery1">
                            <img src="{{asset('front/img/newimages/gallery1.png')}}" alt="">
                            <div class="hoverDiv">
                                <a href="{{route('mathematics-tuition')}}" target="_blank">
                                    Mathematics
                                </a>
                            </div>
                        </div>
                        <div class="bottomDiv">
                            <div class="yellowLayer"></div>
                            <div class="imgBox gallery2">
                                <img src="{{asset('front/img/newimages/gallery2.jpg')}}" alt="">
                                <div class="hoverDiv">
                                    <a href="{{route('spanish-tuition')}}">Modern Languages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sameWidth secoundDiv">
                        <div class="topDiv">
                            <div class="topinnerdiv">
                                <div class="blueLayer"></div>
                                <div class="imgBox gallery3">
                                    <img src="{{asset('front/img/newimages/gallery3.jpg')}}" alt="">
                                    <div class="hoverDiv">
                                        <a href="{{route('english-language-literature-tuition')}}" target="_blank">
                                            English
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="imgBox gallery4">
                                <img src="{{asset('front/img/newimages/gallery4.jpg')}}" alt="">
                                <div class="hoverDiv">
                                    <a href="{{route('physics-tuition')}}" target="_blank">Physics</a>
                                </div>
                            </div>
                        </div>
                        <div class="bottomDiv">
                            <div class="lightBlue"></div>
                            <div class="imgBox gallery5">
                                <img src="{{asset('front/img/newimages/gallery5.jpg')}}" alt="">
                                <div class="hoverDiv"><a href="{{route('primary-school')}}" target="_blank">Primary</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sameWidth thiredDiv">
                        <div class="topDiv">
                            <div class="innerTopDiv">
                                <div class="in-innerDiv">
                                    <div class="imgBox gallery6">
                                        <img src="{{asset('front/img/newimages/gallery6.jpg')}}" alt="">
                                        <div class="hoverDiv"><a href="{{route('biology-tution')}}"
                                                target="_blank">Biology</a></div>
                                    </div>
                                    <div class="blueDiv"></div>
                                </div>
                                <div class="imgBox gallery7">
                                    <img src="{{asset('front/img/newimages/gallery7.jpg')}}" alt="">
                                    <div class="hoverDiv"><a href="{{route('chemistry-tuition')}}"
                                            target="_blank">Chemistry</a></div>
                                </div>
                            </div>
                            <div class="imgBox gallery8">
                                <img src="{{asset('front/img/newimages/gallery8.jpg')}}" alt="">
                                <div class="hoverDiv"><a href="{{route('history-tuition')}}">Other Subjects</a></div>
                            </div>
                        </div>
                        <div class="bottmDiv">
                            <div class="imgBox gallery9">
                                <img src="{{asset('front/img/newimages/gallery9.jpg')}}" alt="">
                                <div class="hoverDiv"><a href="{{route('computer-science')}}" target="_blank">Computer
                                        Science</a></div>
                            </div>
                            <div class="yellowDiv"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>WHAT OUR CUSTOMERS ARE SAYING ABOUT US</h2>
        <div class="cards">
            <div class="owl-carousel owl-theme testimonial_carousel">
                @if(isset($tutorReview) && count($tutorReview) > 0)
                    @foreach ($tutorReview as $review)
                        <div class="item">
                            <div class="testimonialcard">
                                <div class="profile">
                                    <img src="{{ asset('front/img/newimages/user1.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="testimonialstars">
                                        @for($i = 1; $i <= 5; $i++)
                                            <img src="{{ asset('front/img/newimages/star.png') }}" alt=""
                                                @if($i <= $review->star)
                                                    class="filled"
                                                @else
                                                    class="empty"
                                                @endif>
                                        @endfor
                                    </div>
                                    <h3>{{ $review->parent_first_name ?? "" }}</h3>
                                    <p>{{ $review->message ?? "" }}</p>
                                    </p>
                                    <span class="date">{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>


    <section class="reviews-section">
        <div class="header">
            <div class="left">
                <h1>GOOGLE REVIEWS</h1>
                <div class="tabs">
                    <a class="active">All Reviews</a>
                    <a>Other Reviews</a>
                    <a>Google</a>
                </div>
            </div>
            <div class="right">
                <p>Science Clinic Private Tutors</p>
                <div class="starGroup">
                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                </div>
                <p><b>5.0 rating of Parents reviews</b></p>
            </div>
        </div>

        <div class="reviews-container">
            <div class="cards">
                <div class="owl-carousel owl-theme testimonial_carousel">
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Amaka Bosah</h3>
                                <p>Maths - Ms MEHRIN Mazhar<br>English - Ms Sue SCHULKINS
                                    <br>Science - Mr MEHTAB Ali
                                    <br>Thank you all so much for you input and tuition.
                                    <br>My son passed all his papers I’m grateful
                                </p>
                                <span class="date">12/01/2023 <img
                                        src="{{asset('front/img/newimages/icons_google.png')}}" alt=""></span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user2.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Amina Begum</h3>
                                <p>My son had his tuition classes from mehtaab for science. He benefitted a lot and it
                                    also helped to pick up his grades. His results are not due until august. I am
                                    enrolling my daughter as i found him very helpful. Highly recommended</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user3.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Sarah Axcell</h3>
                                <p>Hayley tutored my son in Maths to help prior to his GCSEs. She really helped him to
                                    build his confidence along with his knowledge and hopefully that will be reflected
                                    in his results in August! I would definitely recommend her to anyone who needs Maths
                                    assistance.</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user4.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Juliana</h3>
                                <p>Maths Tutoring Dajana is a wonderful Math teacher and helped my daughter through her
                                    GCSE . I would definitely recommend Dajana</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Amaka Bosah</h3>
                                <p>Maths - Ms MEHRIN Mazhar<br>English - Ms Sue SCHULKINS
                                    <br>Science - Mr MEHTAB Ali
                                    <br>Thank you all so much for you input and tuition.
                                    <br>My son passed all his papers I’m grateful
                                </p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user2.png')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Amina Begum</h3>
                                <p>My son had his tuition classes from mehtaab for science. He benefitted a lot and it
                                    also helped to pick up his grades. His results are not due until august. I am
                                    enrolling my daughter as i found him very helpful. Highly recommended</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user3.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Sarah Axcell</h3>
                                <p>Hayley tutored my son in Maths to help prior to his GCSEs. She really helped him to
                                    build his confidence along with his knowledge and hopefully that will be reflected
                                    in his results in August! I would definitely recommend her to anyone who needs Maths
                                    assistance.</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonialcard">
                            <div class="profile">
                                <img src="{{asset('front/img/newimages/user4.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <div class="testimonialstars">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                    <img src="{{asset('front/img/newimages/star.png')}}" alt="">
                                </div>
                                <h3>Juliana</h3>
                                <p>Maths Tutoring Dajana is a wonderful Math teacher and helped my daughter through her
                                    GCSE . I would definitely recommend Dajana</p>
                                <span class="date">12/01/2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="associations">
        <div class="container-fluid">
            <div class="title">
                <h1>Associations</h1>
                <p>Science Clinic Private Tutoring is proud to be associated with the following organisations…</p>
            </div>
            <div class="m-scroll">
                <div class="m-scroll__title">
                    <div class="logosSlider">
                        @if(isset($logos) && count($logos) > 0)
                        @foreach ($logos as $logo)
                        @if($logo->type == "2")
                        <div class="imgbox">
                            <a href="{{$logo->link}}"><img src="{{$logo->image}}" alt=""></a>
                        </div>
                        @endif
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="">
        <div class="container-2">
            <div class="section-txt" data-aos="fade-right">
                <div class="text">
                    <h3>How We Match Students with Tutors</h3>
                    <p>At Science Clinic, we go beyond the traditional tutoring model.</p>
                    <p>We’re not just a directory of tutors where you’re left to browse and choose on your own. Instead,
                        we take a highly personalized approach to pairing students with the right tutors, ensuring a
                        meaningful and effective learning experience.</p>
                    <p>Our process involves two key steps. First, we meticulously build and maintain a network of highly
                        qualified, experienced, and passionate online tutors. We collaborate exclusively with certified
                        educators who are experts in their fields, rigorously selecting only the top talent. In fact, we
                        accept just a small fraction of applicants, ensuring your child learns from the very best.</p>
                    <p>Next, we take the time to understand your child’s unique needs, goals, and learning preferences.
                        With this insight, we carefully match them with a tutor who is best suited to help them
                        succeed—both academically and personally. During the first session, the tutor conducts an
                        initial assessment to evaluate your child’s current skills and identify areas for growth. If
                        either you or the tutor feels the fit isn’t quite right, we will reassess and find a more
                        suitable match.</p>
                    <p>At Science Clinic, we act as facilitators, ensuring that both students and tutors feel fully
                        supported, comfortable, and confident throughout their journey together. This nurturing
                        relationship paves the way for impressive academic progress and long-term success.</p>
                    <p>To enhance the learning experience, we offer the option to record online sessions, allowing
                        students to revisit and reinforce their lessons whenever they need. Our ongoing two-way feedback
                        system continuously refines and optimizes the learning process. Plus, our customer support team
                        consists of experienced educators, ensuring any issues are resolved quickly, professionally, and
                        with empathy.</p>
                    <p>If you believe your child could benefit from expert guidance to achieve their educational goals,
                        reach out to Science Clinic today to discover how we can help them excel.</p>
                </div>
            </div>
            <div class="img">
                <div>
                    <img src="https://www.scienceclinic.co.uk/front/img/pexels-olly-3769981.jpg" alt=""
                        data-aos="fade-left">
                </div>
                <div>
                    <img src="https://www.scienceclinic.co.uk/front/img/pexels-olly-3807755.jpg" alt=""
                        data-aos="fade-left">
                </div>
            </div>
        </div>
    </section>

    <div class="english-abc res-pb-0">
        <div class="container">
            <div class="row">
                <div class="website">
                    <div class="row m-0 align-items-center">
                        <div class="col2 col-md-6">
                            <div class="product-details-image tap-setion tap-setion-2">
                                <img src="{{asset('front/img/svg/home3.jpg')}}" alt="" data-aos="fade-right">
                            </div>
                        </div>
                        <div class="col1 col-md-6">
                            <div class="product-details-content product-top-uk product-details-content-2">
                                <div class="section-title-wrapper test">
                                    <div class="section-title" data-aos="fade-left">
                                        <p>Flexible tutoring around your schedule!
                                        </p>
                                    </div>
                                </div>
                                <div class="product-details" data-aos="fade-left">
                                    <p>We offer a flexible range of tutoring options to easily fit around your child’s
                                        schedule.
                                        with lessons available between 10 and 9 pm including weekends! With online
                                        tutoring, you
                                        get to choose between the best tutors
                                        across the whole of the UK, and you’re not bound by location. If you live closer
                                        to your
                                        chosen tutor and the tutor is ok with it, we can arrange some face-to-face
                                        tutoring.</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="event-area custom-topbottompd gray gray-bgs res-pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper test" data-aos="fade-in">
                        <div class="section-title">
                            <h3 class="mb-4">Complimenting your child’s school learning</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="" data-aos="fade-right">
                        <h5>We work with several exam boards including:
                        </h5>
                        <ul class="pearson-text">
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Pearson
                                Edexcel </li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">AQA
                                (Assessment &
                                Qualification Alliance) </li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">OCR (Oxford,
                                Cambridge and
                                RSA Exams)</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Cambridge</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">WJEC (Welsh
                                Joint
                                Examinations Committee).</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Scottish
                                Curriculum</li>
                            <li><img src="{{asset('front/img/svg/right-arrow.png')}}" class="list-arrows">Qualifications
                                in Northern
                                Ireland (QualsNI) – Northern Ireland Curriculum</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="logo-slider">
                        <div class="owl-carousel owl-theme testimonial-text child-text" style="border-radius:20px">
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
                </div>
                <div class="col-md-12" data-aos="zoom-in">
                    <div class="you-can-teach">
                        <p>You can be sure that what we teach, compliments their school education and is in line
                            with their school curriculum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="description-data event-pd home-event-pd">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="paper-section">
                        <div class="paper-card">
                            <div class="paper-body">
                                <div class="paper-flex">
                                    <h5 class="mb-3">AQA – GCSE (9-1) Biology Topics covered
                                        </h5>
                                </div>
                                <div id="accordion">
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingOne" data-aos="fade-in">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed"
                                                    data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Description of Teaching levels in England and Wales
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row padding-paper">
                                                    <div class="col-md-12 col-paper">
                                                        <div class="qualified-details">
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">KS1 - Years 1, 2 & 3
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">KS2 - Years 4, 5 & 6
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">KS3 - Years 7 & 8
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">KS4 (GCSE) – Years 9,10 & 11
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">KS5 (A-level) – Years 12 & 13
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingOne-two" data-aos="fade-in">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed"
                                                    data-toggle="collapse" data-target="#collapseOne-two"
                                                    aria-expanded="true" aria-controls="collapseOne-two">
                                                    Description of Teaching levels in Scotland
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseOne-two" class="collapse" aria-labelledby="headingOne-two"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row padding-paper">
                                                    <div class="col-md-12 col-paper">
                                                        <div class="qualified-details">
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">National 5 (N5) – Equivalent
                                                                    to GCSE in England
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">Scottish Highers – Equivalent
                                                                    to A-levels in England
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">S1 – S6 (Equivalent to Y8 –
                                                                    Y13 in England)
                                                                </li>
                                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}}"
                                                                        class="list-down">P1 – P7 (Primary School
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
                                    <h5 class="mb-3">Comparing the education system in all 4 nations in the UK (Primary, Secondary &
                                            College).
                                        </h5>
                                </div>
                                <div id="accordion">
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingtwo" data-aos="fade-in">
                                            <p class="mb-0">
                                                <button class="btn btn-link custom-link-coll collapsed"
                                                    data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="true" aria-controls="collapseTwo">
                                                    Comparing the education system in all 4 nations in the UK (Primary,
                                                    Secondary &
                                                    College).
                                                </button>
                                            </p>
                                        </div>

                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="comparing-table">
                                                    <table class="table table-hover ">
                                                        <thead>
                                                            <tr>
                                                                <th class="compare-width">Age during school year</th>
                                                                <th class="compare-width"><a href=""
                                                                        class="green-atag">England</a> and <a href=""
                                                                        class="green-atag">Wales</a>: National
                                                                    Curriculum (plus Foundation Phase in
                                                                    Wales)
                                                                </th>
                                                                <th class="compare-width"><a href=""
                                                                        class="green-atag">Northern Ireland</a>:
                                                                    Curriculum
                                                                </th>
                                                                <th class="compare-width"><a href=""
                                                                        class="green-atag">Scotland</a>: Curriculum for
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
                                                                <th class="levels-table" colspan="4">A-Levels and SCE
                                                                    Highers </th>
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
    </div> -->

    <!-- @include('frontend.subject_offer.subject_offer') -->

    <!-- <div class="container mb-5 mt-3">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('front/img/pexels-rdne-8500358.jpg')}}" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <form id="submitinquiry" method="POST" class="contact-form-area">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <p>Submit your details and we will assign you a qualified teacher within 24-48 hours</p>
                            <h3>Request Your Online Tutor Now</h3>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="first_name">Full Name <span class="text-danger"
                                    class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0 charCls" id="first_name"
                                name="full_name" placeholder="First Name" required>
                            <span class="text-danger" id="error_first_name"></span>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="email">Email <span class="text-danger" class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0" id="email" name="email"
                                placeholder="Email" required>
                            <span class="text-danger" id="error_email"></span>
                        </div>
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="subject-custom">
                                <label for="country">Country <span class="text-danger"
                                        class="required-error">*</span></label>
                                <select id="country" class="selectpicker " data-id="country" name="country" id="country"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Select country</option>
                                    @foreach ($country_list as $val)
                                    <option value="{{ $val->id }}" @if($val->id==222) selected
                                        @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="error_country"></span>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 mb-3">
                            <label for="phone">Phone <span class="text-danger" class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0 numberCls" id="phone"
                                name="phone" placeholder="Phone " maxlength="12" required>
                            <span class="text-danger" id="error_phone"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="">Subject</label>
                            <select class="selectpicker " data-id="subject2" name="subject" id="subject2"
                                aria-label="Default select example" data-live-search="true" required>
                                <option value="">Select Subject</option>
                                @foreach ($subject_list as $val)
                                <option value="{{$val->id}}">{{$val->main_title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_subjectinquiry"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="">Level of Tuition</label>
                            <select class="selectpicker " data-id="level2" name="level" id="level2"
                                aria-label="Default select example" data-live-search="true" required>
                                <option value="">Select Level</option>
                                @foreach ($allLevelData as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_level"></span>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-check custom-check">
                                <input class="form-check-input terms-condition" type="checkbox" name="term" value=""
                                    id="defaultCheck1">
                                <label class="form-check-label condition-text" for="defaultCheck1">
                                    <a style="color:blue;" class="condition-text" target="_blank"
                                        href="{{url('terms-and-conditions')}}"><u>Terms & conditions</u> </a>
                                </label>
                            </div>
                            <span class="text-danger" id="error_term"></span>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="button-default" href="javascript:void(0)" onclick="saveinquiry();">submit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col1 col-md-12">
                    <div class="product-top-uk product-details-content-2">
                        <div class="section-title-wrapper" data-aos="fade-in">
                            <div class="section-title">
                                <p>Associations</p>
                            </div>
                        </div>
                        <div class="product-details" data-aos="fade-in">
                            <p>Science Clinic Private Tutoring is proud to be associated with the following
                                organisations… </p>

                        </div>
                        <div class="">
                            <div class="owl-carousel owl-theme associations-text child-text" data-aos="fade-in">

                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://connect.collins.co.uk/school/portal.aspx"
                                                target="_black"><img
                                                    src="{{asset('front/img/associations/a-img-1.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.10ticks.co.uk/" target="_black"><img
                                                    src="{{asset('front/img/associations/img2.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.pearsonschoolsandfecolleges.co.uk/secondary/activelearn"
                                                target="_black"><img src="{{asset('front/img/associations/img3.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://connect.collins.co.uk/school/portal.aspx"
                                                target="_black"><img src="{{asset('front/img/associations/img4.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.exampro.co.uk/" target="_black"><img
                                                    src="{{asset('front/img/associations/img5.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://integralmaths.org/" target="_black"><img
                                                    src="{{asset('front/img/associations/img6.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://global.oup.com/education/secondary/kerboodle/?region=uk"
                                                target="_black"><img src="{{asset('front/img/associations/img7.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.mathletics.com/uk/" target="_black"><img
                                                    src="{{asset('front/img/associations/img8.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.risingstars-uk.com/" target="_black"><img
                                                    src="{{asset('front/img/associations/img9.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://global.oup.com/education/?region=uk" target="_black"><img
                                                    src="{{asset('front/img/associations/img10.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.mymaths.co.uk/" target="_black"><img
                                                    src="{{asset('front/img/associations/img11.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>

                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="javascript:void(0)" target="_black"><img
                                                    src="{{asset('front/img/associations/img12.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.hoddereducation.co.uk/dynamic-learning"
                                                target="_black"><img src="{{asset('front/img/associations/img13.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="https://www.hoddereducation.co.uk/alevelmaths" target="_black"><img
                                                    src="{{asset('front/img/associations/img14.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="child1">
                                        <div class="child-img associations-text-img">
                                            <a href="javascript:void(0)" target="_black"><img
                                                    src="{{asset('front/img/associations/tutors-association.png')}}"
                                                    class="child1-img" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->

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
                <a href="#" data-rel="pattren1" class="styleswitch"><img
                        src="{{asset('front/img/ec-pattren/pattren1.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren2" class="styleswitch"><img
                        src="{{asset('front/img/ec-pattren/pattren2.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren3" class="styleswitch"><img
                        src="{{asset('front/img/ec-pattren/pattren3.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren4" class="styleswitch"><img
                        src="{{asset('front/img/ec-pattren/pattren4.jpg')}}" alt=""></a>
                <a href="#" data-rel="pattren5" class="styleswitch"><img
                        src="{{asset('front/img/ec-pattren/pattren5.jpg')}}" alt=""></a>
            </div>
        </div>
        <div class="ec-background">
            <h6>Chose Background</h6>
            <div class="background-wrap">
                <a href="#" data-rel="background1" class="styleswitch"><img
                        src="{{asset('front/img/ec-background/bg-1.jpg')}}" alt=""></a>
                <a href="#" data-rel="background2" class="styleswitch"><img
                        src="{{asset('front/img/ec-background/bg-2.jpg')}}" alt=""></a>
                <a href="#" data-rel="background3" class="styleswitch"><img
                        src="{{asset('front/img/ec-background/bg-3.jpg')}}" alt=""></a>
                <a href="#" data-rel="background4" class="styleswitch"><img
                        src="{{asset('front/img/ec-background/bg-4.jpg')}}" alt=""></a>
                <a href="#" data-rel="background5" class="styleswitch"><img
                        src="{{asset('front/img/ec-background/bg-5.jpg')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- Color Switcher end -->
@endsection
@section('page-js')
<!-- <script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script> -->
<!-- <script src="{{asset('front/js/popper.min.js')}}"></script> -->
<!-- <script src="{{asset('front/js/bootstrap.min.js')}}"></script> -->
<!-- <script src="{{asset('front/js/ajax-mail.js')}}"></script> -->
<!-- <script src="{{asset('front/js/plugins.js')}}"></script> -->
<!-- <script src="{{asset('front/js/styleswitch.js')}}"></script> -->
<!-- <script src="{{asset('front/js/owl.carousel.js')}}"></script> -->
<!-- <script src="{{asset('front/js/main.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/widgets.js')}}"></script> -->
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();

function ValidateEmail(email) {
    var expr =
        /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
}

function saveinquiry() {
    var firstName = $('#first_name').val();
    var email = $('#email').val();
    var country = $('#country').val();
    var phone = $('#phone').val();
    var subject2 = $('#subject2').val();
    var level2 = $('#level2').val();
    var temp = 0;
    var regex = new RegExp("[a-zA-Z ]");
    $('#error_first_name').html('');
    $('#error_email').html('');
    $('#error_country').html('');
    $('#error_phone').html('');
    $('#error_subjectinquiry').html('');
    $('#error_level').html('');
    $('#error_term').html('');
    if (firstName.trim() == '') {
        $('#error_first_name').html('Full Name is required.');
        $('#first_name').focus();
        temp++;
    } else if (!regex.test(firstName)) {
        $('#error_first_name').html('Emoji not allowed.');
        $('#first_name').focus();
        temp++;
    }
    if (email.trim() == '') {
        $('#error_email').html('Email is required.');
        $('#email').focus();
        temp++;
    } else {
        if (!ValidateEmail(email)) {
            $('#error_email').html("Invalid email.");
            $('#email').focus();
            temp++;
        }
    }
    if (country.trim() == '') {
        $('#error_country').html('Country is required.');
        $('#country').focus();
        temp++;
    }
    if (phone.trim() == '') {
        $('#error_phone').html('Phone is required.');
        $('#phone').focus();
        temp++;
    } else {
        if (phone.length <= 10) {
            $('#error_phone').html('Invalid phone');
            $('#phone').focus();
            temp++;
        }
    }
    if (subject2.trim() == '') {
        $('#error_subjectinquiry').html('Subject is required.');
        $('#subject2').focus();
        temp++;
    }
    if ($("input[name='term']:checked").length == 0) {
        $('#error_term').html('Please select Term & condition.');
        $('#defaultCheck1').focus();
        temp++
    }
    if (temp == 0) {
        $.ajax({
            url: "{{route('saveInquiry')}}",
            type: 'post',
            data: new FormData($('#submitinquiry')[0]),
            processData: false,
            contentType: false,
            cache: false,
            success: function(res) {
                if (res.status == 0) {
                    toastr.error(res.error_msg);
                } else {
                    toastr.success(res.error_msg);
                    $('#submitinquiry').trigger("reset");
                    $('#error_first_name').html('');
                    $('#error_email').html('');
                    $('#error_country').html('');
                    $('#error_phone').html('');
                    $('#error_subjectinquiry').html('');
                    $('#error_level').html('');
                    $('#error_term').html('');
                }
            }
        });
    }
    return false;
}
$('.numberCls').keypress(function(event) {
    if (event.keyCode < 48 || event.keyCode > 57) {
        event.preventDefault();
    }
});

function searchHome() {
    var subject = $('#subject').val();
    var level = $('#level').val();
    if (subject != '') {
        var goto = subject;
        if (level != '') {
            goto = goto + '/' + level;
        }
        window.location.assign(goto);
    } else {
        $('#subject').focus();
        // toastr.error('Please select subject');
    }
}
$('.hero_banners').owlCarousel({
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
$('.hero_carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoHeight: true,
    margin: 9,
    nav: false,
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
$('.testimonial_carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoHeight: true,
    margin: 20,
    nav: false,
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
    autoplay: false,
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
    margin: 0,
    nav: false,
    autoplay: true,
    autoplayTimeout: 5000,
    dots: true,
    items: 1,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
})
</script>

@endsection

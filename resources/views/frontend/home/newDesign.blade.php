@extends('layouts.frontend')
@section('page-css')
<link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">
<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />
<style type="text/css">
    .m-scroll {
  display: flex;
  position: relative;
  width: 100%;
  height: 80px;
  margin: auto;
  background-color: #314d59;
  overflow: hidden;
  z-index: 1;
}
.m-scroll__title {
  display: flex;
  position: absolute;
  top: 0;
  left: 0;
  align-items: center;
  justify-content: flex-start;
  width: 100%;
  height: 100%;
  white-space: nowrap;
  transform: scale(2);
  transition: all 1s ease;
}
.m-scroll__title > div {
  display: flex;
  -webkit-animation: scrollText 90s infinite linear;
          animation: scrollText 90s infinite linear;
}
.m-scroll__title > div:hover {
    animation-play-state: paused;
}
.m-scroll__title h1 {
  margin: 0;
  font-size: 10px;
  color: #ffffff;
  transition: all 2s ease;
}
.m-scroll__title a {
  text-decoration: none;
  color: white;
  margin-right: 30px;
}
.m-scroll__title a:hover {
  -webkit-text-stroke: 1px white;
  color: transparent;
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

.container-form{
    background-color: #107dc2;
    color: white;
    padding: 20px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.group-form{
    display: flex;
    justify-content: center;
    align-items: flex-end;
    width: auto;
}
.forms{
    padding: 10px;
}
.forms label{
    color: white;
}
.container-form button{
    width:140px;
    text-align: center;
    padding: 10px 0px;
    border: none;
    border-radius: 20px;
    background-color: white;
    color: black;
    font-weight: bold;
}
.container-form button:hover{
    background-color: black;
    color: white;
    cursor: pointer;
}
.bootstrap-select>.dropdown-toggle
{
    min-width: 175px;
}
.filter-option-inner-inner
{
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

.container-2 .section-txt{
    width:40%;
}
.container-2 .section-txt h3{
    color: #107dc2;
    font-size: 30px;
    font-weight: bold;
    margin: 20px 0;
}
.container-2 .img{
    width:40%;
    padding: 30px;
    
}
.container-2 .img img{
    width: 100%;
    height: 90%;
    padding: 20px;
}
.section-3{
    background-color: #107dc2;
    color: white;
    text-align: center;
    padding: 20px 0;
}
.section-3 .container p{
    margin: 20px 0;
    padding: 0 20px;
}
.section-3 .container-items{
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.section-3 .container-items .box{
    width: 30%;
    padding: 20px;
    line-height: 1.5;
    border-radius: 10px;
    margin: 10px;
}
.section-3 .container-items .box p{
    padding:0 30px;
    margin: 10px 0;
    line-height: 2;
    word-spacing: 2px;
}
.section-3 .container-items i{
    font-size: 100px;
    margin-bottom:20px;
   
}
.hs-div{
    background-color: #107dc2;
    color: white;
    padding: 20px 20% 20px 20%;
}
.hs-btn-div
{
    display: flex;
    align-items: flex-end;
}
.hs-btn{
    border-radius: .25rem;
    border: none;
    padding: 10px 20px 10px 20px;
}
.hs-btn:hover{
    background-color: black;
    color: white;
    cursor: pointer;
}
@media screen and (max-width: 767px) {
    .group-form{
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto;
        flex-direction:column;
    }
    .container-2
    {
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
    .section-3 .container-items
    {
        flex-direction:column;
    }
    .section-3 .container-items .box
    {
        width:100%;
        padding: 0;
        margin: 5px;
        align-items: flex-start;
    }
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
        
    </div>
    <!--End of Background Area-->
    <!--About Area Start-->
    <section class="container-fluid p-0">
        <div class="m-scroll">
            <div class="m-scroll__title">
                <div>
                    <h1>
                        @foreach($subject_list as $subject)
                            <a href="{{$subject->url}}">{{$subject->main_title}}</a>
                        @endforeach
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid hs-div d-none">
        <div class="row">
            <div class="col-md-4">
                <label for="subject">subject</label>
                <select id="subject" class="selectpicker " data-id="subject" name="subject" id="subject" aria-label="Default select example" data-live-search="true" required>
                    <option value="">Select Subject</option>
                    @foreach ($subject_list as $val)
                    <option value="{{$val->url}}">{{$val->main_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="level">level</label>
                <select id="level" class="selectpicker " data-id="level" name="level" id="level" aria-label="Default select example" data-live-search="true" required>
                    <option value="">Select Level</option>
                    @foreach ($allLevelData as $val)
                    <option value="<?= rtrim(strtr(base64_encode($val->title), '+/', '-_'), '='); ?>">{{$val->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 hs-btn-div">
                <button type="button" class="hs-btn" onclick="searchHome()">Find a Tutor</button>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container-form">
            <div class="group-form">
                <div class="forms">
                    <label for="subject">subject</label>
                    <select id="subject" class="selectpicker " data-id="subject" name="subject" id="subject" aria-label="Default select example" data-live-search="true" required>
                        <option value="">Select Subject</option>
                        @foreach ($subject_list as $val)
                        <option value="{{$val->url}}">{{$val->main_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="forms">
                    <label for="level">level</label>
                    <select id="level" class="selectpicker " data-id="level" name="level" id="level" aria-label="Default select example" data-live-search="true" required>
                        <option value="">Select Level</option>
                        @foreach ($allLevelData as $val)
                        <option value="<?= rtrim(strtr(base64_encode($val->title), '+/', '-_'), '='); ?>">{{$val->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="forms">
                    <button type="button" onclick="searchHome()">Find a Tutor</button>
                </div>
            </div>
        </div>
    </section>
    <div class="english-abc res-pb-0">
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
                                    <p>We are a team of teachers that came together for a common cause which is teaching. </p>
                                    <p>We boost your child’s confidence and better the grades at any level of their education.
                                    </p>
                                    <p>Inquire today and receive first class tutoring from our tutor experts. There is no
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
                <!-- ------------ -->
                <div class="website">
                    <div class="row m-0 align-items-center">
                        <div class="col2 col-md-6" data-aos="fade-right">
                            <div class="product-details-image tap-setion  tap-setion-2">
                                <img src="{{asset('front/img/svg/home2.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col1 col-md-6" data-aos="fade-left">
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
    <section class="">
        <div class="section-3">
            <div class="container" data-aos="fade-in">
                <h1>Why Science Clinic ?</h1>
                <p>We support every level of the education system in unlocking true potential and achieving academic success.</p>
            </div>
            <div class="container-items">
                <div class="box" data-aos="fade-in">
                <i class="zmdi zmdi-graduation-cap"></i>
                    <h3>Qualified Teachers</h3>
                    <p>At Science Clinic, we only collaborate with qualified teachers who have substantial classroom experience teaching the UK National Curriculum.</p>
                </div>
                <div class="box" data-aos="fade-out">
                <i class="zmdi zmdi-male-alt"></i>
                    <h3>Tutor-Pupil Matching Service</h3>
                    <p>Simply share your requirements with Science Clinic, and we will connect you with the right tutor for your child. If you are not satisfied, we will assign an alternative tutor at any time.</p></div>
                <div class="box" data-aos="fade-in"> 
                <i class="zmdi zmdi-accounts"></i>
                 <h3>Personal Customer Support</h3>
                    <p>With years of experience in education, Science Clinic offers a personal touch to customer service, allowing you to contact us anytime to discuss any aspect of your child’s education.</p></div>
            </div>
        </div>
    </section>
    <!--End of Course Area-->
    <div class="testimonial-area p-0 res-testimonial-area tutor-slide-btn">
        <div class="container">
            <div class="product-details-content product-top-uk product-details-content-2 res-pt-0">
                <div class="section-title-wrapper test mb-50px">
                    <div class="section-title" data-aos="zoom-in">
                        <p>Meet some of our tutors!</p>
                    </div>
                </div>
            </div>
            <section class="shop-grid-area pb-testimonials">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="tutor-slide">
                            <div class="owl-carousel owl-theme hero_carousel">
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
                                            <div class="single-product-text" style="border-bottom: 0;">
                                                <h4 class="testing-user"> {{$value->first_name}} @if(isset($value->subject_name))- {{Str::limit($value->subject_name, 20)}}@endif</h4>
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
            </section>
        </div>
    </div>

    <section class="">
        <div class="container-2">
            <div class="section-txt" data-aos="fade-right">
                <div class="text">
                    <h3>How We Match Students with Tutors</h3>
                    <p>At Science Clinic, we go beyond the traditional tutoring model.</p>
                    <p>We’re not just a directory of tutors where you’re left to browse and choose on your own. Instead, we take a highly personalized approach to pairing students with the right tutors, ensuring a meaningful and effective learning experience.</p>
                    <p>Our process involves two key steps. First, we meticulously build and maintain a network of highly qualified, experienced, and passionate online tutors. We collaborate exclusively with certified educators who are experts in their fields, rigorously selecting only the top talent. In fact, we accept just a small fraction of applicants, ensuring your child learns from the very best.</p>
                    <p>Next, we take the time to understand your child’s unique needs, goals, and learning preferences. With this insight, we carefully match them with a tutor who is best suited to help them succeed—both academically and personally. During the first session, the tutor conducts an initial assessment to evaluate your child’s current skills and identify areas for growth. If either you or the tutor feels the fit isn’t quite right, we will reassess and find a more suitable match.</p>
                    <p>At Science Clinic, we act as facilitators, ensuring that both students and tutors feel fully supported, comfortable, and confident throughout their journey together. This nurturing relationship paves the way for impressive academic progress and long-term success.</p>
                    <p>To enhance the learning experience, we offer the option to record online sessions, allowing students to revisit and reinforce their lessons whenever they need. Our ongoing two-way feedback system continuously refines and optimizes the learning process. Plus, our customer support team consists of experienced educators, ensuring any issues are resolved quickly, professionally, and with empathy.</p>
                    <p>If you believe your child could benefit from expert guidance to achieve their educational goals, reach out to Science Clinic today to discover how we can help them excel.</p>
                </div>
            </div>
            <div class="img">
                <div>
                    <img src="https://www.scienceclinic.co.uk/front/img/pexels-olly-3769981.jpg" alt="" data-aos="fade-left">
                </div>
                <div>
                    <img src="https://www.scienceclinic.co.uk/front/img/pexels-olly-3807755.jpg" alt="" data-aos="fade-left">
                </div>
            </div>
        </div>
    </section>

    <!--End of Testimonial Area-->
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
                <div class="col-md-6" data-aos="fade-left">
                    <!--Slider Area Start-->
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

                    <!--End of Slider Area-->
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
                                        <div class="card-header" id="headingOne" data-aos="fade-in">
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
                                        <div class="card-header" id="headingOne-two" data-aos="fade-in">
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
                                        <div class="card-header" id="headingtwo" data-aos="fade-in">
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

    <div class="container mb-5 mt-3">
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
                            <label for="first_name">Full Name <span class="text-danger" class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0 charCls" id="first_name" name="full_name" placeholder="First Name" required>
                            <span class="text-danger" id="error_first_name"></span>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="email">Email <span class="text-danger" class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0" id="email" name="email" placeholder="Email" required>
                            <span class="text-danger" id="error_email"></span>
                        </div>
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="subject-custom">
                                <label for="country">Country <span class="text-danger" class="required-error">*</span></label>
                                <select id="country" class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Select country</option>
                                    @foreach ($country_list as $val)
                                    <option value="{{ $val->id }}" @if($val->id==222) selected @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="error_country"></span>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 mb-3">
                            <label for="phone">Phone <span class="text-danger" class="required-error">*</span></label>
                            <input autocomplete="off" type="text" class="form-control mb-0 numberCls" id="phone" name="phone" placeholder="Phone " maxlength="12" required>
                            <span class="text-danger" id="error_phone"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="">Subject</label>
                            <select class="selectpicker " data-id="subject2" name="subject" id="subject2" aria-label="Default select example" data-live-search="true" required>
                                <option value="">Select Subject</option>
                                @foreach ($subject_list as $val)
                                <option value="{{$val->id}}">{{$val->main_title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_subjectinquiry"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="">Level of Tuition</label>
                            <select class="selectpicker " data-id="level2" name="level" id="level2" aria-label="Default select example" data-live-search="true" required>
                                <option value="">Select Level</option>
                                @foreach ($allLevelData as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_level"></span>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-check custom-check">
                                <input class="form-check-input terms-condition" type="checkbox" name="term" value="" id="defaultCheck1">
                                <label class="form-check-label condition-text" for="defaultCheck1">
                                    <a style="color:blue;" class="condition-text" target="_blank" href="{{url('terms-and-conditions')}}"><u>Terms & conditions</u> </a>
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
    </div>

    <div class="container">
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
                            <p>Science Clinic Private Tutoring is proud to be associated with the following organisations… </p>

                        </div>
                        <div class="">
                            <div class="owl-carousel owl-theme associations-text child-text" data-aos="fade-in">

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

<script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>
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
        if(subject!='')
        {
            var goto = subject;
            if(level!='')
            {
                goto=goto+'/'+level;
            }
            window.location.assign(goto);
        }
        else
        {
            $('#subject').focus();
            // toastr.error('Please select subject');
        }
    }
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
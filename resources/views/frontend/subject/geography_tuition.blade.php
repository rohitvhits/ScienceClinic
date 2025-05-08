@extends('layouts.frontend')

@section('content')
<!--background Area Start-->
<div class="backgrount-area  bg-engbakground  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Geography Tuition</span>
                            </h1>
                            <p> Science Clinic Private Tutors work with a range of teachers from different schools who deliver
                                Geography specifications from different exam boards. We have focussed on ensuring that the
                                assessments from these Specifications are clear, accessible and discriminate effectively.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of background Area-->
<!--About Area Start-->
<div class="english-abc res-pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their Geography knowledge to their full
                            potential, equipping them with the knowledge to prepare for exams at any level</p>
                        <p>
                            We make the specification simpler and enables a variety of teaching and learning approaches. This
                            exciting and relevant course studies geography in a balanced framework of physical and human
                            themes and investigates the link between them.
                        </p>
                        <p>
                            Our tutors are fully qualified to teach Geography, they are all educated to the minimum of a degree,
                            some have postgraduate, and others have doctorates in the subject. Lessons will be structured
                            around your child’s level and to their required specification.
                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national curriculum and any
                            changes in educational standards
                        </p>
                        <div class="banner-readmore">
                            <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 res-mt">
                <div>
                    <img src="{{asset('uploads/all_subject/geography11.jpg')}}" class="w-100">
                </div>
            </div>
        </div>


    </div>
</div>
<!--End of About Area-->
<div class="english-abc">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('uploads/all_subject/geography22.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 res-mb-50">
                <div class="qualified-text res-mt-20">
                    <div class="single-item-text">
                        <h4 class="mb-3">Carry the knowledge with you
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Students will travel the world from their classroom, exploring case studies in the United Kingdom
                            (UK), higher income countries (HICs), newly emerging economies (NEEs) and lower income countries
                            (LICs). Topics of study include climate change, poverty, deprivation, global shifts in economic power
                            and the challenge of sustainable resource use. Students are also encouraged to understand their
                            role in society, by considering different viewpoints, values and attitudes.</p>
                        <p>
                            The specifications we teach were created with help from teachers and subject experts and we’re
                            confident you’ll enjoy learning it as much as your teachers will enjoy teaching it.
                        </p>
                        <p>
                            We have attached Geography specifications from different exam boards that we work with.

                        </p>
                        <p>
                            We’ve worked with experienced teachers to provide you with a range of resources that will help you
                            confidently plan and prepare for your exams.

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('frontend.subject_offer.subject_offer')
@include('frontend.testimonial.testmonial')
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
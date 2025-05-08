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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">History Tuition</span>
                            </h1>

                            <p>
                                Science Clinic Private Tutors work with a range of teachers from different schools who
                                deliver History specifications from different exam boards. We have focussed on ensuring
                                that the assessments from these Specifications are clear, accessible and discriminate
                                effectively
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
<div class="english-abc res-pb res-pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('uploads/all_subject/history1.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-mt-20">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their history knowledge to their
                            full potential, equipping them with the knowledge to prepare for exams at any level.</p>
                        <p>
                            Our tutors are fully qualified to teach History, they are all educated to the minimum of a
                            degree, some have postgraduate, and others have doctorates in the subject. Lessons will be
                            structured around your child’s level and to their required specification.
                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national curriculum
                            and any changes in educational standards.
                        </p>
                        <div class="banner-readmore">
                            <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<!--End of About Area-->
<div class="english-abc history-abc">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p ">
                    <div class="single-item-text">
                        <h4 class="mb-3">Specifications specifically designed for you
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>We make the specification simpler and enables a variety of teaching and learning
                            approaches. This exciting and relevant course studies History in a balanced framework of
                            physical and human themes and investigates the link between them.
                        </p>
                        <p>
                            We believe in the importance of learning from history. That's why we've designed a
                            specification that enables students to study different aspects of the past, so they can engage
                            with key issues such as conflict, understand what drives change and how the past influences
                            the present.
                        </p>
                        <!-- <p>
                                            We have attached Geography specifications from different exam boards that we work with.

                                        </p>
                                        <p>
                                            We’ve worked with experienced teachers to provide you with a range of resources that will help you
                                            confidently plan and prepare for your exams.
                                            
                                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <img src="{{asset('uploads/all_subject/history2.jpg')}}" class="img-sci-bios" alt="bio-text">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="who-dowork">
    <div class="container">
        <div class="gcseflexcenter">
            <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Who do we work with?</span>
                            </h5> -->
            <div class="relevant-and-diverse">
                <h4 class="title">Who do we work with?</h4>
            </div>
        </div>
        <div class="subject-include mt-3">
            <p>
                We’ve worked with teachers and subject experts to include some exciting new topics for today’s world that will resonate with students, helping them gain new insights into the world around them
            </p>
            <p>
                To give you the choice and flexibility to learn the history you want t, we’ve included the
                most popular and well-established topics. Building on the skills and topics at Key Stage 3,
                our GCSE will equip your students with essential skills and prepare them for further study
            </p>
            <p>
                We have attached Geography specifications from different exam boards that we work with.
            </p>
            <p>
                We’ve worked with experienced teachers to provide you with a range of resources that will
                help you confidently plan and prepare for your exams.
            </p>
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
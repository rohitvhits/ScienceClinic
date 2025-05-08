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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Philosophy Tuition</span>
                            </h1>

                            <p>
                                Science Clinic Private Tutors works with a range of teachers from different schools who
                                deliver A-level Philosophy specifications from different exam boards. We have focussed on
                                ensuring that the assessments from these specifications are clear, accessible and
                                discriminate effectively.

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
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their Philosophy knowledge to
                            their full potential, equipping them with the knowledge to prepare for exams at any level.</p>
                        <p>We make the specification simpler and enables a variety of teaching and learning
                            approaches. This exciting and relevant course studies Philosophy in a balanced framework
                            of physical and human themes and investigates the link between them</p>
                        <p>Our tutors are fully qualified to teach Philosophy, they are all educated to the minimum of a
                            degree, some have postgraduate, and others have doctorates in the subject. Lessons will be
                            structured around your child’s level and to their required specification.</p>
                        <p>Our tutors are constantly updated and trained to keep in line with the national curriculum
                            and any changes in educational standards.
                        </p>
                        <div class="banner-readmore">
                            <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 res-mt res-mt-20">
                <div>
                    <img src="{{asset('uploads/all_subject/phylosophy2.jpg')}}" class="w-100">
                </div>
            </div>

        </div>


    </div>
</div>
<!--End of About Area-->
<div class="english-abc">
    <div class="container">
        <div class="row text-row flex-direction-img">
            <div class="col-lg-6 col-md-12 ">
                <div class="res-mt-20">
                    <img src="{{asset('uploads/all_subject/philosophy1.jpg')}}" class="img-sci-bios sub-img-max-height" alt="bio-text">
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why study Philosophy?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>This qualification offers an engaging and effective introduction to Philosophy. Students will
                            learn the fundamentals of the subject and develop skills valued by higher education (HE)
                            and employers, including critical analysis, independent thinking and research.</p>
                        <p>We have included a range of attractive topic options, allowing students and teachers to
                            experience an interesting, diverse and coherent course of study.</p>
                        <p>Approaches and methods related to the core areas of Philosophy, to enable students to
                            engage in theoretical debate and to encourage an active involvement with the research
                            process.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="who-dowork res-p-40">
    <div class="mb-lg-5 mb-3">
        <div class="container">
            <div class="gcseflexcenter">
                <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center title2-law mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Specifications designed for our students</span></h5> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">Specifications designed for our students</h4>

                </div>
            </div>
            <div class="subject-include mt-3">
                <p>
                    We have attached the AS and A-level specifications to cover core areas of Philosophy and to
                    be fully co-teachable within the first year of study. We know this will help teachers with
                    resourcing and timetabling and will also allow students to switch between AS and A-level
                    during the first year if they wish.

                </p>
                <p>These specifications will appeal to a cross-section of students, regardless of whether they
                    have studied the subject before. They build on skills developed in the sciences and
                    humanities and enable progression into a wide range of other subjects.
                </p>
                <p>The new AS and A-level Philosophy qualifications are designed to give students a thorough
                    grounding in the key concepts and methods of philosophy. Students will have the
                    opportunity to engage with big questions in a purely secular context. These qualifications
                    are fully co-teachable, so you can teach AS and A-level students in the same class.
                </p>
                <p>Students will develop important skills that they need for progression to higher education.
                    They’ll learn to be clear and precise in their thinking and writing. They will engage with
                    complex texts, analysing and evaluating the arguments of others and constructing and
                    defending their own arguments.</p>
            </div>
        </div>
    </div>

    <div class="mb-lg-5 mb-3">
        <div class="container">
            <div class="gcseflexcenter">
                <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center title2-law mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Clear, well-structured exams, accessible for all</span> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">Clear, well-structured exams, accessible for all</h4>
                </div>
            </div>
            <div class="subject-include mt-3">
                <p>We support you throughout your exam period. We work with experienced teachers to
                    provide you with a range of resources that will help you confidently plan, teach and prepare
                    for exams.
                </p>

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
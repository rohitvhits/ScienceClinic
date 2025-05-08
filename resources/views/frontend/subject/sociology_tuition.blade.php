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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Sociology Tuition</span>
                            </h1>
                            <p>
                                Science Clinic Private Tutors works with a range of teachers from different
                                schools who
                                deliver A-level Sociology specifications from different exam boards. We have
                                focussed on
                                ensuring that the assessments from these Specifications are clear,
                                accessible and
                                discriminate effectively

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
                <div>
                    <img src="{{asset('uploads/all_subject/sociology1.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-mt-20">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their Sociology
                            knowledge to
                            their full potential, equipping them with the knowledge to prepare for exams at
                            any level.</p>
                        <p>
                            We make the specification simpler and enables a variety of teaching and learning
                            approaches. This exciting and relevant course studies Sociology in a balanced
                            framework of
                            physical and human themes and investigates the link between them

                        </p>
                        <p>
                            This qualification offers an engaging and effective introduction to Sociology.
                            Students will
                            learn the fundamentals of the subject and develop skills valued by higher
                            education (HE)
                            and employers, including critical analysis, independent thinking and research.

                        </p>
                        <p>
                            Our tutors are fully qualified to teach Sociology, they are all educated to the
                            minimum of a
                            degree, some have postgraduate, and others have doctorates in the subject.
                            Lessons will be
                            structured around your child’s level and to their required specification.

                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national
                            curriculum
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
<div class="english-abc sociology-abc">
    <div class="container">
        <div class="row  text-row">

            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p">
                    <div class="single-item-text">
                        <h4 class="mb-3">Specification designed for our students

                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Science Clinic Private Tutors uses specifications that have been worked by
                            teachers, HE and
                            the British Sociological Association. These groups of educated experts have
                            produced clear,
                            up-to-date and stimulating specifications.
                        </p>
                        <p>
                            We have included a range of attractive topic options, allowing students and
                            teachers to
                            experience an interesting, diverse and coherent course of study.
                        </p>
                        <p>
                            Approaches and methods related to the core areas of Sociology, to enable
                            students to
                            engage in theoretical debate and to encourage an active involvement with the
                            research
                            process.
                        </p>
                        <p>
                            We have attached the AS and A-level specifications to cover core areas of
                            Sociology and to
                            be fully co-teachable within the first year of study. We know this will help
                            teachers with
                            resourcing and timetabling and will also allow students to switch between AS and
                            A-level
                            during the first year if they wish.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <img src="{{asset('uploads/all_subject/sociology2.jpg')}}" class="img-sci-bios sub-img-max-height " alt="bio-text">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="who-dowork">
    <div class="container">
        <div class="gcseflexcenter">
            <div class="relevant-and-diverse">
                <h4 class="title">Clear, well-structured exams, accessible for all</h4>
            </div>
        </div>
        <div class="subject-include mt-3">
            <p>
                We support you throughout your exam period. These specifications will appeal to a
                crosssection of students, regardless of whether they have studied the subject before. They
                build
                on skills developed in the sciences and humanities and enable progression into a wide range
                of other subjects.
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
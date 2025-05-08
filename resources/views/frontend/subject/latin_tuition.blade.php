@extends('layouts.frontend')

@section('content')
<div class="backgrount-area  bg-engbakground  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Latin Tuition</span>
                            </h1>

                            <p>
                                Science Clinic Private Tutors work with a range of teachers from different schools who deliver Latin
                                specifications from different exam boards. We have focussed on ensuring that the assessments from
                                these Specifications are clear, accessible and discriminate effectively.
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
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('front/img/languages/latin-main-2.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private tutors?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our GCSE in Latin is designed to help students develop their knowledge and understanding of the
                            vocabulary, syntax and accidence of the Latin language, and also of ancient literature, values and
                            society through the study of original texts.</p>
                        <p>
                            Our objective is to enable students of all abilities to develop their Latin language skills to their full
                            potential, equipping them with the knowledge to communicate in a variety of contexts with
                            confidence.
                        </p>
                        <p>
                            Our tutors are fully qualified to teach Latin, they are all educated to the minimum of a degree, some
                            have postgraduate, and others have doctorates in the subject. Lessons will be structured around
                            your child’s level and to their required specification.
                        </p>
                        <p>Our tutors are constantly updated and trained to keep in line with the national curriculum and any
                            changes in educational standards.</p>
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
<div class="english-abc langualges-life res-pb-0">
    <div class="container">
        <div class="row text-row flex-direction-img">

            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p res-mt-20">
                    <div class="single-item-text">
                        <h4 class="mb-3">Languages for life
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>At Science Clinic Private Tutors, we're passionate about the benefits that learning a language can
                            bring. We strongly believe in languages as a skill for life and something students should enjoy and
                            find rewarding.
                        </p>
                        <p>
                            We know you want a specification which you can enjoy learning, and one which expands your
                            cultural knowledge whilst developing your language skills.

                        </p>
                        <p>
                            We are confident our assessments will deliver the right results to all our students. We want to
                            attract students of all abilities to languages and to deliver the assessments and results they deserve.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('front/img/languages/latin-life.jpg')}}" class="img-sci-bios sub-img-max-height" alt="bio-text">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relevant-specific biology-relevant">
    <div class="container">
        <div class="relevant-and-diverse">
            <h4 class="title">Comprehensive support</h4>
            <p>
                We are here to offer a comprehensive range of support and resources to assist all our students and
                teachers in their planning, teaching and assessment. You can rely on us to support you when you
                need help.
            </p>
            <p>
                We’ve work with experienced teachers to provide you with a range of resources that will help you
                confidently prepare for exams.

            </p>
            <p>We have attached French qualifications from different exam boards that we work with.</p>
        </div>

    </div>
</div>

<!-- GCSE topics start -->
<div class="gcse-text res-mb latin-gcse-text">
    <div class="container">
        <div class="gcseflexcenter">
            <!-- <div class="gcse-titles text-center">
                    <h5 class="title1 text-center mb-20">
                        <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">GCSE (9-1) English</span>
                    </h5> -->
            <div class="relevant-and-diverse">
                <h4 class="title">Latin</h4>
                <p class="pt-2 pb-2">
                    We teach the following specifications in Latin
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/LATIN-A-LEVEL-SPEC-OCR.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Latin OCR</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/LATIN-GCSE-PEC-EDUQAS.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Latin GCSE PEC EDUQAS</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/LATIN-GCSE-PEC-OCR.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Latin GCSE PEC OCR</a>
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
        autoplayTimeout: 6000,
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
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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Business Studies Tuition</span>
                            </h1>
                            <p> Science Clinic Private Tutors work with a range of teachers from different schools who deliver
                                Business Studies specifications from different exam boards. We have focussed on ensuring that the
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
        <div class="row text-row">
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('uploads/all_subject/business-image.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their Business Studies knowledge to
                            their full potential, equipping them with the knowledge to prepare for exams at any level.</p>
                        <p>
                            We make the specification simpler and enables a variety of teaching and learning approaches. Thisexciting and relevant course studies Business Studies in a balanced framework of physical and human themes and investigates the link between them.

                        </p>
                        <p>
                            The specifications we use will give you the opportunity to explore real business issues and how
                            businesses work. The clear and straightforward structure to the new specifications will support your
                            learning and make it easier for you to prepare for the exams ahead.

                        </p>
                        <p>
                            Our tutors are fully qualified to teach Business Studies, they are all educated to the minimum of a degree, some have postgraduate, and others have doctorates in the subject. Lessons will be structured around your child’s level and to their required specification.
                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national curriculum and any changes in educational standards.

                        </p>
                        <div class="banner-readmore">
                            <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relevant-specific">
            <div class="relevant-and-diverse">
                <h4 class="title">Relevant and diverse Specifications</h4>
                <p>
                    At Science Clinic Private Tutors, we choose specifications for our students will focus on the practical application of business concepts. The units provide opportunities to explore theories and concepts in the most relevant way, through the context of events in the business and economic world.
                </p>
                <p>
                    The knowledge and skills gained from these specifications will provide our students with a firm foundation for further study.
                </p>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Clear, well-structured exams, accessible for all</h4>
                <p>
                    To enable our students, show their breadth of knowledge and understanding, the exam boards we
                    use prepare simple, straightforward structure and layout of exams using a mix of question styles.
                </p>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Support and resources to help you teach</h4>
                <p>
                    We work with experienced teachers to provide you with a range of resources that will help you
                    confidently prepare for exams.
                </p>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<!-- GCSE topics start -->
<div class="gcse-text res-pt-0">
    <div class="container">
        <div class="gcseflexcenter">
            <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">GCSE (9-1) English</span>
                            </h5> -->
            <div class="relevant-and-diverse">
                <h4 class="title">Business Studies</h4>
                <p class="pt-2 pb-2">
                    We teach the following specifications in Busienss Studies
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-BUSINESS-STUDIES-SPE-EDEXCEL.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-Level Business Studies Edexcel</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-BUSINESS-STUDIES-SPE.PDF')}}" target="_blank" class="btn download-pdfs">
                        <i class="fa fa-book mr-2"></i>A-Level Business Studies
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-business-studies-OCR.pdf')}}" target="_blank" class="btn download-pdfs">
                        <i class="fa fa-book mr-2"></i>A-Level Business Studies OCR
                    </a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-BUSINESS-STUDIES-NI-SPEC.pdf')}}" target="_blank" class="btn download-pdfs">
                        <i class="fa fa-book mr-2"></i>A-Level Business Studies NI</a>
                </div>

                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-business-studies-SCOTISH-HIGHERS.pdf')}}" target="_blank" class="btn download-pdfs">
                        <i class="fa fa-book mr-2"></i>A-Level Business Studies Scotish Highers</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-business-studies-Cambridge.pdf')}}" target="_blank" class="btn download-pdfs">
                        <i class="fa fa-book mr-2"></i>A-Level Business Studies Cambridge</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- GCSE topics End -->
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
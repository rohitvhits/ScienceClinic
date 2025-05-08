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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Accounting Tuition</span>
                            </h1>
                            <p>Science Clinic Private tutors works with a range of teachers from different schools who deliver
                                accounting specifications from different exam boards. We have focussed on ensuring that the
                                assessments from these Specifications are clear, accessible and discriminate effectively</p>
                            <!-- <p> Science Clinic Private Tutors work with a range of teachers from different schools who deliver
                                            Business Studies specifications from different exam boards. We have focussed on ensuring that the
                                            assessments from these Specifications are clear, accessible and discriminate effectively.
                                            </p> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of background Area-->
<!--About Area Start-->
<div class="english-abc accounting-abc res-pb-0">
    <div class="container">
        <div class="row text-row">
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div>
                    <img src="{{asset('uploads/all_subject/accounting1.jpg')}}" class="w-100">
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
                        <p>The specifications we use will give you the opportunity to explore real business issues and how
                            businesses work. The clear and straightforward structure to the new specifications will support your
                            learning and make it easier for you to prepare for the exams ahead.</p>
                        <p>
                            Our tutors are fully qualified to teach Business Studies, they are all educated to the minimum of a degree, some have postgraduate, and others have doctorates in the subject. Lessons will bestructured around your child’s level and to their required specification.
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
    </div>
</div>
<!--End of About Area-->
<div class="english-abc accounting-abc">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 res-mb-40">
                <div class="qualified-text accounting-why accounting-why-padd">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why study accounting
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>A qualification in accounting will always be helpful – whether it's used professionally or personally.
                            This course helps students to understand the responsibilities of the accountant and the impacts of
                            their recommendations on the business and the wider environment.</p>
                        <p>
                            Students will build knowledge and understanding of key concepts, principles and techniques that
                            they can apply to real-life scenarios, developing the ability to solve problems logically, analyse data
                            methodically, make reasoned choices and communicate effectively.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <img src="{{asset('uploads/all_subject/study-accounting.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="relevant-specific cust-padd">
                <div class="relevant-and-diverse">
                    <h4 class="title">A specification designed for you and your students</h4>
                    <p>
                        At Science Clinic Private Tutors, we choose specifications that have been worked on with the help
                        from teachers and subject experts. You'll see that we've kept the content that our students enjoy
                        and added new areas to keep content fresh and relevant. Students will gain core knowledge of
                        financial accounting as well as cost and management accounting.

                    </p>
                </div>
                <div class="relevant-and-diverse">
                    <h4 class="title">Clear, well-structured exams, accessible for all</h4>
                    <p>
                        To enable our students, show their breadth of knowledge and understanding, the exam boards we
                        use prepare simple, straightforward structure and layout of exams using a mix of question styles
                        including multiple choice, short answer and scenario-based questions. Assessment remains 100%
                        exam based.
                    </p>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- GCSE topics start -->
<div class="gcse-text accounting-gcse res-pt-0">
    <div class="container">
        <div class="gcseflexcenter">
            <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">GCSE (9-1) English</span>
                            </h5> -->
            <div class="relevant-and-diverse">
                <h4 class="title">Accounting</h4>
                <p class="pt-2 pb-2">
                    We teach the following specifications in Accounting
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-ACOUNTING-AQA-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Accounting AQA</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-ACOUNTING-IGCSE-EDEXCEL-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Accounting IGCSE EDEXCEL</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-ACOUNTING-OCR-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Accounting OCR</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-ACOUNTING-SCOTTISH-HIGHERS-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Accounting Scottish Highers</a>
                </div>
                <div class="chemistry-icon-text">
                    <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-LEVEL-ACOUNTING-CAMBRIDGE-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-LEVEL Accounting Cambridge</a>
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
@extends('layouts.frontend')

@section('content')
<!--background Area Start-->
<div class="backgrount-area  bg-mathes  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Computer Science Tuition</span>
                            </h1>

                            <p>
                                At Science Clinic Private Tutoring we offer a range of tuition services
                                aimed at providing learning and skills for GCSE/IGCSE levels of education.
                                We work with your child’s current syllabus to ensure they receive expert
                                tuition in a structured and fun
                                way.
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
                <div class="math-main-img">
                    <img src="{{asset('uploads/all_subject/computer-science-image.jpg')}}">

                </div>


            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text mt-10">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors
                        </h4>
                    </div>

                    <div class="qualified-details">
                        <p>Science Clinic Private Tutors work with a range of teachers from different
                            schools who deliver
                            Computer Science specifications from different exam boards. We have focussed on
                            ensuring that the
                            assessments from these Specifications are clear, accessible and discriminate
                            effectively.</p>
                        <p>Our objective is to enable students of all abilities to develop their Computer
                            Science knowledge to
                            their full potential, equipping them with the knowledge to prepare for exams at
                            any level.
                        </p>
                        <p>Our tutors are fully qualified to teach Computer Science, they are all educated
                            to the minimum of a
                            degree, some have postgraduate, and others have doctorates in the subject.
                            Lessons will be
                            structured around your child’s level and to their required specification.
                        </p>
                        <p>Our tutors are constantly updated and trained to keep in line with the national
                            curriculum and any
                            changes in educational standards.</p>
                    </div>
                    <div class="banner-readmore">
                        <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="english-abc computer-science-abc">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p">
                    <div class="single-item-text">
                        <h4 class="mb-3">Specifications specifically designed for you
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>We make the specification simpler and enables a variety of teaching and learning
                            approaches. This
                            exciting and relevant course studies Computer Science in a balanced framework of
                            physical and
                            human themes and investigates the link between them.</p>
                        <p>The specifications we use will give you the opportunity to explore real world of
                            computing and how
                            ICT works in business. The clear and straightforward structure to the new
                            specifications will support
                            your learning and make it easier for you to prepare for the exams ahead.</p>
                        <p>We’ve worked closely with teachers to develop GCSE & A-level Computer Science
                            specifications that
                            are inspiring to teach as they are to learn. These specifications recognise the
                            well-established
                            methodologies of computing, alongside the technological advances which make it
                            such a dynamic
                            subject.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="math-main-img">
                    <img src="{{asset('uploads/all_subject/computer-science-image-1-min.jpg')}}">
                </div>
            </div>




        </div>
    </div>
    <div class="container">
        <div class="relevant-specific ">
            <div class="relevant-and-diverse res-mb-0">
                <h4 class="title">Why study Computer Science</h4>
                <p>Students who complete this course are equipped with the logical and computational skills
                    necessary
                    to succeed in their workplaces or beyond.</p>
                <p>At Science Clinic Private Tutors, we use specifications built on the most popular aspects
                    of the
                    current and up-to date specifications, they have added fresh features including a
                    programming exam
                    to provide a programme of study for students of all ability levels. You can choose from
                    a range of
                    programming languages, enabling you to tailor your teaching to the strengths and
                    preferences of
                    yourself and your students.</p>
                <p>Our exam boards use exam papers that retain the commitment to clear wording and
                    structure,
                    helping students to progress through each paper with confidence.</p>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Support and resources to help you teach</h4>
                <p>We work with experienced teachers to provide you with a range of resources that will help
                    you
                    confidently prepare for exams.</p>
            </div>

        </div>
    </div>


    <div class="gcse-text pt-3">
        <div class="container">
            <div class="gcseflexcenter">
                <!-- <div class="gcse-titles text-center">
                                <h5 class="title1 text-center mb-20">
                                    <span class="tlt block" data-in-effect="fadeInRight"
                                        data-out-effect="fadeOutRight">GCSE (9-1) English</span>
                                </h5> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">Computer Science</h4>
                    <p class="pt-2 pb-2">
                        Specifications For Computer Science
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-GCSE-EDEXCEL-SPEC.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Computer Science
                            GCSE
                            EDEXCEL</a>
                    </div>
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-GCSE-OCR-SPEC.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Computer Science
                            GCSE
                            OCR</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-GCSE-OCR-A-LEVEL-SPEC.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-Level Compute Science
                            GCSE
                            OCR</a>
                    </div>
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-GCSE-SPEC-N5.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Computer Science
                            GCSE
                            N5</a>
                    </div>
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-GCSE-SPEC.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Computer Science
                            GCSE</a>
                    </div>
                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-IGCSE-SPEC-CAMB-A-LEVEL-PDF.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>A-Level Computer Science
                            IGCSE Cambridge</a>
                    </div>

                    <div class="chemistry-icon-text">
                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/COMPUTER-SCIENCE-IGCSE-SPEC-EDEXCEL-PDF.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Computer Science
                            IGCSE EDEXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of About Area-->
    <!-- GCSE topics start -->

    <!-- GCSE topics End -->


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
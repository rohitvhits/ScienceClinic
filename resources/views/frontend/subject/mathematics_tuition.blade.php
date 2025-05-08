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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Mathematics Tuition</span>
                            </h1>


                            <div class="literature-text">
                                <h3 class="mb-2">Fully qualified to teach Mathematics</h3>
                                <p class="mb-2">
                                    Science Clinic Private tutors teach the following specifications Mathematics:
                                </p>
                                <ul>
                                    <li><a href="https://www.aqa.org.uk/" class="cambridge-text-link">AQA</a></li>
                                    <li><a href="https://qualifications.pearson.com/en/home.html" class="cambridge-text-link">Pearson EDEXCEL</a></li>
                                    <li><a href="https://ocr.org.uk/" class="cambridge-text-link">OCR</a></li>
                                    <li><a href="https://www.wjec.co.uk/" class="cambridge-text-link">WJEC</a></li>
                                    <li><a href="https://www.cambridgeinternational.org/about-us/" class="cambridge-text-link">Cambridge</a></li>
                                    <li><a href="https://www.sqa.org.uk/sqa/30030.html" class="cambridge-text-link">Scottish Specs</a></li>
                                    <li><a href="https://ccea.org.uk/" class="cambridge-text-link">NI specs</a></li>
                                    <li><a href="https://www.aqa.org.uk/subjects/science/ks3/ks3-science-syllabus" class="cambridge-text-link">KS3</a></li>
                                </ul>
                                <div class="pearson p">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of background Area-->
<!--About Area Start-->
<div class="english-abc">
    <div class="container">
        <div class="row text-row">
            <div class="col-lg-6 col-md-12">
                <div class="math-main-img">
                    <img src="{{asset('uploads/all_subject/mathematics-image-min.jpg')}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Mathematics for all students
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our philosophy is ‘Mathematics for all students’. We believe that Maths has
                            something to
                            offer every student. That's why we offer a range of intensive teaching /
                            tutoring for all Key
                            Stages from KS2 (Primary), KS3 (Junior Secondary), KS4 (GCSE) / IGCSE & KS5
                            (A-level) and
                            our lessons suit students of all abilities and all aspirations.</p>
                        <p>All our tutors are fully qualified to teach maths, they are all educated to the minimum of a
                            degree, some have postgraduate, and others have doctorates in the subjects they teach.
                            Lessons will be structured around your child’s level and to their required specification.</p>
                        <p> Our tutors are constantly updated and trained to keep in line with the national curriculum
                            and any changes in educational standards.</p>
                        <p>Once you start lessons with us, you'll see that our teaching of Mathematics is
                            clear,
                            straightforward and follows your specification. For GCSE / IGCSE & A-level,
                            there is and
                            exam at the end of the course. Our Tutors will ensure that you are ready for
                            such exams and
                            this will make you realise your potential. </p>
                    </div>
                    <div class="banner-readmore">
                        <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<div>
    <div class="container">
        <div class="relevant-specific">

            <div class="relevant-and-diverse">
                <h4 class="title">Specifications developed by teachers for teachers

                </h4>
                <p>
                    The specifications we use are for the main recognised exam boards which have been
                    developed with the involvement of thousands of UK qualified teachers. So you can be
                    confident that our GCSE, IGCSE, KS3 & A-level Mathematics is relevant and interesting to
                    teach and to learn. Our specifications ensure that:

                </p>
                <ul class="biolody-ul pt-2 pb-2 pl-5">
                    <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">The subject content is
                        presented
                        clearly, in a logical teaching & learning order. We’ve
                        also given teaching guidance and signposted opportunities for skills development
                        throughout the specification
                    </li>
                    <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Our Mathematics qualifications
                        provide
                        opportunities for progression. Our GCSE /
                        IGCSE Mathematics includes progression in the subject content and consistency in
                        the exam questions, so that our students have the best preparation for A-level.
                    </li>

                </ul>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Support and resources to help you teach


                </h4>
                <p>
                    We’ve worked with experienced teachers to provide you with a range of resources that
                    will
                    help you confidently plan, teach and prepare for exams.

                </p>
                <p>Our exam boards design question papers with students in mind. They are committed to
                    ensuring that
                    students are settled early in our exams and have the best possible opportunity to
                    demonstrate their
                    knowledge and understanding of maths, to ensure they achieve the results they deserve.
                </p>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Analyse our student's
                </h4>
                <p>
                    We analyse student’s results by looking at which questions were the most challenging,
                    how the results
                    compare to previous years using grade boundaries and where our students need to improve.


                </p>
            </div>
            <div class="relevant-and-diverse">
                <h4 class="title">Curriculum professional development (CPD)

                </h4>
                <p>
                    Our tutors / teachers are kept abreast with subject-specific training. We know wherever
                    you are in
                    your career, there’s always something new to learn. We offer a range of courses to help
                    boost their
                    skills.


                </p>
            </div>
        </div>
    </div>
</div>


<!-- GCSE topics start -->
<div class="gcse-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">Key Stage 3 Mathematics (Years 7 & 8)
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                At KS3 (Years 7 & 8), we cover some the following
                                                topics:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">

                                                        <ul class="biolody-ul pt-2 pb-2 ">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Numbers
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Sequences
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Perimeter,
                                                                area and volume
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Decimals &
                                                                measures</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Statistics,
                                                                graphs & charts</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Algebra
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Fractions &
                                                                Percentages</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Lines &
                                                                angles</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Coordinates
                                                                and graphs</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Probability
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Equations
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Analysing &
                                                                displaying data</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <ul class="biolody-ul pt-2 pb-2 ">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">3D
                                                                shapes and ratio Circles
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Circles
                                                                Congruent shapes</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Congruent
                                                                shapes</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Expressions,
                                                                functions & formulae</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Ratio &
                                                                proportion</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Transformation
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Real
                                                                life graphs</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Expressions &
                                                                equations</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Decimals &
                                                                ratio</li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Straight-line
                                                                graphs
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Percentages,
                                                                decimals & fractions</li>

                                                        </ul>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/Key-Stage-3-Mathematics-New-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Key
                                                                    Stage 3 Mathematics Specifications</a>
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">EDEXCEL – GCSE (9-1) Years 9,10 & 11
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingtwo">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                At GCSE level, we cover the following topics:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <h4 class="pt-3">At GCSE level, we cover the following topics: </h4>
                                                        <ul class="biolody-ul pt-2 pb-2 ">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Numbers

                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Algebra
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Ratio,
                                                                proportion and rates of change
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Geometry
                                                                and measures
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Probability
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Statistics.
                                                            </li>

                                                        </ul>
                                                        <div class="downloaded-file">
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/AQA-GCSE-Maths-9-1-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                        GCSE Mathematics (9-1) Specification
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/AQA-GCSE-Mathematics-9-1-Specification-Summary-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                        GCSE Mathematics (9-1) Specification Summary
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="downloaded-file">
                                                            <div class="qualified-details">
                                                                <p class="pt-2 pb-2">
                                                                    We also teach the following specifications:
                                                                </p>
                                                            </div>
                                                            <div class="chemistry-icon-text btn download-pdfs">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/AQA-GCSE-Maths-9-1-Specification-1.pdf')}}" target="_blank" class="btn download-pdfs">
                                                                <i class="fa fa-book mr-2"></i>GCSE (9-1) AQA Maths
                                                                Specification</a>
                                                            </div>
                                                            <div class="chemistry-icon-text  btn download-pdfs">
                                                                <i class="fa fa-book mr-2"></i>GCSE (9-1) Cambridge Maths
                                                                Specification
                                                            </div>
                                                            <div class="chemistry-icon-text  btn download-pdfs">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/OCR-GCSE-Maths-9-1-Specification-1.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>GCSE (9-1) OCR Gateway Maths
                                                                Specifications</a>
                                                            </div>
                                                            <div class="chemistry-icon-text  btn download-pdfs">
                                                                <i class="fa fa-book mr-2"></i>GCSE (9-1) OCR 21st Century
                                                                Maths Specifications
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/Edexcel-IGCSE-Mathematics-Specification-1.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel IGCSE (9-1) Maths
                                                                    Specification</a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/N5-Mathematics-Spec.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Nat 5 (Scottish spec) – Maths
                                                                    Spec</a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/Eduqas-gcse-maths-Spec.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Eduqas (Welsh spec) – Maths
                                                                    Spec</a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/NI-GCSE-Mathematics-Specification.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>NI spec – Maths Spec
                                                                    </a>
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
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">AQA - A-Level Mathematics
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingthree">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                                At A-level, we cover the following topics for AQA:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <ul class="biolody-ul pt-2 pb-2 ">
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Proof

                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Algebra and functions
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Coordinate geometry in
                                                            (x,y) plane
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Sequences and series
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Trigonometry</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Exponentials and
                                                            logarithms</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Differentiation</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Integration</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Numerical methods</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Vectors
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Statistical sampling
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Data presentation and
                                                            interpretation</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Probability</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Statistical
                                                            distribution</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Statistical hypothesis
                                                            testing </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Quantities and units in
                                                            mechanics</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Kinematics</li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Forces and Newton’s law
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Moments
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Use of data in
                                                            statistics.
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="qualified-details">
                                                            <p class="pt-2 pb-2 mt-3">
                                                                We also teach the following A-level specifications:
                                                            </p>
                                                            <ul class="biolody-ul pt-2 pb-2 ">
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Edexcel

                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">OCR</li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Cambridge</li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Scottish Highers
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Northern Ireland
                                                                    Spec</li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Eduqas (Welsh spec)
                                                                </li>
                                                            </ul>

                                                            <div>
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-Level-Aqa-Mathematics-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                                A-Level Mathematics Specification</a>
                                                                    </div>
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/AS-Aqa-Mathematics-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                                AS Mathematics Specification</a>
                                                                    </div>
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/A-Level-Edexcel-Mathematics-2017-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel A-Level Mathematics 2017
                                                                                Specification</a>
                                                                    </div>
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/AS-Edexcel-Mathematics-2017-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel AS Mathematics 2017
                                                                                Specification</a>
                                                                    </div>
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/subjects_pdf/OCR-A-Level-Maths-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>OCR
                                                                                A-Level Maths Specification</a>
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
                    </div>
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
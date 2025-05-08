@extends('layouts.frontend')

@section('content')
<!--background Area Start-->
<div class="backgrount-area bg-chemistry  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Physics Tuition</span>
                            </h1>
                            <p>Give your child the best education possible with tutoring from our experienced & dedicated UK teachers!</p>
                            <div class="literature-text banner-ul">
                                <p class="mb-2">
                                    We teach the following specifications in Physics :
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

                            </div>
                            <div class="banner-readmore">
                                <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
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
<div class="english-abc res-pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 res-mb-40">
                <div class="bio-img">
                    <img src="{{asset('uploads/all_subject/physics-image.jpg')}}" class="img-sci-bios" alt="physics-img">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Science for all students
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our philosophy is science for all students. We believe that science has something to offer
                            every student. That's why we offer a range of intensive teaching / tutoring for all Key Stages
                            from KS2 (Primary), KS3 (Junior Secondary), KS4 (GCSE) & KS5 (A-level) and our lessons suit
                            students of all abilities and all aspirations.</p>
                        <p>
                            Once you start lessons with us, you'll see that our teaching of Biology, along with Chemistry
                            and Physics, is clear, straightforward and follows your specification. For GCSE & A-level,
                            there is and exam at the end of the course. Our Tutors will ensure that you are ready for such
                            exams, and this will make you realise your potential.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<!-- GCSE topics start -->
<div class="gcse-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">AQA - GCSE (9-1) Physics
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Paper 1
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Energy
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Electricity
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Particle model and matter
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Atomic structure
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne-two">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne-two" aria-expanded="true" aria-controls="collapseOne-two">
                                                Paper 2
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseOne-two" class="collapse" aria-labelledby="headingOne-two" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Forces
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Waves
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Magnetism and electromagnetism
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Space Physics
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-Physics-GCSE-9-1-Specification.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                Physics GCSE (9-1) Specification</a>
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
                                <h5 class="mb-3">Physics Required Practicals
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingtwo">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Covering some of the following tasks:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <h4> AQA</h4>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating Specific Heat Capacity.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the effectiveness of different materials as thermal insulators.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the factors affecting the resistance of electrical circuits.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investing the I-V characteristics of a variety of circuit elements.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Determining the density of Solids and liquids
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the relationship between Force and Extension.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating factors that affect acceleration.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the frequency, wavelength and speed of waves in solids and liquids.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the reflection and Refraction of light.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating how much infrared radiation is absorbed or radiated by a surface.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-paper">
                                                    <div class="downloaded-file">
                                                        <p>We also cover the following specifications at GCSE level</p>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-PHYSICS-8463-REQUIRED-PROCTICALS-HANDBOOK-1-1.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                Physics Required Practicals Handbook </a>
                                                        </div>

                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Edexcel-GCSE-Physics-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Edexcel GCSE Physics (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-Cambridge-Physics-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE Cambridge Physics (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-OCR-Gateway-Physics-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE OCR Gateway Physics (9-1) Specifications
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/OCR-21st-GCSE-PHYSICS-B.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE OCR 21st Century Physics (9-1) Specifications
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/IGCSE-Physics-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Edexcel IGCSE Physics (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/N5-PHYSICS-Spec.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Nat 5 (Scottish spec)
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/EDUQAS-wjec-gcse-physics-pec.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Eduqas (Welsh spec)
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/NI-GCSE-Physics-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                NI spec
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">AQA A-Level Physics
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingthree">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                                Covering the following topics:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Measurements and their errors
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Particles and radiation
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Waves
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Mechanics and materials
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Electricity
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Further mechanics and thermal physics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Fields and their consequences (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Nuclear physics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Astrophysics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Medical physics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Engineering physics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Turning points in physics (A-level only)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Electronics (A-level only)

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="downloaded-file">
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/AQA-A-LEVEL-PHYSIC-PRACTICAL-HANDBOOK.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                    AS A-Level Physics Specification</a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/Edexcel-A-Level-Physics.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel A-Level Physics</a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/OCR-A-LEVEL-PHYSICS-B.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>OCR
                                                                    A-Level Physics</a>
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
                                <h5 class="mb-3">AQA A-level Physics Required practical activities:
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingfour">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                                Covering the following topics:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the variation of the frequency of stationary waves on a string with
                                                                length, tension and mass per unit length of the string.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P1.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of interference effects to include the Young’s slit experiment and
                                                                interference by a diffraction grating
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P2.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Determination of g by a free-fall method.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P3.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Determination of the Young modulus by a simple method.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P4.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Determination of resistivity of a wire using a micrometer, ammeter and voltmeter.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P5.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of the emf and internal resistance of electric cells and batteries by
                                                                measuring the variation of the terminal pd of the cell with current in it.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P6.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into simple harmonic motion using a mass-spring system and a simple
                                                                pendulum.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P7.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of Boyle’s (constant temperature) law and Charles’s (constant
                                                                pressure) law for a gas.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P8.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of the charge and discharge of capacitors. Analysis techniques should
                                                                include log-linear plotting leading to a determination of the time constant RC
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P9.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigate how the force on a wire varies with flux density, current and length of
                                                                wire using a top pan balance.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P10.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigate, using a search coil and oscilloscope, the effect on magnetic flux linkage
                                                                of varying the angle between a search coil and magnetic field direction.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P11.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of the inverse-square law for gamma radiation.
                                                                <div class="downloaded-file">
                                                                    <div class="chemistry-icon-text">
                                                                        <a href="{{asset('uploads/all_subject/pdf/physics_a_level/AQA-7407-7408-SUG-P12.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Practical PDF attached here</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div class="downloaded-file">
                                                        <p>We also teach the following specifications at A-level:</p>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Edexcel-A-Level-Physics.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Edexcel A-Level Physics
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/OCR-A-LEVEL-PHYSICS-B.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                OCR A-Level Physics
                                                            </a>
                                                        </div>
                                                        <!-- <div class="chemistry-icon-text">
                                                            <a href="javascript:void(0)" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Cambridge A-level Physics
                                                            </a>
                                                        </div> -->
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/SCOTTISH-Highers-Spec-Physics.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Scottish Highers
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Eduqas-A -level-Physics-Spec.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Eduqas A-level Physics
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/NI-GCSE-Physics-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                NI spec
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-A-LEVEL-PHYSIC-PRACTICAL-HANDBOOK.PDF')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                AS A-Level Physics Specification</a>
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
<div class="relevant-specific biology-relevant">
    <div class="container">
        <div class="relevant-and-diverse">
            <h4 class="title">Specifications developed by teachers for teachers</h4>
            <p>
                The specifications we use are for the main recognised exam boards which have been
                developed with the involvement of thousands of UK qualified teachers. So you can be
                confident that our GCSE & A-level Physics is relevant and interesting to teach and to learn.
                Our specifications ensure that:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content is presented clearly, in a logical teaching & learning order. We’ve
                    also given teaching guidance and signposted opportunities for skills development
                    throughout the specification
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content and required / core practicals in our GCSE Combined Science:
                    Trilogy are also in our GCSE Physics, Chemistry and Biology, So you have the
                    flexibility to co-teach or to move your students between courses.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">We have also included all A-level Physics required / core Practicals in the A-level
                    Physics specification.

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">all our science qualifications provide opportunities for progression. Our GCSE
                    Physics includes progression in the subject content and consistency in the exam
                    questions, so that our students have the best preparation for A-level.
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse">
            <h4 class="title">Our practicals have been trialled by teachers</h4>
            <p>
                There’s no better way to learn about science than through purposeful practical activities as
                part of day-to-day teaching and learning
            </p>
            <p>Our required /core practicals:</p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are clearly laid out in the specification, so you know exactly what’s required
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are deliberately open, so you can teach in the way that suits you and your students

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have already been trialled in schools.
                </li>
            </ul>
            <p>
                You’ll find even more support and guidance in our practical handbook, which includes
                recommendations and advice from teachers in the trial.
            </p>
        </div>
        <div class="relevant-and-diverse">
            <h4 class="title">Straightforward exams, so students can give straightforward answers </h4>
            <p>
                The exam boards we work with have improved their question papers. You’ll find that their
                exams:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">use more straightforward language and fewer words so they’re easier to understand
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have fewer contexts so students don’t get confused
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have questions that increase in difficulty so students feel confident
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have been written with our GCSE and A-level science teams, so students have
                    consistency between content and questions
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse">
            <h4 class="title">Support and resources to help you teach</h4>
            <p>
                We’ve worked with experienced teachers to provide you with a range of resources that will
                help you confidently plan, teach and prepare for exams.
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
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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Chemistry Tuition</span>
                            </h1>
                            <p>Give your child the best education possible with tutoring from our experienced & dedicated UK teachers!</p>
                            <div class="literature-text banner-ul">
                                <p class="mb-2">
                                    We teach the following specifications in Chemistry :
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
                            <!-- <p>
                                            At Science Clinic Private Tutoring we offer a range of tuition services aimed at providing learning and skills for Key stage 3, GCSE/IGCSE, A-Level, levels of education. We work with your child’s current syllabus to ensure they receive expert tuition
                                            in a structured and fun way.
                                        </p> -->
                            <div class="banner-readmore">
                                <a class="button-default inline" href="{{('find-tutor')}}">Find a Tutor</a>
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
            <div class="col-lg-6 col-md-6">
                <div class="bio-img">
                    <img src="{{asset('uploads/all_subject/chemistry-image.jpg')}}" class="img-sci-bios" alt="chemist-img">
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
<div class="gcse-text chemistry-gcse-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">AQA - GCSE (9-1) Chemistry Topics covered:
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
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Atomic structure and the periodic table
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Bonding, structure and properties of matter
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Quantitative chemistry
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Chemical changes
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Energy changes

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
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">The rate and extent of chemical change
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Organic chemistry
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Chemical analysis
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Chemistry of the atmosphere
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Using resources.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Key-Stage-3-Science-Specification-2.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Key Stage 3 Science Specifications</a>
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
                                <h5 class="mb-3">AQA – GCSE (9-1) Chemistry Required Practicals
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingtwo">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Covering the following topics:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Preparing a pure, dry sample of a soluble salt.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Determining reacting volumes of a strong acid and an alkali by titration.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating electrolysis of aqueous solutions
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the variables that affect temperature changes in reacting solutions.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating how changes in concentration affect the rates of reactions.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating Paper Chromatography.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Using Chemical tests to identify ions
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Analysing and Purifying water samples.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-paper">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-CHEMISTRY-8462-PRACTICALS-HANDBOOK-1.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                Chemistry Required Practicals Handbook </button>
                                                        </div>
                                                        <p>
                                                            We also teach the following specifications at GCSE level:
                                                        </p>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Edexcel-GCSE-Chemistry-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Edexcel GCSE Chemistry (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-Cambridge-Chemistry-9-1-Specification-1.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE Cambridge Chemistry (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-OCR-Gateway-Chemistry-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE OCR Gateway Chemistry (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/OCR-21st-CENTUARY-CHEMISTRY-B.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                GCSE OCR 21st Century Chemistry (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/IGCSE-Chemistry-9-1-Specification-new.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Edexcel IGCSE Chemistry (9-1) Specification
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/N5-Spec-Chemistry.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Nat 5 (Scottish spec)
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Eduqas-wjec-gcse-Chemistry-Spec.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                Eduqas (Welsh spec)
                                                            </a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-Chemistry-NI-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
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
                                <h5 class="mb-3">AQA A-Level Chemistry
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
                                                        <h4 class="pt-3"> Physical chemistry</h4>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Atomic_structure">Atomic structure</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Amount_of_substance">Amount of substance</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Bonding">Bonding</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Energetics">Energetics</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Kinetics">Kinetics</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Chemical_equilibria_Le_Chateliers_principle_and_Kc">Chemical equilibria, Le Chatelier’s principle and Kc</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Oxidation_reduction_and_redox_equations">Oxidation, reduction and redox equations</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Thermodynamics_A-level_only">Thermodynamics (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Rate_equations_A-level_only">Rate equations (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Equilibrium_constant_Kp_for_homogeneous_systems_A-level_only">Equilibrium constant Kp for homogeneous systems (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="javascript:void(0)">Electrode potential and electrochemical cells (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/physical-chemistry#Acids_and_bases_A-level_only">Acids and bases (A-level only)</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="qualified-details">
                                                            <h4 class="pt-3">Inorganic chemistry</h4>
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Periodicity">Periodicity</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Group_2_the_alkaline_earth_metals">Group 2, the alkaline earth metals</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Group_717_the_halogens">Group 7(17), the halogens</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Properties_of_Period_3_elements_and_their_oxides_A-level_only">Properties of Period 3 elements and their oxides (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Transition_metals_A-level_only">Transition metals (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/inorganic-chemistry#Reactions_of_ions_in_aqueous_solution_A-level_only">Reactions of ions in aqueous solution (A-level only)</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="qualified-details">
                                                            <h4 class="pt-3">Organic chemistry</h4>
                                                            <ul class="biolody-ul pt-2 pb-2">
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Alkanes">Alkanes</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Halogenoalkanes">Halogenoalkanes</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Alkenes">Alkenes</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Alcohols">Alcohols</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Organic_analysis">Organic analysis</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Optical_isomerism_A-level_only">Optical isomerism (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Aldehydes_and_ketones_A-level_only">Aldehydes and ketones (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Carboxylic_acids_and_derivatives_A-level_only">Carboxylic acids and derivatives (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Aromatic_chemistry_A-level_only">Aromatic chemistry (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Amines_A-level_only">Amines (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Polymers_A-level_only">Polymers (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Amino_acids_proteins_and_DNA_A-level_only">Amino acids, proteins and DNA (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Organic_synthesis_A-level_only">Organic synthesis (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Nuclear_magnetic_resonance_spectroscopy_A-level_only">Nuclear magnetic resonance spectroscopy (A-level only)</a>
                                                                </li>
                                                                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/chemistry-7404-7405/subject-content/organic-chemistry#Chromatography_A-level_only">Chromatography (A-level only)</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-paper">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-Chemistry-GCSE-9-1-Specification.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                Chemistry (9-1) Specification</a>
                                                        </div>
                                                        <div class="gcse-titles">
                                                            <p class="pt-2 pb-2">
                                                                We also teach the following specifications:
                                                            </p>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Edexcel-GCSE-Chemistry-9-1-Specification-new.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel GCSE Chemistry (9-1)
                                                                Specification</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-Cambridge-Chemistry-9-1-Specification-1-new.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>GCSE
                                                                Cambridge Chemistry (9-1) Specification</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/GCSE-OCR-Gateway-Chemistry-9-1-Specification-new.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>GCSE
                                                                OCR Gateway Chemistry (9-1) Specification</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/IGCSE-Chemistry-9-1-Specification.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>IGCSE
                                                                Chemistry (9-1) Specification</a>
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
                                <h5 class="mb-3">AQA A-level Chemistry Required practical activities:
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
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Make up a volumetric solution and carry out a simple acid–base titration
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Measurement of an enthalpy change
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of how the rate of a reaction changes with temperature
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Carry out simple test-tube reactions to identify:
                                                                <ul class="inner-maths">
                                                                    <li>
                                                                        cations – Group 2, NH4<sup>+</sup>
                                                                    </li>
                                                                    <li>anions – Group 7 (halide ions), OH<sup>–</sup>, CO32<sup>–</sup>, SO42sup>–</sup>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Distillation of a product from a reaction
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Tests for alcohol, aldehyde, alkene and carboxylic acid
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Make up a volumetric solution and carry out a simple acid–base titration (A-level)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Measurement of an enthalpy change (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation of how the rate of a reaction changes with temperature (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> Carry out simple test-tube reactions to identify: (A-level).
                                                                <ul class="inner-maths">
                                                                    <li>
                                                                        cations – Group 2, NH4<sup>+</sup>
                                                                    </li>
                                                                    <li>anions – Group 7 (halide ions), OH<sup>–</sup>, CO32<sup>–</sup>, SO42<sup>–</sup>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Distillation of a product from a reaction (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Tests for alcohol, aldehyde, alkene and carboxylic acid (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Measuring the rate of reaction: (A-level)
                                                                <ul class="inner-maths">
                                                                    <li>
                                                                        by an initial rate method
                                                                    </li>
                                                                    <li>by a continuous monitoring method
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">
                                                                Measuring the EMF of an electrochemical cell (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">
                                                                Investigate how pH changes when a weak acid reacts with a strong base and when a
                                                                strong acid reacts with a weak base (A-level)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Preparation of: (A-level).
                                                                <ul class="inner-maths">
                                                                    <li>
                                                                        a pure organic solid and test of its purity
                                                                    </li>
                                                                    <li>a pure organic liquid
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">
                                                                Carry out simple test-tube reactions to identify transition metal ions in aqueous
                                                                solution (A-level).
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">
                                                                Separation of species by thin-layer chromatography (A-level).
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="qualified-details">
                                                        <h4>We also teach the following A-level
                                                            specifications:</h4>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Edexcel A-Level Chemistry
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">OCR A-Level Chemistry
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Cambridge A-level Chemistry </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Scottish Highers
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Eduqas A-level Chemistry
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">NI spec
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div class="downloaded-file">
                                                        <p>We also teach the following specifications at A-level:</p>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Edexcel-A-Level-Chemistry.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Edexcel A-Level Chemistry</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/OCR-A-LEVEL-CHEMISTRY-B-SPEC.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>OCR A-Level Chemistry</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="javascript:void(0)" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Cambridge A-level Chemistry</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Scottish-Higher-Spec-for-Chemistry.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Scottish Highers</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/Eduqas-A-level-Chemistry-Spec.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>Eduqas A-level Chemistry</a>
                                                        </div>
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/A-LEVEL-Chemistry-NI-Specification.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>NI spec</a>
                                                        </div>
                                                        <!-- <div class="chemistry-icon-text">
                                                                        <a href="javascript:void(0)" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                            AS & A-Level Chemistry Specification</a>
                                                                    </div> -->
                                                        <!-- <div class="chemistry-icon-text">
                                                                        <a href="javascript:void(0)" type="button" class="btn download-pdfs"><i
                                                                                class="fa fa-book mr-2"></i>Edexcel A-Level Chemistry</a>
                                                                    </div> -->
                                                        <!-- <div class="chemistry-icon-text">
                                                                        <a href="javascript:void(0)" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>OCR
                                                                            A-Level Chemistry</a>
                                                                    </div> -->
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
        <div class="relevant-and-diverse chemistry-diverse">
            <h4 class="title">Specifications developed by teachers for teachers</h4>
            <p>
                The specifications we use are for the main recognised exam boards which have been
                developed with the involvement of thousands of UK qualified teachers. So you can be
                confident that our GCSE & A-level Chemistry is relevant and interesting to teach and to
                learn. Our specifications ensure that:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5 mobile-biology-ul">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content is presented clearly, in a logical teaching & learning order. We’ve
                    also given teaching guidance and signposted opportunities for skills development
                    throughout the specification
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content and required / core practicals in our GCSE Combined Science:
                    Trilogy are also in our GCSE Chemistry, Biology and Physics, So you have the
                    flexibility to co-teach or to move your students between courses.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">We have also included all A-level Chemistry required / core Practicals in the A-level
                    Chemistry specification.
                </li>
                <li><img src="img/svg/right-arrow.png" class="list-down">all our science qualifications provide opportunities for progression. Our GCSE
                    Biology includes progression in the subject content and consistency in the exam
                    questions, so that our students have the best preparation for A-level.
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse chemistry-diverse">
            <h4 class="title">Our practicals have been trialled by teachers</h4>
            <p>
                There’s no better way to learn about science than through purposeful practical activities as
                part of day-to-day teaching and learning.
            </p>
            <p>Our required /core practicals:</p>
            <ul class="biolody-ul pt-2 pb-2 pl-5 mobile-biology-ul">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are clearly laid out in the specification, so you know exactly what’s required
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are deliberately open, so you can teach in the way that suits you and your students

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have already been trialled in schools
                </li>
            </ul>
            <p>
                You’ll find even more support and guidance in our practical handbook, which includes
                recommendations and advice from teachers in the trial.

            </p>
        </div>
        <div class="relevant-and-diverse chemistry-diverse">
            <h4 class="title">Straightforward exams, so students can give straightforward answers </h4>
            <p>
                The exam boards we work with have improved their question papers. You’ll find that their
                exams:

            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5 mobile-biology-ul">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">use more straightforward language and fewer words so they’re easier to understand
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have fewer contexts so students don’t get confused
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have questions that increase in difficulty, so students feel confident
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have been written with our GCSE and A-level science teams, so students have
                    consistency between content and questions.
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse chemistry-diverse">
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
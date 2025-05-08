@extends('layouts.frontend')

@section('content')
<!--background Area Start-->
<div class="backgrount-area bg-bilology full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Combined Sciences Tuition</span>
                            </h1>
                            <p>Give your child the best education possible with tutoring from our experienced & dedicated UK teachers!</p>
                            <div class="literature-text banner-ul">
                                <p class="mb-2">
                                    We teach the following specifications in Combined Science :
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
            <div class="col-lg-6 col-md-12">
                <div class="bio-img">
                    <div class="">
                        <div class="owl-carousel owl-theme common-entrance-carousel">
                            <div class="item">
                                <div class="child-img">
                                    <img src="{{asset('uploads/all_subject/circulatory-system-image-1-min.jpg')}}" class="w-100">
                                </div>
                            </div>
                            <div class="item">
                                <div class="child-img">
                                    <img src="{{asset('uploads/all_subject/circulatory-system-image-min.jpg')}}" class="w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
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
                            <div class="paper-flex paper-sub-title">
                                <h5 class="mb-3">AQA - GCSE (9-1) Combined Sciences Topics covered:
                                </h5>
                                <div class="title-grids">
                                    <h6 class="pt-2 pb-2"> Biology</h6>
                                </div>
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

                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Cell biology
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Organisation
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Infection and response
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Bioenergetics
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
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Homeostasis and response
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Inheritance
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Variation and evolution
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Ecology
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-grids">
                                    <h6 class="pt-2 pb-2"> Chemistry:</h6>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingTwo-one">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo-one" aria-expanded="true" aria-controls="collapseTwo-one">
                                                Paper 1
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTwo-one" class="collapse" aria-labelledby="headingTwo-one" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Atomic structure and the Periodic table
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Bonding, structure and the properties of matter
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Quantitive chemistry
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
                                    <div class="card-header" id="headingTwo-two">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTwo-two" aria-expanded="true" aria-controls="collapseTwo-two">
                                                Paper 2
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTwo-two" class="collapse" aria-labelledby="headingTwo-two" data-parent="#accordion">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-grids">
                                    <h6 class="pt-2 pb-2"> Physics:</h6>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingThree-one">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseThree-one" aria-expanded="true" aria-controls="collapseThree-one">
                                                Paper 1
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseThree-one" class="collapse" aria-labelledby="headingThree-one" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Energy
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Electricity
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Particle model of matter
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
                                    <div class="card-header" id="headingThree-two">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseThree-two" aria-expanded="true" aria-controls="collapseThree-two">
                                                Paper 2
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseThree-two" class="collapse" aria-labelledby="headingThree-two" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Forces
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Waves
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Magnetism and electromagnetism.
                                                            </li>
                                                        </ul>
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
                                <h5 class="mb-3">AQA – GCSE (9-1) Combined Sciences Required Practicals
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
                                                        <p class="pt-2 pb-2" style="font-weight: 700;">
                                                            Biology Trilogy:
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Using a light Microscope to observe animal and Plant cells.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the effects of sugar or salt on the mass of plant tissues.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Testing for Carbohydrates, Lipids and Proteins.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the effects of pH on Amylase.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the effect of light intensity on Photosynthesis.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the effect of practice on reaction time.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating population size.
                                                            </li>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-paper">
                                                    <div class="qualified-details">
                                                        <p class="pt-2 pb-2" style="font-weight: 700;">
                                                            Chemistry Trilogy:
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Preparing a pure, dry sample of a soluble salt.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating electrolysis of aqueous solutions
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the variables that affect temperature changes in reacting solutions.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating how changes in concentration affect the rates of reactions.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating Paper Chromatography.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Analysing and Purifying water samples.
                                                            </li>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper col-paper">
                                                    <div class="qualified-details">
                                                        <p class="pt-2 pb-2" style="font-weight: 700;">
                                                            Physics Trilogy:
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating Specific Heat Capacity.
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
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the Frequency, Wavelength and Speed of waves in solids and liquids.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating how much infrared radiation is absorbed or radiated by a surface.
                                                            </li>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper col-paper">
                                                    <div class="qualified-details">
                                                        <div class="downloaded-file">
                                                            <p>We also cover the following specifications at GCSE level</p>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/Edexcel-GCSE-Combined-Science-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Edexcel GCSE Combined Science (9-1) Specification
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="javascript:void(0)" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE Cambridge Combined Science (9-1) Specification

                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/OCR-GCSE-GATEWAY-COMBINED-SCIENCE.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE OCR Gateway Combined Science (9-1) Specifications
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/OCR-21st-CENTUARY-COMBINED-SCIENCE-B.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE OCR 21st Century Combined Science (9-1) Specifications
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/IGCSE-Edwxcel-Combined-Science-specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Edexcel IGCSE Double Science (9-1) Specification

                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/AQA-Combined-Science-GCSE-Trilogy.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    AQA GCSE Synergy (9-1) Specification
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
        </div>
    </div>
</div>
<!-- GCSE topics End -->
<div class="relevant-specific biology-relevant">
    <div class="container">
        <div class="relevant-and-diverse combined-diverses">
            <h4 class="title">Specifications developed by teachers for teachers</h4>
            <p>
                The specifications we use are for the main recognised exam boards which have been
                developed with the involvement of thousands of UK qualified teachers. So you can be
                confident that our GCSE Combined Science is relevant and interesting to teach and to learn.
                Our specifications ensure that:

            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content is presented clearly, in a logical teaching & learning order. We’ve
                    also given teaching guidance and signposted opportunities for skills development
                    throughout the specification
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">the subject content and required / core practicals in our GCSE Combined Science:
                    Trilogy are also in our GCSE Biology, Chemistry and Physics, So you have the
                    flexibility to co-teach or to move your students between courses.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">We have also included all A-level Biology required / core Practicals in the A-level
                    Biology specification.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">all our science qualifications provide opportunities for progression. Our GCSE
                    Combined Science includes progression in the subject content and consistency in the
                    exam questions, so that our students have the best preparation for A-level.
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse combined-diverses">
            <h4 class="title">Our practicals have been trialled by teachers </h4>
            <p>
                There’s no better way to learn about science than through purposeful practical activities as
                part of day-to-day teaching and learning.
            </p>
            <p>The exam boards we work with have improved their question papers. You’ll find that their
                exams:</p>
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
        <div class="relevant-and-diverse combined-diverses">
            <h4 class="title">Straightforward exams, so students can give straightforward answers</h4>
            <p>
                We’ve improved our question papers. You’ll find that our exams:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">use more straightforward language and fewer words so they’re easier to understand
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have fewer contexts so students don’t get confused

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have questions that increase in difficulty so students feel confident
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have been written with our GCSE and A-level science teams, so students have
                    consistency between content and questions.
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse combined-diverses">
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
    $('.common-entrance-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2300,
        autoHeight: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 1
            }
        }
    })
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
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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Biology Tuition</span>
                            </h1>
                            <!-- <p>
                                            At Science Clinic Private Tutoring we offer a range of tuition services aimed at providing learning and skills for Key stage 3 and GCSE/IGCSE levels of education. We work with your child’s current syllabus to ensure they receive expert tuition in a structured
                                            and fun way.
                                        </p> -->
                            <p>Give your child the best education possible with tutoring from our
                                experienced & dedicated UK teachers!</p>
                            <div class="literature-text banner-ul">
                                <p class="mb-2">
                                    We teach the following specifications in Biology :
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
            <div class="col-lg-6 col-md-6">
                <div class="bio-img">
                    <img src="{{asset('uploads/all_subject/biology-image-min.jpg')}}" class="img-sci-bios" alt="bio-text">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Science for all students
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our philosophy is science for all students. We believe that science has something
                            to offer
                            every student. That's why we offer a range of intensive teaching / tutoring for
                            all Key Stages
                            from KS2 (Primary), KS3 (Junior Secondary), KS4 (GCSE) & KS5 (A-level) and our
                            lessons suit
                            students of all abilities and all aspirations.</p>
                        <p>
                            Once you start lessons with us, you'll see that our teaching of Biology, along
                            with Chemistry
                            and Physics, is clear, straightforward and follows your specification. For GCSE
                            & A-level,
                            there is and exam at the end of the course. Our Tutors will ensure that you are
                            ready for such
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
                                <h5 class="mb-3">AQA – GCSE (9-1) Biology Topics covered
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
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Inheritance, variation
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Evolution and ecology
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="downloaded-file">
                                                        <div class="chemistry-icon-text">
                                                            <a href="{{asset('uploads/all_subject/pdf/AQA-A-LEVEL-BIOLOGY-SPEC.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                Biology (9-1) Specification</a>
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
                                <h5 class="mb-3">A-Level Biology
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
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/biological-molecules">Biological
                                                                    molecules</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/cells">
                                                                    Cells</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/organisms-exchange-substances-with-their-environment">Organisms
                                                                    exchange substances with their
                                                                    environment</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/genetic-information,-variation-and-relationships-between-organisms">
                                                                    Genetic information, variation and
                                                                    relationships between organisms</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/energy-transfers-in-and-between-organisms-a-level-only">
                                                                    Energy transfers in and between
                                                                    organisms (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/organisms-respond-to-changes-in-their-internal-and-external-environments-a-level-only">
                                                                    Organisms respond to changes in their
                                                                    internal and external environments
                                                                    (A-level
                                                                    only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/genetics,-populations,-evolution-and-ecosystems-a-level-only">
                                                                    Genetics, populations, evolution and
                                                                    ecosystems (A-level only)</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/the-control-of-gene-expression-a-level-only">
                                                                    The control of gene expression (A-level
                                                                    only)</a>
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
                                <h5 class="mb-3">Biology Required Practicals
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingthree">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                                Covering some of the following tasks:
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-6 col-paper">
                                                    <div class="qualified-details">
                                                        <h4 class="pt-3">Covering some of the following
                                                            tasks:</h4>
                                                        <h4> AQA</h4>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Using a light
                                                                Microscope to observe animal and Plant
                                                                cells.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of antimicrobial agents.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of sugar or salt on the mass of plant
                                                                tissues.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Testing for
                                                                Carbohydrates, Lipids and Proteins.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of pH on Amylase.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of light intensity on Photosynthesis.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of practice on reaction time.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating the
                                                                effect of light on the growth of seedlings.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating
                                                                population size.
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigating
                                                                temperature and the rate of decay.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-paper">
                                                    <div>
                                                        <div class="downloaded-file">
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/AQA-BIOLOGY-8461-REQUIRED-PRACTICALS-HANDBOOK-1.pdf')}}" target="_blank" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>AQA
                                                                    Biology Required Practicals
                                                                    Handbook</a>
                                                            </div>
                                                            <p>We also teach the following Specifications
                                                            </p>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/Edexcel-GCSE-Biology-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Edexcel GCSE Biology (9-1) Specification
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/GCSE-Cambridge-Biology-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE Cambridge Biology (9-1)
                                                                    Specification

                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/OCR-A-LEVEL-BIOLOGY-A-SPEC.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE OCR Gateway Biology (9-1)
                                                                    Specifications
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/OCR-21st-CENTUARY-BIOLOGY-B.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    GCSE OCR 21st Century Biology (9-1)
                                                                    Specifications
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/IGCSE-Biology-9-1-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Edexcel IGCSE Biology (9-1)
                                                                    Specification
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/N5-Course-Spec-Biology.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Nat 5 (Scottish spec)
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/Eduqas-GCSE-Biology-Spec.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
                                                                    Eduqas (Welsh spec)
                                                                </a>
                                                            </div>
                                                            <div class="chemistry-icon-text">
                                                                <a href="{{asset('uploads/all_subject/pdf/NI-A-LEVEL-Biology-Specification.pdf')}}" target="_blank" type="button" class="btn download-pdfs"><i class="fa fa-book mr-2"></i>
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
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">AQA A-level Biology Required practical activities:
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
                                                    <ul class="biolody-ul pt-2 pb-2">
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the
                                                            effect of a named variable on the rate of an
                                                            enzyme-controlled reaction. </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Preparation of stained squashes of cells from
                                                            plant root tips; set-up and use of an optical
                                                            microscope to identify the stages of mitosis in
                                                            the sestained squashes and calculation of a
                                                            mitotic index.


                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Production of a dilution
                                                            series of a solute to produce a calibration
                                                            curve
                                                            with which to identify the water potential of
                                                            plant tissue.

                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the effect of a named
                                                            variable on the permeability ofcell-surface
                                                            membranes.

                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Dissection of animal or
                                                            plant gas exchange or mass transport system or
                                                            of organ within such a system
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Use of aseptic techniques
                                                            to investigate the effect of antimicrobial
                                                            substances on microbial growth.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Use of chromatography to
                                                            investigate the pigments isolated from leaves
                                                            of different plants, eg leaves from
                                                            shade-tolerant and shade-intolerant
                                                            plants or leaves of different colours.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the
                                                            effect of a named factor on the rate of
                                                            dehydrogenase activity in extracts of
                                                            chloroplasts.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the
                                                            effect of a named variable on the rate of
                                                            respiration of cultures of single-celled
                                                            organisms.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the
                                                            effect of an environmental variable on the
                                                            movement of an animal using either a choice
                                                            chamber or a maze.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Production of a dilution
                                                            series of a glucose solution and use of
                                                            colorimetric techniques to produce a calibration
                                                            curve with which to
                                                            identify the concentration of glucose in an
                                                            unknown ‘urine’ sample.
                                                        </li>
                                                        <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Investigation into the
                                                            effect of a named environmental factor on the
                                                            distribution of a given species.
                                                        </li>
                                                    </ul>
                                                    <div class="qualified-details">
                                                        <h4>We also teach the following A-level
                                                            specifications:</h4>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Edexcel
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">OCR

                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Cambridge </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Scottish Highers
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Northern Ireland Spec
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Eduqas (Welsh spec)
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
        </div>
    </div>
</div>
<!-- GCSE topics End -->
<div class="relevant-specific biology-relevant">
    <div class="container">
        <div class="relevant-and-diverse biology-diverses">
            <h4 class="title">Specifications developed by teachers for teachers </h4>
            <p>
                The specifications we use are for the main recognised exam boards which have been
                developed with the involvement of thousands of UK qualified teachers. So, you can be
                confident that our GCSE & A-level Biology is relevant and interesting to teach and to learn.
                Our specifications ensure that:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">The subject content is presented
                    clearly, in a logical teaching & learning order. We’ve
                    also given teaching guidance and signposted opportunities for skills development
                    throughout the specification
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">The subject content and required /
                    core practicals in our GCSE Combined Science:
                    Trilogy are also in our GCSE Biology, Chemistry and Physics, so you have the
                    flexibility to co-teach or to move your students between courses.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">We have also included all A-level
                    Biology required / core Practicals in the A-level
                    Biology specification.
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">All our science qualifications
                    provide opportunities for progression. Our GCSE
                    Biology includes progression in the subject content and consistency in the exam
                    questions, so that our students have the best preparation for A-level
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse biology-diverses">
            <h4 class="title">Our practicals have been trialled by teacher </h4>
            <p>
                There’s no better way to learn about science than through purposeful practical activities as
                part of day-to-day teaching and learning.
            </p>
            <p>Our required /core practicals:</p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are clearly laid out in the
                    specification, so you know exactly what’s required
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">are deliberately open, so you can
                    teach in the way that suits you and your students

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have already been trialled in
                    schools.
                </li>
            </ul>
            <p>
                You’ll find even more support and guidance in our practical handbook, which includes
                recommendations and advice from teachers in the trial.
            </p>
        </div>
        <div class="relevant-and-diverse biology-diverses">
            <h4 class="title">Straightforward exams, so students can give straightforward answers </h4>
            <p>
                We’ve improved our question papers. You’ll find that our exams:
            </p>
            <ul class="biolody-ul pt-2 pb-2 pl-5">
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">use more straightforward language
                    and fewer words so they’re easier to understand
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have fewer contexts so students
                    don’t get confused

                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have questions that increase in
                    difficulty, so students feel confident
                </li>
                <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">have been written with our GCSE
                    Maths and A-level science teams, so students have
                    consistency between content and questions
                </li>
            </ul>
        </div>
        <div class="relevant-and-diverse biology-diverses">
            <h4 class="title">Support and resources to help you teach</h4>
            <p>
                We’ve worked with experienced teachers to provide you with a range of resources that will
                help you confidently plan, teach and prepare for exams
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
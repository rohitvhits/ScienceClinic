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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Primary School (KS1 & KS2) Tuition</span>
                            </h1>
                            <p>
                                Find the perfect Key Stage 1 & Key stage 2 (Primary) tutor for your child!
                                Our expert Primary (KS1 & KS2) tutors cover Reception, KS1 (Yr 1 & 2) & KS2 (Yr 3, 4, 5 & 6).
                                KS1 & KS2 are equivalent to P1 – P7 (Primary School education in Scotland)
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
<div class="english-abc pri-english-abc res-pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <!--Slider Area Start-->
                <div class="">
                    <div class="owl-carousel owl-theme primary-school-carousel">

                        <div class="item">
                            <div class="child-img">
                                <img src="{{asset('uploads/all_subject/ps-1.jpg')}}" class="w-100">
                            </div>
                        </div>
                        <div class="item">
                            <div class="child-img">
                                <img src="{{asset('uploads/all_subject/ps-2.jpg')}}" class="w-100">
                            </div>
                        </div>
                        <div class="item">
                            <div class="child-img">
                                <img src="{{asset('uploads/all_subject/ps-3.jpg')}}" class="w-100">
                            </div>
                        </div>





                    </div>
                </div>

                <!--End of Slider Area-->
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text primary-qualified-text">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>
                            All our tutors have massive experience in helping children with Maths, English, Spelling and
                            Reading, whatever their ability.
                        </p>
                        <p>
                            We work with fully qualified tutors /teachers to teach at KS1 & KS2, they are all educated to
                            the minimum of a degree, some have postgraduate, and others have doctorates. Lessons
                            will be structured around your child’s level and to their required specification.
                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national curriculum
                            and any changes in educational standards.
                        </p>
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
<!-- GCSE topics start -->
<div class="gcse-text">
    <div class="container">
        <div>
            <div class="gcseflexcenter ">
                <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center title2-law mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight"> When do SATs assessments take place?                              </span>
                            </h5> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">When do SATs assessments take place?</h4>
                </div>

            </div>
            <p class="mt-3 text-center">
                In England, children take SATs twice in their school career, at the end of KS1 and KS2
                courses.
            </p>
        </div>

    </div>
</div>
<div class="gcse-text primary-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">Key stage 1 SATs
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingone">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                                                Covering the following topics:
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <p><b>These assessments take place in the May of year 2 (age 7) and test children’s ability in maths and reading (plus an optional test in English grammar, punctuation and spelling). The tests are informal, so they aren’t timed, and they take place in a normal classroom situation. From 2023, they will be made non-statutory, so schools will choose whether to administer them or not.</b></p>
                                                        <p>For Key stage 1, the tests cover:</p>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/biological-molecules">
                                                                    English reading</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/cells">
                                                                    English grammar, punctuation and spelling</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/organisms-exchange-substances-with-their-environment">
                                                                    Maths</a>
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
                                <h5 class="mb-3">Key stage 2 SATs
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
                                                        <p><b>These assessments take place in the May of year 6 (age 11) and are more formal tests in English (grammar, punctuation, spelling and reading) and maths. Each paper is 45 minutes long.</b></p>
                                                        <h4><b>AQA</b></h4>
                                                        <p>For Key stage 2, the tests cover:</p>
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/biological-molecules">
                                                                    English reading</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/cells">
                                                                    English grammar, punctuation and spelling</a>
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"><a href="https://www.aqa.org.uk/subjects/science/as-and-a-level/biology-7401-7402/subject-content/organisms-exchange-substances-with-their-environment">
                                                                    Maths</a>
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
<div class="who-dowork pri-who-dowork">
    <div class="mb-0 mb-lg-5">
        <div class="container">
            <div class="gcseflexcenter">
                <!-- <div class="gcse-titles text-center">
                                <h5 class="title1 text-center title2-law mb-20">
                                    <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight"> Why SATs?</span>
                                </h5> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">Why SATs?</h4>
                </div>
            </div>
            <div class="subject-include mt-3">
                <p>
                    The principal idea of SATs is to quantify what pupils have learned and understood during
                    their Key Stage 2 (Years 3-6 inclusive). The Department for Education (DfE) processes these
                    results and judges each school’s performance. These results are then used to create school
                    league tables. The tests also help teachers learn each child’s strengths and weaknesses in
                    English, Maths and Science.
                </p>
                <p>
                    Arguably, children should not do any SATs revision in Year 6. Indeed, the perfect scenario for
                    these tests would be for no children to have prepared at all!

                </p>
                <p>
                    Secondly, it’s important to remember that a child cannot “fail” a SATs test. There is no “pass
                    mark”, it is simply trying to measure how much each child has learned throughout KS2.
                </p>
                <p>
                    The SATs exam period can be one of the most stressful times for a child. They often report
                    feeling pressured or worried they will let down their parents, teachers or indeed
                    themselves. To control stress, it’s important that you and your child understand
                    the relative significance of SATs. It’s also important that you have a realistic understanding
                    about how to prepare them.
                </p>
            </div>
        </div>
    </div>
    <div class="mb-0 mb-lg-5">
        <div class="container">
            <div class="gcseflexcenter">
                <!-- <div class="gcse-titles text-center">
                                <h5 class="title1 text-center title2-law mb-20">
                                    <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight"> Should we bother with SATs revision?</span>
                                </h5> -->
                <div class="relevant-and-diverse">
                    <h4 class="title">Should we bother with SATs revision?</h4>
                </div>
            </div>
            <div class="subject-include mt-3">
                <p>
                    A child’s SATs results can have some important consequences. Firstly, they often “carry”
                    their mark into secondary school. These marks are usually used to determine which
                    academic stream they are placed in. For example, strong KS2 SATs results may lead to a
                    child being placed in a more capable Maths set in secondary school. Secondly, don’t
                    underestimate how important it can be for a child to have a positive exam experience. SATs
                    tests are often a child’s first set of “real” exams. If you’re lucky enough to know the feeling
                    of acing a test, you’ll know how motivating this feeling can be. SATs revision in Year 6 isn’t
                    especially inspiring but achieving top marks certainly is.
                </p>

            </div>
        </div>
    </div>
    <div class="mb-0 mb-lg-5">
        <div class="container">
            <div class="gcseflexcenter">
                <div class="relevant-and-diverse">
                    <h4 class="title">Get ready for GCSE!</h4>
                </div>
            </div>
            <div class="subject-include mt-3">
                <p>
                    Only a few years after their KS2 SATs, children will take their GCSEs. After these they will be
                    preparing for their A-Levels, University exams and maybe more. Children need to see exams
                    as a good thing - an opportunity to demonstrate just how much they know and understand.
                    We know they’re young and we know that SATs have little significance in the grand scheme
                    of their education. However, telling them to bury their head in the sand because SATs
                    “don’t matter” is not a good idea. It is not a great example to set and it’s certainly not what
                    they should do for future tests! We believe some Year 6 SATs revision is essential.
                </p>

            </div>
        </div>
    </div>
</div>

</div>

<div class="gcse-text res-pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="paper-section">
                    <div class="paper-card">
                        <div class="paper-body">
                            <div class="paper-flex">
                                <h5 class="mb-3">KS1 & KS2 Compulsory Subjects.
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                The following are compulsory national curriculum subjects at primary school level.
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">English
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Maths
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Science
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Design and technology
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">History
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Geography
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Art and design
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Music
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Physical education (PE), including swimming
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Computing
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Ancient and modern foreign languages (at key stage 2)
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
                                <h5 class="mb-3">Primary schools must also provide:
                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingTen">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                                The following are Primary schools must also provide.
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.gov.uk/national-curriculum/other-compulsory-subjects">relationships and health education</a>

                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.gov.uk/national-curriculum/other-compulsory-subjects">religious education (RE) - but parents can ask for their children to be taken out of
                                                                    the whole lesson or part of it</a>

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
                                <h5 class="mb-3">Schools often also teach:

                                </h5>
                            </div>
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingthree">
                                        <p class="mb-0">
                                            <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                                The following are Schools often also teach.
                                            </button>
                                        </p>
                                    </div>

                                    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row padding-paper">
                                                <div class="col-md-12 col-paper">
                                                    <div class="qualified-details">
                                                        <ul class="biolody-ul pt-2 pb-2">
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> personal, social and health education (PSHE)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> citizenship
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> modern foreign languages (at key stage 1)
                                                            </li>
                                                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down"> <a href="https://www.gov.uk/national-curriculum/other-compulsory-subjects">sex education - parents can ask for their children to be taken out of the lesson if
                                                                    they wish to.

                                                                </a>


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
@include('frontend.subject_offer.subject_offer')
@include('frontend.testimonial.testmonial')
@endsection
@section('page-js')
<script>
    $('.primary-school-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2300,
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
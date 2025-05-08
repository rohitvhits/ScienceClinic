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
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Law Tuition</span>
                            </h1>
                            <p>
                                Science Clinic Private tutors works with a range of teachers from different schools who
                                deliver A-level Law specifications from different exam boards. We have focussed on ensuring that the assessments
                                from these Specifications are clear, accessible and
                                discriminate effectively.
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
                    <img src="{{asset('uploads/all_subject/law1.jpg')}}" class="w-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-mt-20">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why choose Science Clinic Private Tutors?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Our objective is to enable students of all abilities to develop their Law knowledge to their
                            full potential, equipping them with the knowledge to prepare for exams at any level.</p>
                        <p>
                            We make the specification simpler and enables a variety of teaching and learning
                            approaches. This exciting and relevant course studies Law in a balanced framework of
                            physical and human themes and investigates the link between them

                        </p>
                        <p>
                            Our tutors are fully qualified to teach Law, they are all educated to the minimum of a
                            degree, some have postgraduate, and others have doctorates in the subject. Lessons will be
                            structured around your child’s level and to their required specification.
                        </p>
                        <p>
                            Our tutors are constantly updated and trained to keep in line with the national curriculum
                            and any changes in educational standards.
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
<div class="english-abc">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="qualified-text res-p">
                    <div class="single-item-text">
                        <h4 class="mb-3">Why study law?
                        </h4>
                    </div>
                    <div class="qualified-details">
                        <p>Studying Law gives students an understanding of the role of Law in today's society and
                            raises their awareness of the rights and responsibilities of individuals
                        </p>
                        <p>
                            By learning about legal rules and how and why they apply to real life, students also develop
                            their analytical ability, decision making, critical thinking and problem-solving skills. All these
                            skills are highly sought after by higher education and employers.
                        </p>
                        <p>
                            Topics are clearly structured and include:
                        </p>
                        <ul class="biolody-ul pt-2 pb-2">
                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">The nature of law and the English legal system
                            </li>
                            <!-- <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">English legal system
                                            </li> -->
                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Private law
                            </li>
                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Public law
                            </li>
                            <li><img src="{{asset('uploads/all_subject/right-arrow.png')}}" class="list-down">Legal skills
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <img src="{{asset('uploads/all_subject/law2.jpg')}}" class="img-sci-bios" alt="bio-text">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="who-dowork">
    <div class="container">
        <div class="gcseflexcenter">
            <!-- <div class="gcse-titles text-center">
                            <h5 class="title1 text-center  title2-law mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Clear, well-structured exams, accessible for all</span>
                            </h5> -->
            <div class="relevant-and-diverse">
                <h4 class="title">Clear, well-structured exams, accessible for all</h4>
            </div>
        </div>
        <div class="subject-include mt-3">
            <p>
                To enable our students to show their breadth of knowledge and understanding of legal
                issues, we’ve created a included a link to the website that shows simple and straight
                forward structure and layout for exam practice papers, using a mixture of question types
                including multiple choice, short answer, and extended response questions. Assessment
                remains 100% exam based.
            </p>
            <p>
                We’ve worked with experienced teachers to provide you with a range of resources that will
                help you confidently plan, teach and prepare for exams.

            </p>
            <p>
                We have attached Geography specifications from different exam boards that we work with.

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
@extends('layouts.frontend')
@section('content')
<div class="backgrount-area bg-chemistry  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">E-Learning Resources</span>
                            </h1>
                            <p>Give your child the best education possible with our resource created by qualified teachers.</p>
                            <div class="literature-text banner-ul">
                                <p class="mb-2">
                                    Our e-learning resource come from the following specifications :
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
                                <a class="button-default inline" href="{{route('find-tutor')}}">Find a Tutor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 section-title-wrapper test papers-before middle-title-cap">
 <div class="section-title">
  <br><br><br>     

<h4 class="mb-4" align="center" > Explore Our E-Learning Resources by Key Stage</h4></div></div>

<div class="container" style="text-indent: 150px;">   
<h4 class="mb-3">Primary</h4><br>
 <div class="banner-readmore1">
<a class="button-default inline" href="https://classroom.thenational.academy/subjects-by-key-stage/early-years-foundation-stage">Early Years Foundation Stage</a> 
<a class="button-default inline" href="https://classroom.thenational.academy/subjects-by-key-stage/key-stage-1">Key Stage 1</a>
<a class="button-default inline" href="https://classroom.thenational.academy/subjects-by-key-stage/key-stage-2">Key Stage 2</a>
<a class="button-default inline" href="https://doodlelearning.com/11-plus-exam?utm_source=google&utm_medium=cpc&utm_campaign=974505839&utm_term=11%20plus%20exam%20papers&utm_content=659878522213&gad_source=1&gclid=EAIaIQobChMIiry-xvSihQMV645QBh30vQEtEAAYBCAAEgJhUPD_BwE">11 Plus</a><br><br>
</div><br><h4 class="mb-3">Secondary </h4><br>

 <div class="banner-readmore1">
<a class="button-default inline" href="https://classroom.thenational.academy/subjects-by-key-stage/key-stage-3">Key Stage 3</a> 
<a class="button-default inline" href="https://classroom.thenational.academy/subjects-by-key-stage/key-stage-4">Key Stage 4</a>
<a class="button-default inline" href="https://studywise.co.uk/a-level-revision/">A-Level</a>
<a class="button-default inline" href="https://www.iseb.co.uk/shop/">Common Entrance Exams</a>
<a class="button-default inline" href="https://continuityoak.org.uk/lessons">Others</a></div>
<br><br><br><br></div>

<!--

<div class="gcse-text chemistry-gcse-text res-pt-30">
    <div class="container">
        <div class="row">
            @if(count($getElearning) > 0)
            @php $j=1;$i=1; @endphp
            @foreach($getElearning as $key)
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="paper-section">


                    @php $extension = pathinfo($key->upload_data, PATHINFO_EXTENSION); @endphp
                    @php $image = ''; @endphp
                    @if(strtolower($extension) == 'pptx' || strtolower($extension) == 'docx' || strtolower($extension) == 'doc' || strtolower($extension) == 'pdf')

                    @php $image = $key->upload_data; @endphp

                    @if($image !='')
                    <div id="accordion">
                        <div class="card mb-3">
                            <div class="card-header" id="headingOne{{$i}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
                                        <div class="paper-flex">
                                            <h5 class="" style="white-space: pre-line;">{{$key->title}}
                                            </h5>
                                        </div>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne{{$i}}" data-parent="#accordion">
                                <div class="card-body">
                                    <div id="accordion{{$j}}">
                                        <div class="card mb-3">
                                            <div class="card-header" id="headingOne{{$j}}">
                                                @if(auth()->guard('parent')->check())
                                                @if(auth()->guard('parent')->user()->email && auth()->guard('parent')->user()->type == 3 && auth()->guard('parent')->user()->status == "Accepted")
                                                <p class="mb-0">
                                                    <a href="{{route('parent-e-learning')}}">{{strtoupper($extension)}}</a>
                                                </p>
                                                @else
                                                <p class="mb-0">
                                                    <a href="{{route('parent-login')}}">{{strtoupper($extension)}}</a>
                                                </p>
                                                @endif
                                                @else
                                                <p class="mb-0">
                                                    <a href="{{route('parent-login')}}">{{strtoupper($extension)}}</a>
                                                </p>
                                                @endif
                                            </div>
                                            <div id="collapseOne{{$j}}" class="collapse" aria-labelledby="headingOne{{$j}}" data-parent="#accordion{{$j}}">
                                                <div class="card-body">
                                                    <div class="row padding-paper">
                                                        <div class="col-md-12 col-paper">
                                                            <div class="qualified-details">
                                                                {!! $key->description !!}
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

                    @endif

                    @endif



                </div>
            </div>
            @php $j++;$i++; @endphp
            @endforeach
            @endif


        </div>
    </div>
</div>
-->
@include('frontend.subject_offer.subject_offer')
@include('frontend.testimonial.testmonial')
@endsection
@section('page-js')
<script>
    $('.testimonial-english').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: true,
        autoHeight: true,
        margin: 10,
        nav: true,
        navText: [" <img src='{{ asset('front/img/svg/left-arrow-test.png') }}'>",
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
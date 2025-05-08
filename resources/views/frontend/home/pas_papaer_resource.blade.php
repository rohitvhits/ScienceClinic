@extends('layouts.frontend')
@section('content')
<div class="backgrount-area book-bg  full-grayoverlay">
    <div class="banner-content padding-headsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content-wrapper text-center full-width">
                        <div class="text-content text-center-content">
                            <h1 class="title1 text-center max-englishtext mb-20">
                                <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Past Examination Papers</span>
                            </h1>

                            <p>
                                Please find below a selection of past examination papers from AQA, Edexcel, Eduqas, OCR Gateway and OCR Twenty First Century examination boards.
                            </p>
                            <div class="banner-readmore">
                                <a class="button-default inline" href="{{url('contact')}}">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gray-bgs past-papperspd res-past-papperspd">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title-wrapper test papers-before middle-title-cap">
                <div class="section-title">
                    <!-- <h3 class="mb-4">Past Papers</h3> -->
                    <h3 class="mb-4">Past Papers </h3>
                </div>
            </div>
            @php $cnt = 1; @endphp
            @php $i = 1; @endphp
            @if(count($paperData) > 0)
            @foreach($paperData as $key)
            <div class="col-md-6">
                <div class="pb-20">
                    <div id="accordion">
                        <div class="card mb-3">
                            <div class="card-header" id="headingOne_main{{$cnt}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne_main{{$cnt}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$key->category_name}}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne_main{{$cnt}}" class="collapse" aria-labelledby="headingOne_main{{$cnt}}" data-parent="#accordion">
                                <div class="card-body">
                                    <div id="accordion-inner">
                                        @if(count($key->paperArray) > 0)
                                        @foreach($key->paperArray as $ckey)
                                        <div class="card mb-3">
                                            <div class="card-header" id="headingOne{{$i}}">
                                                <p class="mb-0">
                                                    <button class="btn btn-link custom-link-coll collapsed" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
                                                        <span>{{$ckey->paper_title}}</span>
                                                    </button>
                                                </p>
                                            </div>

                                            <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne{{$i}}" data-parent="#accordion-inner">
                                                <div class="card-body">

                                                    <div class="row padding-paper">
                                                        <div class="col-md-12 col-paper">
                                                            <div class="mr-2">
                                                                <!-- <p class="section-read"><span>Section A:</span>Reading</p> -->
                                                                <ul class="section-uls">
                                                                    @if(count($ckey->subjectData) > 0)
                                                                    @foreach($ckey->subjectData as $skey)
                                                                    <li><a href="{{route('past-papers-resources-detail',$skey->id)}}">{{$skey->subjectData->main_title}}</a>
                                                                    </li>
                                                                    @endforeach
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $cnt++; @endphp
            @endforeach
            @endif
        </div>
    </div>

    @include('frontend.subject_offer.subject_offer')
    <!-- English Testimonials area Start-->
    @include('frontend.testimonial.testmonial')
    <!-- English Testimonials area End-->
    <!-- English Testimonials area End-->


    <!--End of Bg White-->
</div>
<!--End of Main Wrapper Area-->


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
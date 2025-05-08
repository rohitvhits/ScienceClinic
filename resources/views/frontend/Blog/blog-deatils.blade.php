@extends('layouts.frontend')
@section('content')
<div class="as-mainwrapper backgrount-area">
    <!--Bg White Start-->
    <div class="bg-white">
        <!--Header Area Start-->
        <div id="header"></div>
        <!--End of Header Area-->
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--Shopping Form Area Start-->
    <div class="shop-grid-area section-padding blog-details-padding blog-detail-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="detail-guide">
                        <h2>{{ $blog->title }}</h2>
                    </div>
                    <div class="blogdetail-img">
                        <img src="{{ $blog->image }}" alt="">
                        <div class="date-img">
                            <p class="mb-0">
                                {{ date('F d, Y', strtotime($blog->created_at)) }}

                            </p>
                        </div>
                    </div>
                    <div class="details-students">
                        <p> {!! $blog->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="details-students">
        </div>
        <!-- English Testimonials area Start-->
        @include('frontend.testimonial.testmonial')
        <!-- English Testimonials area End-->
        <!--Footer Area Start-->
        <div id="footer"></div>
        <!--End of Footer Area-->
    </div>
    <!--End of Bg White-->
</div>
<!--End of Main Wrapper Area-->
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
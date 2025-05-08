@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<style>
    .blue-round {
        background-color: #85bffe9e;
    }

    .lms .svg-icon.svg-icon-primary svg g [fill] {
        fill: #591ed3 !important;
    }

    .direct .svg-icon.svg-icon-primary svg g [fill] {
        fill: #F64E60 !important;
    }

    .contact-list .svg-icon.svg-icon-primary svg g [fill] {
        fill: #3699ff !important;
    }

    .search-inquiry .svg-icon.svg-icon-primary svg g [fill] {
        fill: #FFA800 !important;
    }

	.tutor-bank-details .svg-icon.svg-icon-primary svg g [fill] {
        fill: #236D28 !important;
    }
	
	.blog-list .svg-icon.svg-icon-primary svg g [fill] {
        fill: #4E6A81 !important;
    }
	.subject-master .svg-icon.svg-icon-primary svg g [fill] {
        fill: #696820 !important;
    }

  .testimonials .svg-icon.svg-icon-primary svg g [fill] {
        fill: #ac5800 !important;
    }

    .sub-hed-card {
        height: 120px;
    }

</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Subheader-->

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">

        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <!--begin::Info-->

            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->

                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>

                <!--end::Page Title-->

            </div>

            <!--end::Info-->

        </div>

    </div>

    <!--end::Subheader-->

    <!--begin::Entry-->

    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7 sub-hed-card">
                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2 d-flex align-items-center">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <div class="tutors" style="margin-left: 15px; font-size:25px; color: #FFA800; font-weight:bold; ">
                                {{$totalTutors}}
                            </div>

                            <!--end::Svg Icon-->
                        </span>
                      <a href="https://www.scienceclinic.co.uk/tutor-master">  <p class="text-warning font-weight-bold font-size-h6 mb-0">Total Tutors</p></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 blue-round sub-hed-card">
                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2 d-flex align-items-center">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Add-user.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                            <div class="tutors" style="margin-left: 15px; font-size:25px; color: #3699ff; font-weight:bold; ">
                                {{$totalParents}}
                            </div>
                        </span>
                   <a href="https://www.scienceclinic.co.uk/parent-list">     <p class="text-primary font-weight-bold font-size-h6 mb-0">Total Learners</p></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col bg-light-danger px-6 mb-7 py-8 rounded-xl mr-7 sub-hed-card">
                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2 d-flex align-items-center">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                            <div class="tutors" style="margin-left: 15px; font-size:25px; color: #f64e60; font-weight:bold; ">
                              {{$totalofflineBookings}}
                            </div>
                        </span>
                    <a href="https://www.scienceclinic.co.uk/offline-bookings">    <p class="text-danger font-weight-bold font-size-h6 mb-0">Total Offline Bookings</p></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col bg-light-success mb-7 px-6 py-8 rounded-xl sub-hed-card">
                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2 d-flex align-items-center">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" fill="#000000"></path>   </g>
                           																						
 </svg>
                            <!--end::Svg Icon-->
  <div class="tutors" style="margin-left: 15px; font-size:25px; color: #1bc5bd; font-weight:bold; "> 
                              <!--  {{$totalTickets}} --> <a href="https://www.scienceclinic.co.uk/tutor-form">   <p class="text-success font-weight-bold font-size-h6 mb-0">Allocation Form</p></a>
                            </div>
                        </span>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #a579ff8c !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center lms">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop-macbook.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#8950FC" />
                                        <rect fill="#8950FC" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="https://scienceclinic.ediface.org/" target="_blank">
                               <a href="https://scienceclinicltd.sharepoint.com/sites/ScienceClinicTeachingResources">  <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #591ed3;">
                                   Teaching <br>Resources <br>Library
                                </div></a>
                            </a>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #f66b7a87 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center direct">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M10.8226874,8.36941377 L12.7324324,9.82298668 C13.4112512,8.93113547 14.4592942,8.4 15.6,8.4 C17.5882251,8.4 19.2,10.0117749 19.2,12 C19.2,13.9882251 17.5882251,15.6 15.6,15.6 C14.5814697,15.6 13.6363389,15.1780547 12.9574041,14.4447676 L11.1963369,16.075302 C12.2923051,17.2590082 13.8596186,18 15.6,18 C18.9137085,18 21.6,15.3137085 21.6,12 C21.6,8.6862915 18.9137085,6 15.6,6 C13.6507856,6 11.9186648,6.9294879 10.8226874,8.36941377 Z" fill="#F64E60" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M8.4,18 C5.0862915,18 2.4,15.3137085 2.4,12 C2.4,8.6862915 5.0862915,6 8.4,6 C11.7137085,6 14.4,8.6862915 14.4,12 C14.4,15.3137085 11.7137085,18 8.4,18 Z" fill="#F64E60" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="https://portal.checksdirect.co.uk/" target="_blank">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #F64E60; ">
                                    Checks Direct
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #85bffe57 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center contact-list">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="{{URL::to('contact-list')}}">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #3699ff; ">
                                    Contact List
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #ffeb3b54 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center search-inquiry">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="{{route('subject.inquiry')}}">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #FFA800; ">
                                    Search Inquiries
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
<!--New -->

<div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #d4efc8 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center tutor-bank-details">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "></path>
                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"></path>
                                </g>
                            </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="https://www.scienceclinic.co.uk/tutor-bank-details">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #236D28; ">
                                    Tutor <br>Bank<br> Details
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
<!--2new-->
	<div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color:#EAF295 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center subject-master">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"></path>
                                    <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                         <a href="https://www.scienceclinic.co.uk/subject-master">
                               <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #696820; ">
                                   Subject Master 
                                </div>
     </a>
                            
                        </span>
                    </div>
                </div>		
              
              <!--3new-->
	<div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #a5bdd2 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center blog-list">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>
                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                </g>
                            </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="https://www.scienceclinic.co.uk/blog-master">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #4E6A81; ">
                                    ⁠Blog List
                                </div>
                            </a>
                        </span>
                    </div>
                </div>		
  <!--4new-->
	<div class="col-md-3">
                    <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #f4d7b9 !important;">
                        <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center testimonials">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M14.4862 18L12.7975 21.0566C12.5304 21.54 11.922 21.7153 11.4386 21.4483C11.2977 21.3704 11.1777 21.2597 11.0887 21.1255L9.01653 18H5C3.34315 18 2 16.6569 2 15V6C2 4.34315 3.34315 3 5 3H19C20.6569 3 22 4.34315 22 6V15C22 16.6569 20.6569 18 19 18H14.4862Z" fill="black"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7H15C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9H6C5.44772 9 5 8.55228 5 8C5 7.44772 5.44772 7 6 7ZM6 11H11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11Z" fill="black"></path>
                                </g>
                            </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <a href="https://www.scienceclinic.co.uk/pay-claim-form-list">
                                <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #ac5800; ">
                                    Pay Claim Form
                                </div>
                            </a>
                        </span>
                    </div>
                </div>		
</div>
        </div>
        <!--end::Container-->
    </div>
    <div class="container">

    </div>
    <!--end::Entry-->

</div>

@endsection
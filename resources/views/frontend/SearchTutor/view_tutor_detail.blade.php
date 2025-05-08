@extends('layouts.frontend')
@section('content')
@section('page-css')

<link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/fullcalender-css/main.min.css')}}">
<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />
<style>
    .form-data .col-md-6,
    .form-data .col-md-12 {
        margin-bottom: 23px;
    }
    .pass-icons img {
        /* width: 22px; */
        height: 19px;
    }

    .pass-icons {
        top: 46px !important;
        right: 30px !important;
    }

    .fc-event-main {
        float: middle;
        text-align: center;
    }

    .comments hr:last-child {
        display: none;
    }
    .qualification{
        word-break: break-all;
    }
</style>
@endsection

<div class="as-mainwrapper view-tutor">
    <!--Bg White Start-->
    <div class="bg-white">
        <section class="tutors-details">
            <div class="course-details-area section-padding tutor-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="course-details-content">
                                <div class="single-course-details mb-3">
                                    <div class="row align-items-top">
                                        <div class="col-md-5">
                                            <div class="overlay-effect">
                                                <img alt="" src="{{$data->profile_photo}}" class="tutors-detailimg" style="border: 3px solid #107dc2;">
                                                <p class="ml-4 mt-3">{{$data->city}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-7" style="padding-left: 0px;">
                                            <div class="single-item-text">
                                                <h4>{{$data->first_name}} - {{$data->subject_name}}</h4>
                                                <p style="font-size:18px; color: #107dc2; font-weight:bolder;">
                                                    @if($gethrs>0) <i class="zmdi zmdi-time"></i> {{$gethrs}}hrs @endif
                                                    <?php
                                                    if($star>0 && $totalReview>0)
                                                    {
                                                        $starRate=$star/$totalReview;
                                                        ?><span style="color:green"><i class="zmdi zmdi-star @if($gethrs>0) ml-3 @endif"></i> <?php echo $starRate.' ('.$totalReview.' reviews)'; ?></span><?php
                                                    }
                                                    ?>
                                                </p>
                                                <div class="course-text-content tutors-content">
                                                    <p>{{$data->title}}</p>

                                                </div>

                                                <input type="hidden" id="tutorid" value="{{$data->id}}">
                                                <div class="single-item-content  pt-3">
                                                    <div class="title-education">
                                                        <h5>EDUCATION</h5>
                                                    </div>

                                                    <div class="title-eductiondetails">
                                                        @foreach($tutorUniversityDetails as $value)
                                                        <p><span style="font-weight:600;">{{$value->university_name}}: </span><span class="qualification">{{$value->qualification}}</span>
                                                        </p>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                <div class="button-total">

                                                    <a class="button-default inline" href="#down" style="border-radius: 20px;">Book
                                                        {{$data->first_name}} - {{$data->subject_name}}</a>
                                                </div>

                                                <div class="dbs-check dbs-checked-box">
                                                    @if($tutorDetails->dbs_disclosure == "Yes")
                                                    <h5 class=" dbs mr-2">DBS checked</h5>
                                                    @endif


                                                </div>
                                                <div class="">
                                                    <h5 class=" dbs mr-2">Qualifications on file</h5>
                                                    @if(!empty($data->video))
                                                    <video style="max-height: 250px; height:auto; width:100%;" controls controlslist="nodownload">
                                                        <source src="{{$data->video}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="bio-text ck-bio">
                                    <div class="single-item-content pt-0 pb-2">
                                        <div class="title-eductiondetails">
                                            <div class="title-education">
                                                <h5>BIO</h5>
                                            </div>
                                            <div class="pt-3">
                                                <p>{!!$data->bio!!}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-education mb-3">
                                    <h5>Availability Calendar</h5>
                                </div>
                                <div class="main-custom-calendar">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12 ">
                            <div class="p-tags ">
                                <div class="side-subject mb-5 ">
                                    <div class="subject-details res-mt-20">
                                        <div class="title-education mb-3 ">
                                            <h5>SUBJECTS</h5>
                                        </div>
                                        <div class="education-subject">

                                            @foreach($tutorSubjectLevelDetails as $value)

                                            <ul class="subject-tutor-ul ">
                                                <p style="font-weight: 600; ">{{$value->main_title}}</p>


                                                @foreach($value->level_details as $level)
                                                <li><img src="{{asset('front/img/svg/right-arrow.png')}} " class="list-arrows">{{$level->title}}
                                                </li>
                                                @endforeach


                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>



                                <div class="main-custom-calendar">
                                    <div id='calendar'></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="/tutors-feedback/{{$feedbackId}}" class="button-default inline">Give Feedback</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="comments comments-overflow-show" id="down">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3 class="mb-4">Tutor Enquiry</h3>
                                    </div>
                                </div>
                                <div class="contact-form-area tutors-detail-form">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 col-md-12 col-12">
                                            <form id="submitinquiry" method="POST">
                                                @csrf
                                                <div class="row form-data">
                                                    <input type="hidden" name="tutorid" value="{{$data->id}}">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">First Name <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 charCls" id="first_name" name="first_name" placeholder="First Name ">
                                                        <span class="text-danger" id="error_first_name"></span>

                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Last Name <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 charCls" id="last_name" name="last_name" placeholder="Last Name ">
                                                        <span class="text-danger" id="error_last_name"></span>

                                                    </div>
                                                    <div class="col-md-6 col-lg-6 ">
                                                        <label class="tutor-label">Email <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0" id="email" name="email" placeholder="Email">
                                                        <span class="text-danger" id="error_email"></span>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2">
                                                        <div class="subject-custom">
                                                            <label class="tutor-label">Country <span class="text-danger" class="required-error">*</span></label>
                                                            <select id="country" class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                                <option value="">Select country</option>
                                                                @foreach ($country_list as $val)
                                                                <option value="{{ $val->id }}" @if($val->id==222) selected @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger" id="error_country">{{ $errors->useredit->first('country') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <label class="tutor-label">Phone <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 numberCls" id="phone" name="phone" placeholder="Phone " maxlength="12">
                                                        <span class="text-danger" id="error_phone"></span>

                                                    </div>
                                                    @php $daysArr = [ 'Monday' =>'monday',
                                                    'Tuesday' => 'tuesday',
                                                    'Wednesday' => 'wednesday',
                                                    'Thursday' => 'thursday',
                                                    'Friday' => 'friday',
                                                    'Saturday' => 'saturday',
                                                    'Sunday' => 'sunday'] @endphp

                                                    <div class="customer_records position-relative">
                                                        <div id="main_id">
                                                            <div id="subjects_id">
                                                                @php
                                                                $uniqid = uniqid();
                                                                @endphp
                                                                <input type="hidden" name="main_id[]" value="{{$uniqid}}">
                                                                <div class="copy_id" id="{{$uniqid}}">
                                                                    <div class="row col-md-12 mr-0 p-0">
                                                                        <div class="row col-md-11 m-0 responsive-padding pr-0">
                                                                            <div class="col-md-6 col-lg-6 responsive-padding pr-0">
                                                                                <label class="tutor-label">Subject <span class="text-danger" class="required-error">*</span></label>
                                                                                <select name="subjectinquiry{{$uniqid}}[]" id="subjectinquiry{{$uniqid}}" data-id="{{$uniqid}}" class="mb-0">
                                                                                    <option value="">Select Subject</option>
                                                                                    @foreach($subject_list as $subject)

                                                                                    <option value="{{$subject->id}}">{{$subject->main_title}}</option>
                                                                                    @endforeach


                                                                                </select>
                                                                                <span class="text-danger" id="error_subjectinquiry_{{$uniqid}}"></span>

                                                                            </div>

                                                                            <div class="col-md-6 col-lg-6 pr-0 responsive-padding">
                                                                                <label class="tutor-label">Level of Tuition <span class="text-danger" class="required-error">*</span></label>
                                                                                <select name="level{{$uniqid}}[]" data-id="{{$uniqid}}" id="level{{$uniqid}}" class="mb-0">
                                                                                    <option value="">Select Level</option>
                                                                                    @foreach($tutor_level_list as $level)
                                                                                    <option value="{{$level->id}}">{{$level->title}}
                                                                                    </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <span class="text-danger" id="error_level_{{$uniqid}}"></span>

                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 responsive-padding pr-0">
                                                                                <label class="tutor-label">Day of Tuition <span class="text-danger" class="required-error">*</span></label>
                                                                                <select name="days{{$uniqid}}[]" class="mb-0" id="days{{$uniqid}}" data-id="{{$uniqid}}">
                                                                                    <option value="">Select Day</option>
                                                                                    @foreach($daysArr as $key=>$val)
                                                                                    <option value="{{$val}}">
                                                                                        {{$key}}
                                                                                    </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <span class="text-danger" id="error_days_{{$uniqid}}"></span>

                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 pr-0 responsive-padding">
                                                                                <label class="tutor-label">Ideal Tuition Time <span class="text-danger" class="required-error">*</span></label>
                                                                                <select id="time{{$uniqid}}" data-id="{{$uniqid}}" class="mb-0" name="tuition_time{{$uniqid}}[]">
                                                                                    <option value="">Select Time</option>
                                                                                    <option value="09:00:00-10:00:00">
                                                                                        9am - 10am
                                                                                    </option>
                                                                                    <option value="10:00:00-11:00:00">
                                                                                        10am - 11am
                                                                                    </option>
                                                                                    <option value="11:00:00-12:00:00">
                                                                                        11am - 12pm
                                                                                    </option>
                                                                                    <option value="12:00:00-13:00:00">
                                                                                        12pm - 1pm
                                                                                    </option>
                                                                                    <option value="13:00:00-14:00:00">
                                                                                        1pm - 2pm
                                                                                    </option>
                                                                                    <option value="14:00:00-15:00:00">
                                                                                        2pm - 3pm
                                                                                    </option>
                                                                                    <option value="15:00:00-16:00:00">
                                                                                        3pm - 4pm
                                                                                    </option>
                                                                                    <option value="16:00:00-17:00:00">
                                                                                        4pm - 5pm
                                                                                    </option>
                                                                                    <option value="17:00:00-18:00:00">
                                                                                        5pm - 6pm
                                                                                    </option>
                                                                                    <option value="18:00:00-19:00:00">
                                                                                        6pm - 7pm
                                                                                    </option>
                                                                                    <option value="19:00:00-20:00:00">
                                                                                        7pm - 8pm
                                                                                    </option>
                                                                                    <option value="20:00:00-21:00:00">
                                                                                        8pm - 9pm
                                                                                    </option>
                                                                                    <option value="21:00:00-22:00:00">
                                                                                        9pm - 10pm
                                                                                    </option>

                                                                                </select>
                                                                                <span class="text-danger" id="error_time_{{$uniqid}}"></span>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1 p-0" style="display:flex; align-items:center; justify-content:end;">
                                                                            <a class="search-menu" href="javascript:void(0)" onclick="addExtraSubject()"><i class="fa fa-plus fa-icon" aria-hidden="true" style="margin-top: 4px;"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="tutor-label">Address <span class="text-danger" class="required-error">*</span></label>
                                                        <textarea autocomplete="off" name="address" cols="20" rows="10" id="address" placeholder="Address" class="mb-0"></textarea>
                                                        <span class="text-danger" id="error_address"></span>

                                                    </div>

                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Username <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0" name="username" id="username" placeholder="Username ">
                                                        <span class="text-danger" id="error_username"></span>

                                                    </div>

                                                    <div class="col-md-6 col-lg-6" id="passwordHide">
                                                        <label class="tutor-label">Password <span class="text-danger" class="required-error">*</span></label>
                                                        <input type="password" id="password" class="mb-0" name="password" placeholder="Password">
                                                        <button id="toggle-password" class="pass-icons" type="button">
                                                            <img src="{{asset('front/img/close-eye.svg')}}" alt="eye icon" class="icon1">
                                                            <img src="{{asset('front/img/eye.svg')}}" alt="eye icon" class="icon2">
                                                        </button>
                                                        <span class="text-danger" id="error_password"></span>

                                                    </div>

                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="form-check custom-check">
                                                            <input class="form-check-input terms-condition" type="checkbox" name="term" value="" id="defaultCheck1">
                                                            <label class="form-check-label condition-text" for="defaultCheck1">
                                                                <a style="color:blue;" class="condition-text" target="_blank" href="{{url('terms-and-conditions')}}"><u>Terms & conditions</u> </a>
                                                            </label>
                                                        </div>
                                                        <span class="text-danger" id="error_term"></span>
                                                    </div>

                                                    <div class="col-md-12 mr-0">
                                                        <div class="tutor-btn-end mr-0">
                                                            <div class="banner-readmore">

                                                                <a class="button-default inline" href="javascript:void(0)" onclick="saveinquiry();">submit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>

                                        </div>
                                        <div class="comments">
                                            <h4 class="title">Tutor Feedback</h4>

                                            @foreach($tutor_comments as $value)
                                            <div class="single-comment" id="reviewcomment">
                                                <div class="comment-text">
                                                    <div class="author-info">
                                                        <h4><a href="javascript:void(0)">{{$value->parent_first_name}} {{$value->parent_last_name}}</a></h4>
                                                        <span class="reply">
                                                            <div class="review-score">
                                                                <div class="stars stars2" style="--rating: {{$value->star}};" aria-label="Rating of this product is 2.3 out of 5."></div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <p>{{$value->message}}</p>
                                                    <div class="author-subject">
                                                        <div class="subject-divs">
                                                            <p class="subject-details">Subject : </p>
                                                            <p class="subject-name">{{$value->subject_name}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforeach
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
    @include('frontend.testimonial.testmonial')

</div>
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

    function addExtraSubject() {
        var length = $('.copy_id').length;

        var mathRand = Math.floor(100000000 + Math.random() * 900000000);

        var htmlRep = '';

        htmlRep += '<div class="copy_id row col-md-12 mt-0 mr-0 p-0 customer_records_dynamic remove" id="' + mathRand + '">' +
            '<div class="row col-md-11 m-0 form-data responsive-padding">' +
            '<input type="hidden" name="main_id[]" value="' + mathRand + '">' +
            '<div class="col-md-6 col-lg-6 responsive-padding">' +

            '<label class="tutor-label">Subject <span class="text-danger" class="required-error">*</span></label>' +
            '<select name="subjectinquiry' + mathRand + '[]" id="subjectinquiry' + mathRand + '" data-id="' + mathRand + '" class="mb-0">' + '<option value="">Select Subject</option>' +
            '@foreach($subject_list as $subject)' +
            '<option value="{{$subject->id}}">{{$subject->main_title}}</option>' +
            '@endforeach' +
            '</select>' +
            '<span class="text-danger" id="error_subjectinquiry_' + mathRand + '"></span>' +
            '</div>' +

            '<div class="col-md-6 col-lg-6 pr-0 responsive-padding">' +

            '<label class="tutor-label">Level of Tuition <span class="text-danger" class="required-error">*</span></label>' +
            '<select name="level' + mathRand + '[]" id="level' + mathRand + '" data-id="' + mathRand + '" class="mb-0">' +
            '<option value="">Select Level</option>' +
            '@foreach($tutor_level_list as $level)' +
            '<option value="{{$level->id}}">{{$level->title}}</option>' +
            '@endforeach' +
            '</select>' +
            '<span class="text-danger" id="error_level_' + mathRand + '"></span>' +

            '</div>' +

            '<div class="col-md-6 col-lg-6 responsive-padding">' +

            '<label class="tutor-label">Day of Tuition <span class="text-danger" class="required-error">*</span></label>' +
            '<select name="days' + mathRand + '[]" class="mb-0" data-id="' + mathRand + '" id="days' + mathRand + '">' +
            '<option value="">Select Day</option>' +
            '@foreach($daysArr as $key=>$val)' +
            '<option value="{{$val}}"> {{$key}} </option>' +
            '@endforeach' +

            '</select>' +
            '<span class="text-danger" id="error_days_' + mathRand + '"></span>' +

            '</div>' +

            '<div class="col-md-6 col-lg-6 pr-0 responsive-padding">' +

            '<label class="tutor-label">Ideal Tuition Time <span class="text-danger" class="required-error">*</span></label>' +
            '<select id="time' + mathRand + '" data-id="' + mathRand + '" class="mb-0" name="tuition_time' + mathRand + '[]">' +
            '<option value="">Select Time</option>' +
            '<option value="09:00:00-10:00:00">9am - 10am</option>' +
            '<option value="10:00:00-11:00:00">10am - 11am</option>' +
            '<option value="11:00:00-12:00:00">11am - 12pm</option>' +
            '<option value="12:00:00-13:00:00">12pm - 1pm</option>' +
            '<option value="13:00:00-14:00:00">1pm - 2pm</option>' +
            '<option value="14:00:00-15:00:00">2pm - 3pm</option>' +
            '<option value="15:00:00-16:00:00">3pm - 4pm</option>' +
            '<option value="16:00:00-17:00:00">4pm - 5pm</option>' +
            '<option value="17:00:00-18:00:00">5pm - 6pm</option>' +
            '<option value="18:00:00-19:00:00">6pm - 7pm</option>' +
            '<option value="19:00:00-20:00:00">7pm - 8pm</option>' +
            '<option value="20:00:00-21:00:00">8pm - 9pm</option>' +
            '<option value="21:00:00-22:00:00">9pm - 10pm</option>' +
            '</select>' +
            '<span class="text-danger" id="error_time_' + mathRand + '"></span>' +

            '</div>' +
            '</div>' +
            '<div class="col-md-1 pr-0" style="display:flex; align-items:center; justify-content:end;"> <a href="javascript:void(0)" class="remove-field" onclick="remove(' +
            mathRand + ')"><i class="fa fa-minus fa-icon search-menu2" aria-hidden="true"></i></a></div>';

        $('#main_id').append(htmlRep);

    }

    function remove(id) {
        $('#' + id).remove();
    }
</script>
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>

<script src="{{asset('assets/js/fullcalender-js/main.min.js')}}"></script>

<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script>
    var togglePassword = document.getElementById("toggle-password");

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $(this).addClass("active");
            } else {
                x.type = "password";
                $(this).removeClass("active");

                // $("#toggle-password").removeClass("active");

            }
        });
    }

    function ValidateEmail(email) {

        var expr =
            /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    }
    $("#email").keyup(function() {
        var emailVal = $("#email").val();
        $("#username").val(emailVal);
    });
</script>

<script>
    function pad(numb) {
        return (numb < 10 ? '0' : '') + numb;
    }
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var tutorId = $('#tutorid').val();
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },
            contentHeight: "auto",
            initialView: 'timeGridWeek',
            slotDuration: '00:30',
            displayEventTime: false,
            allDaySlot: false,
            html: true,
            slotMinTime: "9:00:00",
            slotMaxTime: "22:00:00",
            /*
            eventContent: {
                html: '<a><i class="fa fa-check"></i></a>'
            },
            */
            events: function(fetchInfo, callback) {

                var events = [];
                $.ajax({
                    url: "{{route('tutor-availability-get')}}",
                    type: 'get',
                    data: {
                        tutotid: tutorId
                    },
                    success: function(result) {
                        if (!!result) {
                            var sunDate = fetchInfo.start;
                            var tsdY = pad(sunDate.getFullYear());
                            var tsdM = pad(sunDate.getMonth()+1);
                            var tsdD = pad(sunDate.getDate());
                            var tsd=tsdY+'-'+tsdM+'-'+tsdD;
                            var bookedlist = [];
                            $.map(result.bookingList, function(r) {
                                var plusD=new Date(tsd);
                                if(r.day_of_tution=='sunday'){ plusD=tsd; }
                                else if(r.day_of_tution=='monday'){ plusD=plusD.setDate(sunDate.getDate() + 1); }
                                else if(r.day_of_tution=='tuesday'){ plusD=plusD.setDate(sunDate.getDate() + 2); }
                                else if(r.day_of_tution=='wednesday'){ plusD=plusD.setDate(sunDate.getDate() + 3); }
                                else if(r.day_of_tution=='thursday'){ plusD=plusD.setDate(sunDate.getDate() + 4); }
                                else if(r.day_of_tution=='friday'){ plusD=plusD.setDate(sunDate.getDate() + 5); }
                                else if(r.day_of_tution=='saturday'){ plusD=plusD.setDate(sunDate.getDate() + 6); }
                                plusD = new Date(plusD);
                                var tsdY2 = pad(plusD.getFullYear());
                                var tsdM2 = pad(plusD.getMonth()+1);
                                var tsdD2 = pad(plusD.getDate());
                                var tsd2=tsdY2+'-'+tsdM2+'-'+tsdD2;
                                var timeslot = r.tution_time.split('-');
                                var eventTitle = 'Booked';
                                var cusCheck=r.day_of_tution+'_'+timeslot[0];
                                if(jQuery.inArray(cusCheck, bookedlist) !== -1)
                                {
                                }
                                else
                                {
                                    bookedlist.push(cusCheck);
                                    events.push({
                                        id: r.id,
                                        title: eventTitle,
                                        start: tsd2 + ' ' + timeslot[0],
                                        end: tsd2 + ' ' + timeslot[1],
                                        time: r.tuition_time,
                                        backgroundColor: '#727272',
                                        borderColor: '#727272'
                                    });
                                }
                            });
                            $.map(result.offlineList, function(r) {
                                var plusD=new Date(tsd);
                                if(r.tuition_day=='sunday'){ plusD=tsd; }
                                else if(r.tuition_day=='monday'){ plusD=plusD.setDate(sunDate.getDate() + 1); }
                                else if(r.tuition_day=='tuesday'){ plusD=plusD.setDate(sunDate.getDate() + 2); }
                                else if(r.tuition_day=='wednesday'){ plusD=plusD.setDate(sunDate.getDate() + 3); }
                                else if(r.tuition_day=='thursday'){ plusD=plusD.setDate(sunDate.getDate() + 4); }
                                else if(r.tuition_day=='friday'){ plusD=plusD.setDate(sunDate.getDate() + 5); }
                                else if(r.tuition_day=='saturday'){ plusD=plusD.setDate(sunDate.getDate() + 6); }
                                plusD = new Date(plusD);
                                var tsdY2 = pad(plusD.getFullYear());
                                var tsdM2 = pad(plusD.getMonth()+1);
                                var tsdD2 = pad(plusD.getDate());
                                var tsd2=tsdY2+'-'+tsdM2+'-'+tsdD2;
                                var oldDate = new Date(r.booking_date+' '+r.teaching_start_time);
                                var hour = oldDate.getHours();
                                var newDate = oldDate.setHours(hour + 1);
                                var newDate = new Date(newDate);
                                var etH = pad(newDate.getHours());
                                var etM = pad(newDate.getMinutes());
                                var etS = pad(newDate.getSeconds());
                                var et=etH+':'+etM+':'+etS;

                                var eventTitle = 'Booked';
                                var cusCheck=r.tuition_day+'_'+r.teaching_start_time;
                                if(jQuery.inArray(cusCheck, bookedlist) !== -1)
                                {
                                }
                                else
                                {
                                    bookedlist.push(cusCheck);
                                    events.push({
                                        id: r.id,
                                        title: eventTitle,
                                        start: tsd2 + ' ' + r.teaching_start_time,
                                        end: tsd2 + ' ' + et,
                                        time: r.teaching_start_time,
                                        backgroundColor: '#727272',
                                        borderColor: '#727272'
                                    });
                                }
                            });
                            var weekday = ["sunday","monday","tuesday","wednesday","thursday","friday","saturday"];
                            $.map(result.availableList, function(r) {
                                var timeslot2 = r.available_datetime.split(' ');
                                var a = new Date(timeslot2[0]);
                                var chk2 = weekday[a.getDay()]+'_'+timeslot2[1];
                                if(jQuery.inArray(chk2, bookedlist) !== -1)
                                {
                                }
                                else
                                {
                                    events.push({
                                        start: r.available_datetime,
                                        title: 'Available',
                                        "textColor": "#ffffff"
                                    });
                                }
                            });
                        }
                        callback(events);
                    }
                })
            },
        });

        calendar.render();
    });

    function ValidatePassword(password) {
        var expr = /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/;
        return expr.test(password);
    }

    function saveinquiry() {
        var firstName = $('#first_name').val();
        var lastName = $('#last_name').val();
        var email = $('#email').val();
        var country = $('#country').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var temp = 0;
        var regex = new RegExp("[a-zA-Z ]");

        $('#error_first_name').html('');
        $('#error_last_name').html('');
        $('#error_email').html('');
        $('#error_country').html('');
        $('#error_phone').html('');
        $('#error_address').html('');
        $('#error_username').html('');
        $('#error_password').html('');
        $('#error_term').html('');


        if (firstName.trim() == '') {
            $('#error_first_name').html('Firstname is required.');
            $('#first_name').focus();
            temp++;
        } else if (!regex.test(firstName)) {
            $('#error_first_name').html('Emoji not allowed.');
            $('#first_name').focus();
            temp++;
        }
        if (lastName.trim() == '') {
            $('#error_last_name').html('Lastname is required.');
            $('#last_name').focus();
            temp++;
        } else if (!regex.test(lastName)) {
            $('#error_last_name').html('Emoji not allowed.');
            $('#last_name').focus();
            temp++;
        }
        if (email.trim() == '') {
            $('#error_email').html('Email is required.');
            $('#email').focus();
            temp++;
        } else {
            if (!ValidateEmail(email)) {
                $('#error_email').html("Invalid email.");
                $('#email').focus();
                temp++;
            }
        }
        if (country.trim() == '') {
            $('#error_country').html('Country is required.');
            $('#country').focus();
            temp++;
        }
        if (phone.trim() == '') {
            $('#error_phone').html('Phone is required.');
            $('#phone').focus();
            temp++;
        } else {
            if (phone.length <= 10) {
                $('#error_phone').html('Invalid phone');
                $('#phone').focus();
                temp++;
            }
        }
        if (address.trim() == '') {
            $('#error_address').html('Address is required.');
            $('#address').focus();
            temp++;
        } else if (!regex.test(address)) {
            $('#error_address').html('Emoji not allowed.');
            $('#address').focus();
            temp++;
        }
        if (username == '') {
            $('#error_username').html('Username is required.');
            $('#username').focus();
            temp++;
        }
        if (checkPassword == 0) {
            if (password == '') {
                $('#error_password').html('Password is required.');
                $('#password').focus();
                temp++;
            } else {
                if (!ValidatePassword(password)) {
                    $("#error_password").html("Password should include 6 charaters, alphabets, numbers and special characters.");
                    $('#password').focus();
                    temp++;
                }
            }
        }
        $('input[name="main_id[]"]').each(function(e) {
            var dataId = $(this).val();
            var subject = $('select[name="subjectinquiry' + dataId + '[]"]').val();
            var level = $('select[name="level' + dataId + '[]"]').val();
            var days = $('select[name="days' + dataId + '[]"]').val();
            var tutionTime = $('select[name="tuition_time' + dataId + '[]"]').val();
            $('#error_level_' + dataId).html("");
            $('#error_subjectinquiry_' + dataId).html("");
            $('#error_days_' + dataId).html("");
            $('#error_time_' + dataId).html("");
            if (subject == '') {
                $('#error_subjectinquiry_' + dataId).html("Please select Subject");
                temp++
            }
            if (level == '') {
                $('#error_level_' + dataId).html("Please select Level of Tution");
                temp++
            }
            if (days == '') {
                $('#error_days_' + dataId).html("Please select Days");
                temp++
            }
            if (tutionTime == '') {
                $('#error_time_' + dataId).html("Please select Idel Tuition Time");
                temp++
            }
        });
        if ($("input[name='term']:checked").length == 0) {
            $('#error_term').html('Please select Term & condition.');
            $('#defaultCheck1').focus();
            temp++
        }
        if (temp == 0) {
            $.ajax({
                url: "{{route('submit.inquiry')}}",
                type: 'post',
                data: new FormData($('#submitinquiry')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(res) {
                    if (res.status == 0) {
                        toastr.error(res.error_msg);
                    } else {
                        toastr.success(res.error_msg);
                        $('#submitinquiry').trigger("reset");
                        $('.customer_records_dynamic').remove();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {

                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.first_name) {
                        tempVal++;
                        $('#error_first_name').text(jqXHR.responseJSON.message.first_name);
                        $('#first_name').focus();
                    } else {
                        $('#error_first_name').text('');
                    }
                    if (jqXHR.responseJSON.message.last_name) {
                        tempVal++;
                        $('#error_last_name').text(jqXHR.responseJSON.message.last_name);
                    } else {
                        $('#error_last_name').text('');
                    }
                    if (jqXHR.responseJSON.message.email) {
                        tempVal++;
                        $('#error_email').text(jqXHR.responseJSON.message.email);
                    } else {
                        $('#error_email').text('');
                    }
                    if (jqXHR.responseJSON.message.country) {
                        tempVal++;
                        $('#error_country').text(jqXHR.responseJSON.message.country);
                    } else {
                        $('#error_country').text('');
                    }
                    if (jqXHR.responseJSON.message.phone) {
                        tempVal++;
                        $('#error_phone').text(jqXHR.responseJSON.message.phone);
                    } else {
                        $('#error_phone').text('');
                    }
                    if (jqXHR.responseJSON.message.address) {
                        tempVal++;
                        $('#error_address').text(jqXHR.responseJSON.message.address);
                    } else {
                        $('#error_address').text('');
                    }
                    if (jqXHR.responseJSON.message.username) {
                        tempVal++;
                        $('#error_username').text(jqXHR.responseJSON.message.username);
                    } else {
                        $('#error_username').text('');
                    }
                    if (jqXHR.responseJSON.message.password) {
                        tempVal++;
                        $('#error_password').text(jqXHR.responseJSON.message.password);
                    } else {
                        $('#error_password').text('');
                    }

                    if (tempVal == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            })
            return true;
        } else {
            return false;
        }

    }

    function saveReview() {
        var firstName = $('#your_first_name').val();
        var lastName = $('#your_last_name').val();
        var email = $('#your_email').val();
        var phone = $('#your_phone').val();
        var subject = $('#subject').val();
        var star = $('#star').val();
        var message = $('#message').val();
        var temp = 0;
        var regex = new RegExp("[a-zA-Z ]");
        $('#error_your_first_name').html('');
        $('#error_your_last_name').html('');
        $('#error_your_email').html('');
        $('#error_your_phone').html('');
        $('#error_subject').html('');
        $('#error_star').html('');
        $('#error_message').html('');
        if (firstName.trim() == '') {
            $('#error_your_first_name').html('First name is required.');
            $('#your_first_name').focus();
            temp++;
        } else if (!regex.test(firstName)) {
            $('#error_your_first_name').html('Emoji not allowed.');
            $('#your_first_name').focus();
            temp++;
        }
        if (lastName.trim() == '') {
            $('#error_your_last_name').html('Last name is required.');
            $('#your_last_name').focus();
            temp++;
        } else if (!regex.test(lastName)) {
            $('#error_your_last_name').html('Emoji not allowed.');
            $('#your_last_name').focus();
            temp++;
        }
        if (email.trim() == '') {
            $('#error_your_email').html('Email is required.');
            $('#your_email').focus();
            temp++;
        } else {
            if (!ValidateEmail(email)) {
                $('#error_your_email').html("Invalid email.");
                $('#your_email').focus();
                temp++;
            }
        }
        if (phone.trim() == '') {
            $('#error_your_phone').html('Phone is required.');
            $('#your_phone').focus();
            temp++;
        } else {
            if (phone.length <= 10) {
                $('#error_your_phone').html('Invalid phone');
                $('#your_phone').focus();
                temp++;
            }
        }
        if (subject.trim() == '') {
            $('#error_subject').html('Subject is required.');
            $('#subject').focus();
            temp++;
        }
        if (star.trim() == '') {
            $('#error_star').html('Star is required.');
            $('#star').focus();
            temp++;
        }
        if (message.trim() == '') {
            $('#error_message').html('Feedback message is required.');
            $('#message').focus();
            temp++;
        } else if (!regex.test(message)) {
            $('#error_message').html('Emoji not allowed.');
            $('#message').focus();
            temp++;
        }
        if (temp == 0) {
            $.ajax({
                url: "{{route('submit-feedback')}}",
                type: 'post',
                data: new FormData($('#submitReview')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(res) {
                    if (res.status == 0) {
                        toastr.error(res.error_msg);
                    } else {
                        toastr.success(res.error_msg);
                        $('#submitReview').trigger("reset");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.your_first_name) {
                        tempVal++;
                        $('#error_your_first_name').text(jqXHR.responseJSON.message.your_first_name);
                        $('#your_first_name').focus();
                    } else {
                        $('#error_your_first_name').text('');
                    }
                    if (jqXHR.responseJSON.message.your_last_name) {
                        tempVal++;
                        $('#error_your_last_name').text(jqXHR.responseJSON.message.your_last_name);
                    } else {
                        $('#error_your_last_name').text('');
                    }
                    if (jqXHR.responseJSON.message.your_email) {
                        tempVal++;
                        $('#error_your_email').text(jqXHR.responseJSON.message.your_email);
                    } else {
                        $('#error_your_email').text('');
                    }
                    if (jqXHR.responseJSON.message.your_phone) {
                        tempVal++;
                        $('#error_your_phone').text(jqXHR.responseJSON.message.your_phone);
                    } else {
                        $('#error_your_phone').text('');
                    }
                    if (jqXHR.responseJSON.message.subject) {
                        tempVal++;
                        $('#error_subject').text(jqXHR.responseJSON.message.subject_id);
                    } else {
                        $('#error_subject').text('');
                    }
                    if (jqXHR.responseJSON.message.star) {
                        tempVal++;
                        $('#error_star').text(jqXHR.responseJSON.message.star);
                    } else {
                        $('#error_star').text('');
                    }
                    if (jqXHR.responseJSON.message.message) {
                        tempVal++;
                        $('#error_message').text(jqXHR.responseJSON.message.message);
                    } else {
                        $('#error_message').text('');
                    }
                    if (tempVal == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            })
            return true;
        } else {
            return false;
        }
    }
</script>
<script>
    $('.numberCls').keypress(function(event) {
        if (event.keyCode < 48 || event.keyCode > 57) {
            event.preventDefault();
        }
    });
    $(function() {
        $("#datepicker").datepicker();
    });

    var timeout = null;
    var checkPassword = 0;
    $('#email').keyup(function() {
        clearTimeout(timeout);

        timeout = setTimeout(function() {
            var email = $("#email").val();
            if (email != '') {
                $.ajax({
                    type: 'POST', //THIS NEEDS TO BE GET
                    url: '{{route("check-email-parent")}}',
                    data: {
                        email: email,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response == '1') {
                            $("#passwordHide").css('display', 'none');
                            checkPassword = 1;
                        } else {
                            $("#passwordHide").css('display', 'block');
                        }
                    },
                    error: function() {

                    }
                });
            }
        }, 500);
    });
    /*
    $(document).load(function () {
        setTimeout(function() {
            $('.fc-event-title-container').css('display', 'flex !important');
            $('.fc-event-title-container').css('justify-content', 'center !important');
            $('.fc-event-title-container').css('align-items', 'center !important');
        }, 1000);
    });
    */
</script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
</script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
@endsection

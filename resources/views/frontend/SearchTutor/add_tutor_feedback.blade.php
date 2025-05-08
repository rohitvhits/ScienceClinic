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

<div class="as-mainwrapper res-become-tutor">
    <!--Bg White Start-->
    <div class="bg-white">
        <div id="header"></div>
        <!--End of Header Area-->
        <!--background Area Start-->
        <div class="backgrount-area bg-chemistry full-grayoverlay">
            <div class="banner-content padding-headsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper text-center full-width">
                                <div class="text-content text-center-content">
                                    <h1 class="title1 text-center max-englishtext mb-20">
                                        <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Give Feedback for {{$data->first_name}}</span>
                                    </h1>
                                    <p>We use your feedback to help our teachers improve. Please tell us your experience when working with this teacher.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="tutors-details">
            <div class="course-details-area tutor-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="comments comments-overflow-show" id="down">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3 class="mb-4">Give Feedback</h3>
                                    </div>
                                </div>
                                <div class="contact-form-area tutors-detail-form">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 col-md-12 col-12">
                                            <form id="submitReview" method="POST">
                                                @csrf
                                                <div class="row form-data">
                                                    <input type="hidden" name="tutorid" value="{{$data->id}}">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Your First Name <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 charCls" id="your_first_name" name="your_first_name" placeholder="Your First Name ">
                                                        <span class="text-danger" id="error_your_first_name"></span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Your Last Name <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 charCls" id="your_last_name" name="your_last_name" placeholder="Your Last Name ">
                                                        <span class="text-danger" id="error_your_last_name"></span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 ">
                                                        <label class="tutor-label">Your Email <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0" id="your_email" name="your_email" placeholder="Your Email">
                                                        <span class="text-danger" id="error_your_email"></span>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2">
                                                        <div class="subject-custom">
                                                            <label class="tutor-label">Country <span class="text-danger" class="required-error">*</span></label>
                                                            <select id="country" class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                                <option value="">Select country</option>
                                                                @foreach ($country_list as $val)
                                                                <option value="{{ $val->id }}">+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger" id="error_country">{{ $errors->useredit->first('country') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <label class="tutor-label">Your Phone <span class="text-danger" class="required-error">*</span></label>
                                                        <input autocomplete="off" type="text" class="mb-0 numberCls" id="your_phone" name="your_phone" placeholder="Your Phone " maxlength="12">
                                                        <span class="text-danger" id="error_your_phone"></span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Subject <span class="text-danger" class="required-error">*</span></label>
                                                        <select class="mb-0" id="subject" name="subject">
                                                            <option value="">Select Subject</option>
                                                            @foreach($tutorSubjectLevelDetails as $value)
                                                            <option value="{{$value->subject_id}}">{{$value->main_title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger" id="error_subject"></span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label class="tutor-label">Star <span class="text-danger" class="required-error">*</span></label>
                                                        <select class="mb-0" id="star" name="star">
                                                            <option value="">Select star</option>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                            <option value="0">0</option>
                                                        </select>
                                                        <span class="text-danger" id="error_star"></span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="tutor-label">Feedback Message <span class="text-danger" class="required-error">*</span></label>
                                                        <textarea autocomplete="off" name="message" cols="20" rows="10" id="message" placeholder="Feedback Message" class="mb-0"></textarea>
                                                        <span class="text-danger" id="error_message"></span>
                                                    </div>
                                                    <div class="col-md-12 mr-0">
                                                        <div class="tutor-btn-end mr-0">
                                                            <div class="banner-readmore">
                                                                <a class="button-default inline" href="javascript:void(0)" onclick="saveReview();">submit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('page-js')
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/fullcalender-js/main.min.js')}}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script>
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
    function saveReview() {
        var firstName = $('#your_first_name').val();
        var lastName = $('#your_last_name').val();
        var email = $('#your_email').val();
        var country = $('#country').val();
        var phone = $('#your_phone').val();
        var subject = $('#subject').val();
        var star = $('#star').val();
        var message = $('#message').val();
        var temp = 0;
        var regex = new RegExp("[a-zA-Z ]");
        $('#error_your_first_name').html('');
        $('#error_your_last_name').html('');
        $('#error_your_email').html('');
        $('#error_country').html('');
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
        if (country.trim() == '') {
            $('#error_country').html('Country is required.');
            $('#country').focus();
            temp++;
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
                    if (jqXHR.responseJSON.message.country) {
                        tempVal++;
                        $('#error_country').text(jqXHR.responseJSON.message.country);
                    } else {
                        $('#error_country').text('');
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
    })
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
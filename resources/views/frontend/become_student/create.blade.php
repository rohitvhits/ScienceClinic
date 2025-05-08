@extends('layouts.frontend')
@section('content')
<style>
    .add-subject {
        position: absolute;
        right: 0px;
    }
    .form-data .col-md-6,
    .form-data .col-md-12 {
        margin-bottom: 23px;
    }
    .inputbar-padding {
        padding-top: 10px !important;
    }
    .image_area {
        position: relative;
    }
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg {
        max-width: 700px !important;
    }
    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }
    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }
</style>
<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />
<link href="{{asset('front/css/cropper.css')}}" rel="stylesheet" />
<div class="as-mainwrapper res-become-tutor">
    <!--Bg White Start-->
    <div class="bg-white">
        <div id="header"></div>
        <!--End of Header Area-->
        <!--background Area Start-->
        <div class="backgrount-area bg-chemistry  full-grayoverlay">
            <div class="banner-content padding-headsection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper text-center full-width">
                                <div class="text-content text-center-content">
                                    <h1 class="title1 text-center max-englishtext mb-20">
                                        <span class="tlt block" data-in-effect="fadeInRight" data-out-effect="fadeOutRight">Register as a Student</span>
                                    </h1>
                                    <p>If you are looking for a qualified and experienced tutor to guide you through your upcoming exams, Please fill out the form below to register as a student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of background Area-->
        <div class="become-text  pt-5px res-pt-10">
            <div class="container">
                <div class="area-sciences">
                    <div>
                        <div class="single-item-text">
                            <div class="contact-form-area">

                                <form action="{{ route('register-student.store') }}" method="POST" enctype="multipart/form-data" id="formdata">

                                    @csrf

                                    <div class="row form-data">

                                        <div class="col-md-6">
                                            <input type="text" name="student_name" maxlength="30" class="mb-0" autocomplete="off" id="student_name" placeholder="Student Name *">
                                            <span class="text-danger" id="error_student_name">{{ $errors->useredit->first('student_name') }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="parent_name" maxlength="30" class="mb-0" autocomplete="off" id="parent_name" placeholder="Parent Name *">
                                            <span class="text-danger" id="error_parent_name">{{ $errors->useredit->first('parent_name') }}</span>
                                        </div>

                                        <div class="col-md-6">

                                            <input type="text" name="parent_email" class="mb-0" autocomplete="off" id="parent_email" placeholder="Parent Email *">

                                            <span class="text-danger" id="error_parent_email">{{ $errors->useredit->first('parent_email') }}</span>

                                        </div>

                                        <div class="col-md-2">
                                            <div class="subject-custom">
                                                <select id="country" class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                    <option value="">Select country</option>
                                                    @foreach ($country_list as $val)
                                                    <option value="{{ $val->id }}" @if($val->id==222) selected @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger" id="error_country">{{ $errors->useredit->first('country') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">

                                            <input type="text" class="mb-0 numberCls" maxlength="12" autocomplete="off" name="parent_mobile" id="parent_mobile" placeholder="Parent Telephone *">

                                            <span class="text-danger" id="error_parent_mobile">{{ $errors->useredit->first('parent_mobile') }}</span>

                                        </div>

                                        <div class="col-md-6">

                                            <input type="text" maxlength="255" name="parent_address" class="mb-0" autocomplete="off" id="parent_address" placeholder="Parent Address *">

                                            <span class="text-danger" id="error_parent_address">{{ $errors->useredit->first('parent_address') }}</span>

                                        </div>

                                        <div class="col-md-6 mb-2">

                                            <div class="subject-custom">
                                                <select id="sub" class="selectpicker " data-id="sub" name="subject" id="subject" aria-label="Default select example" data-live-search="true">

                                                    <option value="">Select Subject</option>

                                                    @foreach ($subject_list as $val)
                                                    <option value="{{ $val->id }}">{{ $val->main_title }}</option>
                                                    @endforeach
                                                </select>

                                                <span class="text-danger" id="error_subject">{{ $errors->useredit->first('subject') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="subject-custom">
                                                <select class="selectpicker" data-id="level" name="level" id="level" aria-label="Default select example" data-live-search="true">
                                                    <option value="">Select Level</option>
                                                    @foreach ($tutor_level_list as $val)
                                                    <option value="{{ $val->id }}">{{ $val->title }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger" id="error_level">{{ $errors->useredit->first('level') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" maxlength="255" name="year_group" class="mb-0" autocomplete="off" id="year_group" placeholder="Year Group *">
                                            <span class="text-danger" id="error_year_group">{{ $errors->useredit->first('year_group') }}</span>
                                        </div>
                                        <br>

                                        <div class="col-md-12 col-lg-12">

                                            <div class="form-check custom-check">

                                                <input class="form-check-input terms-condition" type="checkbox" name="term" id="term">


                                                <label class="form-check-label condition-text" for="defaultCheck1">
                                                    <a class="condition-text" href="{{url('terms-and-conditions')}}">Terms & conditions *</a>

                                                </label>

                                            </div>
                                            <span class="text-danger" id="error_term"></span>

                                        </div>







                                        <div class="col-md-12">

                                            <div class="become-end-btn btn-end">

                                                <button type="button" id="submitform" class="button-default">SUBMIT</button>

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

    @include('frontend.testimonial.testmonial')
    <!--End of Breadcrumb Banner Area-->



    <!-- English Testimonials area Start-->



</div>
@endsection

@section('page-js')
<script src="{{ asset('front/js/cropper.js')}}"></script>
<script src="{{ asset('front/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

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
<script>
    function show1() {

        var names = $('input[name="dbsdisclosure"]:checked').val();

        if (names == 'Yes') {

            document.getElementById('div1').style.display = 'block';

        } else {

            document.getElementById('div1').style.display = 'none';

        }



    }
</script>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');

                $('#imagePreview').hide();

                $('#imagePreview').fadeIn(650);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#imageUpload").change(function() {

        readURL(this);

    });
</script>
<script>
    function ValidateEmail(email) {
        var expr =
            /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    }

    function ValidatePassword(password) {
        var expr = /^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/;
        return expr.test(password);
    }

    function validateMobileNo(mobile) {
        var expr = /^(7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/
        return expr.test(mobile);
    }
    $("#email").keyup(function() {
        var emailVal = $("#email").val();
        $("#user_name").val(emailVal);
    });
    $("#submitform").click(function() {

        var sname = $("#student_name").val();
        var pname = $("#parent_name").val();
        var email = $("#parent_email").val();
        var country = $("#country").val();
        var mobile = $("#parent_mobile").val();
        var address = $("#parent_address").val();
        var subject = $("#subject").val();
        var level = $("#level").val();
        var yg = $("#year_group").val();
        var term = $("#term").val();
        var temp = 0;
        $("#error_student_name").html('');
        $("#error_parent_name").html('');
        $("#error_parent_email").html('');
        $("#error_country").html('');
        $("#error_parent_mobile").html('');
        $("#error_parent_address").html('');
        $("#error_subject").html('');
        $("#error_level").html('');
        $("#error_year_group").html('');
        $("#error_term").html('');
        if (sname.trim() == '') {
            $('#error_student_name').html('Please enter student name');
            temp++;
        }
        if (pname.trim() == '') {
            $('#error_parent_name').html('Please enter parent name');
            temp++;
        }
        if (email == '') {
            $('#error_parent_email').html('Please enter parent email');
            temp++;
        } else {
            if (!ValidateEmail(email)) {
                $('#error_parent_email').html("Invalid email");
                temp++;
            }
        }
        if (country.trim() == '') {
            $('#error_country').html('Please select country');
            temp++;
        }
        if (mobile.trim() == '') {
            $('#error_parent_mobile').html('Please enter telephone');
            temp++;
        } else if (!validateMobileNo(mobile)) {
            $('#error_parent_mobile').html('Please enter valid telephone');
            temp++;
        }
        if (address.trim() == '') {
            $('#error_parent_address').html('Please enter address');
            temp++;
        }
        if (subject == '') {
            $('#error_subject').html('Please enter subject name');
            temp++;
        }
        if (level == '') {
            $('#error_level').html('Please enter level');
            temp++;
        }
        if (yg.trim() == '') {
            $('#error_year_group').html('Please enter year group');
            temp++;
        }
        if ($("input[name='term']:checked").length == 0) {
            $('#error_term').html('Please select Term & condition');
            temp++
        }
        if (temp == 0) {
            let myform = document.getElementById("formdata");
            var formData = new FormData(myform);
            $.ajax({
                url: "{{ route('register-student.store') }}",
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 0) {
                        toastr.error(data.error_msg);
                    } else if (data.status == 2) {
                        toastr.error(data.data);
                    } else {
                        toastr.success(data.error_msg);
                        $('#formdata').trigger("reset");
                        $(".selectpicker").selectpicker("refresh");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.student_name) {
                        tempVal++;
                        $('#error_student_name').text(jqXHR.responseJSON.message.student_name);
                    } else {
                        $('#error_student_name').text('');
                    }
                    if (jqXHR.responseJSON.message.parent_name) {
                        tempVal++;
                        $('#error_parent_name').text(jqXHR.responseJSON.message.parent_name);
                    } else {
                        $('#error_parent_name').text('');
                    }
                    if (jqXHR.responseJSON.message.parent_email) {
                        tempVal++;
                        $('#error_parent_email').text(jqXHR.responseJSON.message.parent_email);
                    } else {
                        $('#error_parent_email').text('');
                    }
                    if (jqXHR.responseJSON.message.country) {
                        tempVal++;
                        $('#error_country').text(jqXHR.responseJSON.message.country);
                    } else {
                        $('#error_country').text('');
                    }
                    if (jqXHR.responseJSON.message.parent_mobile) {
                        tempVal++;
                        $('#error_parent_mobile').text(jqXHR.responseJSON.message.parent_mobile);
                    } else {
                        $('#error_parent_mobile').text('');
                    }
                    if (jqXHR.responseJSON.message.parent_address) {
                        tempVal++;
                        $('#error_parent_address').text(jqXHR.responseJSON.message.parent_address);
                    } else {
                        $('#error_parent_address').text('');
                    }
                    if (jqXHR.responseJSON.message.subject_name) {
                        tempVal++;
                        $('#error_subject_name').text(jqXHR.responseJSON.message.subject_name);
                    } else {
                        $('#error_subject_name').text('');
                    }
                    if (jqXHR.responseJSON.message.level) {
                        tempVal++;
                        $('#error_level').text(jqXHR.responseJSON.message.level);
                    } else {
                        $('#error_level').text('');
                    }
                    if (jqXHR.responseJSON.message.year_group) {
                        tempVal++;
                        $('#error_year_group').text(jqXHR.responseJSON.message.year_group);
                    } else {
                        $('#error_year_group').text('');
                    }
                    if (tempVal == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });
        } else {
            return false;
        }
    });
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
@extends('layouts.master')
@section('title', 'Add Tutor')
@section('content')
<link href="{{asset('front/css/cropper.css')}}" rel="stylesheet" />
<style>
    .card-header {Tutor Name * border-bottom: 0 !important; } .error { color: red; } .card-custom { padding: 20px 0; }
</style>
<div class="modal fade" id="modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="padding-top: 180px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img src="" id="sample_image" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <div class="flex-row-fluid">
                <div class="card card-custom card-stretch">
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Add Tutor</h3>
                        </div>
                    </div>
                    <form class="form" id="formdata">
                        @csrf
                        <div class="card-body py-0">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tutor Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control validate_field" placeholder="Enter Tutor Name" data-msg="Tutor Name" name="name" id="name" autocomplete="off">
                                        <span class="form-text error_name">{{ $errors->useredit->first('name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Tutor Email" autocomplete="off" id="email" type="text" data-msg="Tutor Email" name="email">
                                        <span class="form-text error error_email">{{ $errors->useredit->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-0">
                                                    <label>Country <span class="text-danger">*</span></label>
                                                    <select class="form-control selectpicker" required name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                        <option value="">Select Country</option>
                                                        @foreach($country_list as $key => $sval)
                                                            <option value="{{$sval->id}}">{{$sval->phonecode.' ('.$sval->iso.')'}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-text error error_country">{{ $errors->useredit->first('level')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group mb-0">
                                                    <label>Tutor Mobile <span class="text-danger">*</span></label>
                                                    <input class="form-control validate_field" placeholder="Enter Tutor Mobile" autocomplete="off" id="mobile" type="text" data-msg="Tutor Mobile" name="mobile">
                                                    <span class="form-text error error_mobile">{{ $errors->useredit->first('mobile')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Address 1" autocomplete="off" id="address1" type="text" data-msg="Tutor Address 1" name="address1">
                                        <span class="form-text error error_address1">{{ $errors->useredit->first('tutor_address1')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter City" autocomplete="off" id="city" type="text" data-msg="Tutor City" name="city">
                                        <span class="form-text error error_city">{{ $errors->useredit->first('tutor_city')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Postcode<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Postcode" autocomplete="off" id="postcode" type="text" data-msg="Postcode" name="postcode">
                                        <span class="form-text error error_postcode">{{ $errors->useredit->first('postcode')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Title" autocomplete="off" id="title" type="text" data-msg="Title" name="title">
                                        <span class="form-text error error_title">{{ $errors->useredit->first('title')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject Name<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Subject Name" autocomplete="off" id="subject_name" type="text" data-msg="Subject Name" name="subject_name">
                                        <span class="form-text error error_subject_name">{{ $errors->useredit->first('subject_name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bio<span class="text-danger">*</span></label>
                                        <textarea class="form-control validate_field" placeholder="Enter Bio" autocomplete="off" id="bio" data-msg="Bio" name="bio"></textarea>
                                        <span class="form-text error error_bio">{{ $errors->useredit->first('bio')}}</span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <h6>University/Institution *</h6>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <h6>Qualification *</h6>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <h6>Upload Certificates Here *</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer_records position-relative">
                                        <div id="main_id">
                                            @php
                                            $uniqid = uniqid();
                                            @endphp
                                            <div class="copy_id" id="{{ $uniqid }}">
                                                <div class="form-group mb-2">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <input name="university[]" maxlength="35" autocomplete="off" data-id="{{ $uniqid }}" type="text" placeholder="University/Institution *" class="form-control mb-0">
                                                            <span id="customer_name_{{ $uniqid }}_error" class="text-danger">{{ $errors->useredit->first('university') }}</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input name="qualification[]" maxlength="255" autocomplete="off" data-id="{{ $uniqid }}" type="text" placeholder="Qualification *" class="form-control mb-0">
                                                            <span id="qualification{{ $uniqid }}_error" class="text-danger">{{ $errors->useredit->first('qualification') }}</span>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="downloaded-file position-relative">
                                                                <div class="chemistry-icon-text">
                                                                    <div class="input-file-bio">
                                                                        <p type="text" class="mb-0 mt-0" id="uploadeviFile" class="input-upload-bio"> </p>
                                                                    </div>
                                                                    <input type="file" class="form-control mb-0 bio-input-fild" name="document_certi[]" data-id="{{ $uniqid }}" id="uploadeviBtn">
                                                                    <span id="document_certi{{ $uniqid }}_error" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 add"> <a class="extra-fields-customer search-menu btn btn-sm btn-primary" href="javascript:void(0)"><i class="fa fa-plus fa-icon" aria-hidden="true"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer_records_dynamic"></div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <h6 class="mb-2">Subject you wish to tutor *</h6>
                                            </div>
                                            <div class="col-md-5 mb-2">
                                                <h6 class="mb-2">Level you wish to tutor *</h6>
                                            </div>
                                            <div class="col-md-1 mb-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer_records position-relative">
                                        <div id="subjects_id">
                                            @php
                                            $uniqid = uniqid();
                                            @endphp
                                            <input type="hidden" name="main_subject_id[]" value="{{$uniqid}}">
                                            <div class="copy_subject_id" id="{{$uniqid}}">
                                                <div class="form-group mb-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="subject-custom">
                                                                <select id="sub{{$uniqid}}" class="selectpicker " data-id="{{$uniqid}}" name="subject{{$uniqid}}[]" aria-label="Default select example" data-live-search="true">
                                                                    <option value="">Select Subject</option>
                                                                    @foreach ($subject_list as $val)
                                                                    <option value="{{ $val->id }}">{{ $val->main_title }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger" id="subject_{{$uniqid}}_error">{{ $errors->useredit->first('subject') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="subject-custom">
                                                                <select class="selectpicker" data-id="{{$uniqid }}" name="level{{$uniqid}}[]" multiple aria-label="Default select example" data-live-search="true">
                                                                    @foreach ($tutor_level_list as $val)
                                                                    <option value="{{ $val->id }}">{{ $val->title }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger" id="level_{{$uniqid }}_error">{{ $errors->useredit->first('level') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 add" style="padding-left:15px;">
                                                            <a class="extra-fields-customer1 search-menu btn btn-sm btn-primary" onclick="addmoreSubject()" href="javascript:void(0)"><i class="fa fa-plus fa-icon" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label>Do you have an enhanced DBS disclosure (less than a year old)?<span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" value="Yes" name="dbsdisclosure" class="custom-control-input" onclick="show1();">
                                            <label class="custom-control-label" for="customRadio2">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="dbsdisclosure" class="custom-control-input" value="No" onclick="show1();">
                                            <label class="custom-control-label" for="customRadio3">No</label>
                                        </div>
                                        <span class="form-text error dbsdisclosure_error">{{ $errors->useredit->first('bio')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2" id="div1" style="display:none">
                                    <div class="form-group">
                                        <label>DBS Disclosure<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" id="uploadFile" type="file" data-msg="DBS Disclosure" name="document_pdf">
                                        <span class="form-text error document_pdf_error">{{ $errors->useredit->first('dbsdisclosure')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label>Do you have tutoring experience in the UK?<span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio6" value="Yes" name="exprienceinuk" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio6">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio7" name="exprienceinuk" class="custom-control-input" value="No">
                                            <label class="custom-control-label" for="customRadio7">No</label>
                                        </div>
                                        <span class="form-text error exprienceinuk_error">{{ $errors->useredit->first('exprienceinuk')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label>If yes, how much UK tutoring experience do you have? <span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio8" name="tutorexperienceinuk" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="customRadio8">1-2 years</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio9" name="tutorexperienceinuk" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="customRadio9">3-5 years</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio10" name="tutorexperienceinuk" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="customRadio10">5 plus years</label>
                                        </div>
                                        <span class="form-text error tutorexperienceinuk_error">{{ $errors->useredit->first('exprienceinuk')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Are you legally entitled to work in the UK? Remember you will be self-employed as a tutor and pay your own tax to the UK Government <span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio11" name="paytax" class="custom-control-input" value="Yes">
                                            <label class="custom-control-label" for="customRadio11">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio12" name="paytax" class="custom-control-input" value="No">
                                            <label class="custom-control-label" for="customRadio12">No</label>
                                        </div>
                                        <span class="form-text error paytax_error">{{ $errors->useredit->first('exprienceinuk')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload your photo<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Select Profile Image" autocomplete="off" id="imageUpload" type="file" data-msg="Profile Image" name="profile_image" accept=".png, .jpg, .jpeg">
                                        <span class="form-text error profile_image_error">{{ $errors->useredit->first('profile_image')}}</span>
                                        <input type="hidden" name="crop_image" id="crop-image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter User Name" autocomplete="off" id="user_name" type="text" data-msg="User Name" name="user_name">
                                        <span class="form-text error user_name_error">{{ $errors->useredit->first('user_name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Password" autocomplete="off" id="password" type="password" data-msg="Password" name="password">
                                        <span class="form-text error password_error">{{ $errors->useredit->first('password')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Is Centre Tutor <span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio13" name="center_tutor" class="custom-control-input" value="yes" checked>
                                            <label class="custom-control-label" for="customRadio13">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio14" name="center_tutor" class="custom-control-input" value="no">
                                            <label class="custom-control-label" for="customRadio14">No</label>
                                        </div>
                                        <span class="form-text error paytax_error">{{ $errors->useredit->first('exprienceinuk')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="both-btn-form">
                                <button type="button" id="submitform" class="btn btn-primary mr-2 add_tutor_form" style="background-color:#3498db !important">Submit</button>
                                <a href="{{route('tutor-master.index')}}" class="btn btn-secondary mr-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Subject List-->
</div>
<!--end::Container-->
<span id="dropdowns_id" style="display:none">
    <option value="">Select Subject</option>

    @foreach ($subject_list as $val)
    <option value="{{ $val->id }}">{{ $val->main_title }}
    </option>
    @endforeach
</span>
<span id="tutor_level_id" style="display:none">
    <option value="">Select Tutor Level</option>

    @foreach ($tutor_level_list as $val)
    <option value="{{ $val->id }}">{{ $val->title }}
    </option>
    @endforeach
</span>
@endsection
@section('page-js')
<script src="{{ asset('front/js/cropper.js')}}"></script>
<script src="{{asset('assets/Modulejs/textbooks.js')}}"></script>
<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    var $modal = $('#modal');
    var image = document.getElementById('sample_image');
    var cropper;$('#imageUpload').change(function(event) {
        var files = event.target.files;

        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            // viewMode: 3,
            // preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function() {
        $modal.modal('hide');
        canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 600
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $('#imagePreview').attr('src', base64data);
                $('#crop-image').val(base64data);
            };
        });
    });
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
    function addmoreSubject() {
        var length = $('.copy_subject_id').length;
        var mathRandSubject = Math.floor(100000000 + Math.random() * 900000000);
        var htmlRep = '';
        var dropdowns = $('#dropdowns_id').html();
        var level_id = $('#tutor_level_id').html();
        htmlRep += '<div class="copy_subject_id extra-column" id="' + mathRandSubject + '" style="margin-top: 10px;"><input type="hidden" name="main_subject_id[]" value="' + mathRandSubject + '">' +
            '<div class="form-group mb-0">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<div class="subject-custom">' +
            '<select class="form-control selectpicker" id="sub' + mathRandSubject + '" name="subject' + mathRandSubject + '[]" data-id="' + mathRandSubject + '" aria-label="Default select example" data-live-search="true">' + dropdowns + '</select>' +
            '<span class="text-danger" id="subject_' + mathRandSubject + '_error"></span></div></div>' +
            '<div class="col-md-5"> <div class="subject-custom"><select class="form-control selectpicker" data-id="' + mathRandSubject + '" name="level' + mathRandSubject + '[]" multiple aria-label="Default select example" data-live-search="true">' + level_id + '</select><span class="text-danger" id="level_' + mathRandSubject + '_error"></span></div></div>' +
            '<div class="col-md-1 add-subject"><a href="javascript:void(0)" style="margin-top:-3%;" class="remove-field btn-remove-customer btn-remove-customer2 btn btn-sm btn-danger" onclick="removeSubject(' + mathRandSubject + ')"><i class="fa fa-minus fa-icon search-menu2" aria-hidden="true"></i></a></div></div></div></div>';
        $('#subjects_id').append(htmlRep);
        $('.selectpicker').selectpicker();
    }

    function removeSubject(id) {
        $('#' + id).remove();
    }

    function show1() {
        var names = $('input[name="dbsdisclosure"]:checked').val();
        if (names == 'Yes') {
            document.getElementById('div1').style.display = 'block';
        } else {
            document.getElementById('div1').style.display = 'none';
        }
    }

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
        var name = $("#name").val();
        var email = $("#email").val();
        var country = $("#country").val();
        var mobile = $("#mobile").val();
        var address1 = $("#address1").val();
        var city = $("#city").val();
        var postcode = $("#postcode").val();
        var bio = $("#bio").val();
        var profile_image = $("#imageUpload").prop('files');
        var subject = $('select[name="subject[]"]').val();
        var level = $('select[name="level[]"]').val();
        var disclose = $('input[name="dbsdisclosure"]').is(":checked");
        var exprienceinuk = $('input[name="exprienceinuk"]').is(":checked");
        var tutorexperienceinuk = $('input[name="tutorexperienceinuk"]').is(":checked");
        var paytax = $('input[name="paytax"]').is(":checked");
        var document_pdf = $('input[name="document_pdf"]').prop('files');
        var userName = $("#user_name").val();
        var password = $("#password").val();
        var title = $("#title").val();
        var subjectName = $('#subject_name').val();
        var temp = 0;
        $(".error_name").html('');
        $(".error_email").html('');
        $(".error_country").html('');
        $(".error_mobile").html('');
        $(".error_address1").html('');
        $(".error_city").html('');
        $(".error_postcode").html('');
        $(".error_bio").html('');
        $(".error_profile_image").html('');
        $(".error_subject").html('');
        $("#error_level").html('');
        $(".user_name_error").html('');
        $(".password_error").html('');
        $(".error_title").html('');
        $(".error_subject_name").html('');
        if (name.trim() == '') {
            $('.error_name').html('Please enter name');
            temp++;
        }
        if (email == '') {
            $('.error_email').html('Please enter email');
            temp++;
        } else {
            if (!ValidateEmail(email)) {
                $('.error_email').html("Invalid email");
                temp++;
            } else {
                $.ajax({
                    async: false,
                    global: false,
                    url: "{{ route('check.email') }}",
                    type: "get",
                    data: {
                        email: email
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            $('.error_email').html("Email is already exist");
                            temp++;
                        } else {
                            $('.error_email').html("");
                        }
                    }
                });
            }
        }

        if (userName.trim() == '') {
            $('.user_name_error').html('Please enter username');
            temp++;
        }
        if (password.trim() == '') {
            $('.password_error').html('Please enter password');
            temp++;
        } else {
            if (!ValidatePassword(password)) {
                $(".password_error").html("Password should include 6 charaters, alphabets, numbers and special characters");
                temp++;
            }
        }

        if (country.trim() == '') {
            $('.error_country').html('Please select country');
            temp++;
        }
        if (mobile.trim() == '') {
            $('.error_mobile').html('Please enter telephone');
            temp++;
        } else if (!validateMobileNo(mobile)) {
            $('.error_mobile').html('Please enter Valid Telephone');
            temp++;
        }
        if (address1.trim() == '') {
            $('.error_address1').html('Please enter address 1');
            temp++;
        }
        if (city.trim() == '') {
            $('.error_city').html('Please enter town/city');
            temp++;
        }
        if (postcode.trim() == '') {
            $('.error_postcode').html('Please enter postcode');
            temp++;
        }
        if (bio.trim() == '') {
            $('.error_bio').html('Please enter bio');
            temp++;
        }
        if (title.trim() == '') {
            $('.error_title').html('Please enter Title');
            temp++;
        }
        if (subjectName.trim() == '') {
            $('.error_subject_name').html('Please enter Subject Name');
            temp++;
        }
        if (profile_image.length == 0) {
            $('.profile_pic_error').html('Please select profile image');
            temp++
        }
        if (profile_image.length != 0) {
            var FileUploadPath = profile_image[0].name;
            var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg') {
                $('.profile_pic_error').html("");
            } else {
                $('.profile_pic_error').html("Photo only allows image types of PNG, JPG, JPEG");
                temp++;
            }
        }

        $('input[name="university[]"]').each(function(e) {
            var dataId = $(this).attr('data-id');
            var value = $(this).val();
            $('#customer_name_' + dataId + '_error').html("");
            if (value.trim() == '') {
                $('#customer_name_' + dataId + '_error').html("Please enter university/institution");
                temp++;
            }
        })

        $('input[name="qualification[]"]').each(function(e) {
            var dataId = $(this).attr('data-id');
            var value = $(this).val();
            $('#qualification' + dataId + '_error').html("");
            if (value.trim() == '') {
                $('#qualification' + dataId + '_error').html("Please enter qualification");
                temp++;
            }
        })

        $('input[name="document_certi[]"]').each(function(e) {
            var dataId = $(this).attr('data-id');
            var value = $(this).prop('files');
            $('#document_certi' + dataId + '_error').html("");
            if (value.length == 0) {
                $('#document_certi' + dataId + '_error').html("Please upload certificate");
                temp++;
            } else {
                var FileUploadPath = value[0].name;
                var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1)
                    .toLowerCase();
                if (Extension == 'pdf') {
                } else {
                    $('#document_certi' + dataId + '_error').html("Only PDF file allowed");
                    temp++;
                }
            }
        })
        $('.dbsdisclosure_error').html('');
        if (disclose == false) {
            $('.dbsdisclosure_error').html('Please select DBS disclosure');
            temp++
        } else {
            var disclosed = $('input[name="dbsdisclosure"]:checked').val();
            if (disclosed == "Yes") {
                if (document_pdf.length == 0) {
                    $('.document_pdf_error').html("Please upload document");
                    temp++
                }
            }
        }

        $('input[name="main_subject_id[]"]').each(function(e) {
            var dataId = $(this).val();
            var dataValue = $('#sub' + dataId).val();
            var level = $('select[name="level' + dataId + '[]"]').val();
            $('#level_' + dataId + '_error').html("");
            $('#subject_' + dataId + '_error').html("");
            if (dataValue == '') {
                $('#subject_' + dataId + '_error').html("Please select subject");
                temp++
            }
            if (level == null) {
                $('#level_' + dataId + '_error').html("Please select tutor level");
                temp++
            }
        })

        if (exprienceinuk == false) {
            $('.exprienceinuk_error').html('Please select tutoring experience');
            temp++
        } else {
            $('.exprienceinuk_error').html('');
        }
        if (tutorexperienceinuk == false) {
            $('.tutorexperienceinuk_error').html('Please select UK tutoring experience');
            temp++
        } else {
            $('.tutorexperienceinuk_error').html('');
        }
        if (paytax == false) {
            $('.paytax_error').html('Please select tutor and pay your own tax');
            temp++
        } else {
            $('.paytax_error').html('');
        }
        if (temp == 0) {
            let myform = document.getElementById("formdata");
            var formData = new FormData(myform);
            $.ajax({
                url: "{{ route('save-tutor') }}",
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#uploaded_image').attr('src', data);
                    if (data.status == 0) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.error_msg);
                        $('.customer_records_dynamic').remove();
                        $('.extra-column').remove();
                        $('#formdata').trigger("reset");
                        $(".selectpicker").selectpicker("refresh");
                        $('#imagePreview').attr('src', '{{asset("uploads/avatar.jpg")}}')
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.name) {
                        tempVal++;
                        $('.error_name').text(jqXHR.responseJSON.message.name);
                    } else {
                        $('.error_name').text('');
                    }
                    if (jqXHR.responseJSON.message.email) {
                        tempVal++;
                        $('.error_email').text(jqXHR.responseJSON.message.email);
                    } else {
                        $('.error_email').text('');
                    }
                    if (jqXHR.responseJSON.message.country) {
                        tempVal++;
                        $('.error_country').text(jqXHR.responseJSON.message.country);
                    } else {
                        $('.error_country').text('');
                    }
                    if (jqXHR.responseJSON.message.mobile) {
                        tempVal++;
                        $('.error_mobile').text(jqXHR.responseJSON.message.mobile);
                    } else {
                        $('.error_mobile').text('');
                    }
                    if (jqXHR.responseJSON.message.address1) {
                        tempVal++;
                        $('.error_address1').text(jqXHR.responseJSON.message.address1);
                    } else {
                        $('.error_address1').text('');
                    }
                    if (jqXHR.responseJSON.message.city) {
                        tempVal++;
                        $('.error_city').text(jqXHR.responseJSON.message.city);
                    } else {
                        $('.error_city').text('');
                    }
                    if (jqXHR.responseJSON.message.postcode) {
                        tempVal++;
                        $('.error_postcode').text(jqXHR.responseJSON.message.postcode);
                    } else {
                        $('.error_postcode').text('');
                    }
                    if (jqXHR.responseJSON.message.title) {
                        tempVal++;
                        $('.error_title').text(jqXHR.responseJSON.message.title);
                    } else {
                        $('.error_title').text('');
                    }
                    if (jqXHR.responseJSON.message.subject_name) {
                        tempVal++;
                        $('.error_subject_name').text(jqXHR.responseJSON.message.subject_name);
                    } else {
                        $('.error_subject_name').text('');
                    }
                    if (jqXHR.responseJSON.message.bio) {
                        tempVal++;
                        $('.error_bio').text(jqXHR.responseJSON.message.bio);
                    } else {
                        $('.error_bio').text('');
                    }
                    if (jqXHR.responseJSON.message.dbsdisclosure) {
                        tempVal++;
                        $('.dbsdisclosure_error').text(jqXHR.responseJSON.message.dbsdisclosure);
                    } else {
                        $('.dbsdisclosure_error').text('');
                    }
                    if (jqXHR.responseJSON.message.exprienceinuk) {
                        tempVal++;
                        $('.exprienceinuk_error').text(jqXHR.responseJSON.message.exprienceinuk);
                    } else {
                        $('.exprienceinuk_error').text('');
                    }
                    if (jqXHR.responseJSON.message.tutorexperienceinuk) {
                        tempVal++;
                        $('.tutorexperienceinuk_error').text(jqXHR.responseJSON.message.tutorexperienceinuk);
                    } else {
                        $('.tutorexperienceinuk_error').text('');
                    }
                    if (jqXHR.responseJSON.message.paytax) {
                        tempVal++;
                        $('.paytax_error').text(jqXHR.responseJSON.message.paytax);
                    } else {
                        $('.paytax_error').text('');
                    }
                    if (jqXHR.responseJSON.message.user_name) {
                        tempVal++;
                        $('.user_name_error').text(jqXHR.responseJSON.message.user_name);
                    } else {
                        $('.user_name_error').text('');
                    }
                    if (jqXHR.responseJSON.message.password) {
                        tempVal++;
                        $('.password_error').text(jqXHR.responseJSON.message.password);
                    } else {
                        $('.password_error').text('');
                    }
                    if (jqXHR.responseJSON.message.profile_image) {
                        tempVal++;
                        $('.profile_pic_error').text(jqXHR.responseJSON.message.profile_image);
                    } else {
                        $('.profile_pic_error').text('');
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
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode >
            31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $('.extra-fields-customer').click(function() {
        var length = $('.copy_id').length;
        var mathRand = Math.floor(100000000 + Math.random() * 900000000);
        var htmlRep = '';
        htmlRep += '<div class="copy_id customer_records_dynamic remove" id="' + mathRand + '">' +
            '<div class="form-group mb-2">'+
            '<div class="row form-data">' +
            '<div class="col-md-3">' +
            '<input name="university[]" class="form-control mb-0" autocomplete="off" maxlength="35" data-id="' + mathRand +
            '" type="text" placeholder="University/Institution">' +
            '<span id="customer_name_' + mathRand + '_error" class="text-danger"></span>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input name="qualification[]" class="form-control mb-0" autocomplete="off" maxlength="255" data-id="' + mathRand +
            '" type="text" placeholder="Qualification">' +
            '<span id="qualification' + mathRand + '_error" class="text-danger"></span>' +
            '</div>' +
            '<div class="col-md-5">' +
            '<div class="downloaded-file position-relative">' +
            '<div class="chemistry-icon-text">    <div class="input-file-bio"> <p type="text" id="uploadeviFile" class="input-upload-bio mt-0 mb-0"> </p> </div> <input type="file"  class="form-control bio-input-fild mb-0 inputbar-padding" name="document_certi[]" id="uploadeviBtn" data-id="' +
            mathRand + '" ><span id="document_certi' + mathRand + '_error" class="text-danger"></span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-1  add"> <a href="javascript:void(0)" class="remove-field btn-remove-customer btn btn-sm btn-danger" onclick="remove(' +
            mathRand + ')"><i class="fa fa-minus fa-icon search-menu2" aria-hidden="true"></i></a></div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#main_id').append(htmlRep);
    });

    function remove(id) {
        $('#' + id).remove();
    }
</script>
@endsection
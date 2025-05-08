@extends('layouts.master')
@section('title', 'Account')
@section('content')
<style>
    .text-end {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .add-btn {
        justify-content: end !important;
        padding-right: 88px;
    }

    .btn.btn-danger,
    .btn.btn-danger:hover:not(.btn-text):not(:disabled):not(.disabled),
    .btn.btn-danger:focus:not(.btn-text),
    .btn.btn-danger.focus:not(.btn-text) {
        background-color: #F64E60;
        border-color: #F64E60;
    }

    .max-upload-main {
        max-width: 119px;
        margin: auto;
    }

    button.pass-icons {
        top: 33px;
    }

    .both-radio-btn {
        display: flex;
        align-items: center;
    }

    .both-span {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: row-reverse;
    }
</style>

<div class="d-flex flex-column-fluid">

    <!--begin::Container-->

    <div class="container-fluid">

        <!--begin::Subject List-->

        <div class="d-flex flex-row">

            <!--begin::Content-->

            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <!--begin::Header-->

                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Your Personal Information</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-pills personaltab-ul" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="personal-info-tab" data-toggle="pill" href="#personal-info" role="tab" aria-controls="pills-home" aria-selected="true">Personal Info</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="account-status-tab" data-toggle="pill" href="#account-status" role="tab" aria-controls="pills-contact" aria-selected="false">Account Status</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="my-bank-account-tab" data-toggle="pill" href="#my-bank-account" role="tab" aria-controls="pills-account" aria-selected="false">My Bank Account</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                <div class="prime-container">
                                    <form method="post" id="personal_information" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row row-spacing">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Name</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="name" name="name" maxlength="50" type="text" autocomplete="off" placeholder="Name" value="{{Auth::guard('web')->user()->first_name}}">
                                                    <span id="error_name" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Email</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="email" name="email" type="text" autocomplete="off" placeholder="Email" value="{{Auth::guard('web')->user()->email}}">
                                                    <span id="error_email" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Country</label> <span style="color:red" class="required-error">*</span>
                                                    <select class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                        <option value="">Select country</option>
                                                        @foreach ($country_list as $val)
                                                        <option value="{{ $val->id }}" @if($val->id==Auth::guard('web')->user()->country_id) selected @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_country" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Telephone</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2 numberCls" id="mobile" name="mobile" type="text" placeholder="Telephone" maxlength="12" autocomplete="off" value="{{Auth::guard('web')->user()->mobile_id}}">
                                                    <span id="error_mobile" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Address 1</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="address1" name="address1" maxlength="255" type="text" placeholder="Address 1" autocomplete="off" value="{{Auth::guard('web')->user()->address1}}">
                                                    <span id="error_address1" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Address 2</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="address2" name="address2" maxlength="255" type="text" placeholder="Address 2" autocomplete="off" value="{{Auth::guard('web')->user()->address2}}">
                                                    <span id="error_address2" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Address 3</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="address3" name="address3" maxlength="255" type="text" placeholder="Address 3" autocomplete="off" value="{{Auth::guard('web')->user()->address3}}">
                                                    <span id="error_address3" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">City</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="city" name="city" type="text" maxlength="255" placeholder="City" autocomplete="off" value="{{Auth::guard('web')->user()->city}}">
                                                    <span id="error_city" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Postcode</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" maxlength="8" id="postcode" name="postcode" type="text" placeholder="Postcode" autocomplete="off" value="{{Auth::guard('web')->user()->postcode}}">
                                                    <span id="error_postcode" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Bio</label> <span style="color:red" class="required-error">*</span>
                                                    <textarea class="form-control placeholder2" cols="30" rows="10" id="bio" name="bio" placeholder="Bio" autocomplete="off" value="{{Auth::guard('web')->user()->bio}}">{{Auth::guard('web')->user()->bio}}</textarea>
                                                    <span id="error_bio" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Title</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" maxlength="100" id="title" name="title" type="text" placeholder="Fully qualified Computer Science, IT & Maths teacher with QTS" autocomplete="off" value="{{Auth::guard('web')->user()->title}}">
                                                    <span id="error_title" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Enter the subjects you teach</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="subject_name" name="subject_name" type="text" placeholder="Maths, Science and English" autocomplete="off" value="{{Auth::guard('web')->user()->subject_name}}">
                                                    <span id="error_subject_name" style="color:red;"></span>
                                                </div>
                                            </div>
                                            @if($tutorDetails->dbs_disclosure != "Yes")
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Check DBS</label>

                                                    <div class="both-radio-btn">
                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" id="customRadio2" value="Yes" name="dbsdisclosure" class="custom-control-input" onclick="show1();" @if($tutorDetails->dbs_disclosure == "Yes") checked @endif>

                                                            <label class=" custom-control-label" for="customRadio2">Yes</label>



                                                        </div>

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" id="customRadio3" name="dbsdisclosure" class="custom-control-input" value="No" onclick="show1();" @if($tutorDetails->dbs_disclosure != "Yes") checked @endif >

                                                            <label class="custom-control-label" for="customRadio3" style="margin-left: 15px;">No</label>



                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3" style=" align-items: center;" id="div1">
                                                <label for="example-text-input" class="form-label">Select DBS</label>
                                                <div class="form-control form-control-spacing">
                                                    <div class="hide">

                                                        <div class="main-file-box">

                                                            <div class="file-flex">

                                                                <input type="file" name="dbs" class="mb-0 blank-input file-input-box inputbar-padding" id="dbs" style="line-height:15px">

                                                            </div>

                                                            <div class="main-file-uplode">

                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="text-danger" id="new_dbs_error"></span>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-md-6 mb-3 dbs-exists" style=" align-items: center;">
                                                <label for="example-text-input" class="form-label">Update DBS</label>
                                                <div class="form-control form-control-spacing">
                                                    <div class="hide">

                                                        <div class="main-file-box">

                                                            <div class="file-flex">

                                                                <input type="file" name="update_dbs" class="mb-0 blank-input file-input-box inputbar-padding" id="update_dbs" style="line-height:15px">

                                                            </div>

                                                            <div class="main-file-uplode">

                                                            </div>

                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="both-span">
                                                    <span id="uploadtitle"><a target="_blank" id="updateDbs" href="{{$tutorDetails->document}}">View</a></span>
                                                    <span class="text-danger" id="update_dbs_error"></span>
                                                </div>

                                            </div>
                                            @endif

                                            <div class="row" style="padding: 0 12.5px 0 12.5px;">

                                                <div class="col-md-12">

                                                    <div id="solumailAddMore">



                                                        @if(!empty($getUniversityDetails[0]))



                                                        @foreach($getUniversityDetails as $key=> $val)

                                                        @php

                                                        $uniqid = uniqid();

                                                        @endphp

                                                        <div class="scopy_id" id="{{ $uniqid }}">

                                                            <div class="row">

                                                                <div class="col-md-3 mb-0">

                                                                    <div class="form-group mb-3">

                                                                        @if($key ==0) <label>University/Institution <span style="color:red" class="required-error">*</span></label>@endif
                                                                        <input name="university[]" maxlength="35" data-id="{{ $uniqid }}" class="mb-0 form-control" autocomplete="off" type="text" placeholder="University/Institution" value="{{$val->university_name}}">
                                                                        <span id="customer_name_{{$uniqid}}_error" style="color:red;"></span>

                                                                    </div>

                                                                </div>

                                                                <div class="col-md-3 mb-0">

                                                                    <div class="form-group mb-3">

                                                                        @if($key ==0)<label> Qualification <span style="color:red" class="required-error">*</span></label>@endif<input name="qualification[]" maxlength="255" data-id="{{ $uniqid }}" class="mb-0 form-control" autocomplete="off" type="text" placeholder="Qualification" value="{{$val->qualification}}">

                                                                        <span id="qualification{{$uniqid}}_error" style="color:red;"></span>

                                                                    </div>

                                                                </div>
                                                                <input type="hidden" name="odocument_certi[]" value="{{$val->document_image}}" class="odocument_{{ $uniqid }}" data-id="{{ $uniqid }}">

                                                                <div class="col-md-4 mb-0">

                                                                    <div class="form-group mb-3">

                                                                        @if($key ==0)<label> Upload Certificates Here <span style="color:red" class="required-error">*</span>
                                                                        </label>@endif

                                                                        <div class="position-relative  max-upload-main">
                                                                            <input type="file" class="mb-0 form-control input-upload-cus" name="document_certi[]" class="bio-input-fild" data-id="{{ $uniqid }}" id="uploadeviBtn">
                                                                            <div class="upload-photo-main">
                                                                                <i class="fa fa-plus plus-sign-upload"></i>
                                                                            </div>
                                                                        </div>
                                                                        <span id="document_certi{{$uniqid}}_error" style="color:red;     margin-left: 62px"></span>

                                                                    </div>

                                                                </div>

                                                                <div class="col-md-1 text-end p-0" style="@if(count($getUniversityDetails) ==1) display:none @endif" id="remove_ids">

                                                                    <a class="btn btn-danger remove-btn1 mb-4" href="javascript:void(0)" onclick="removeSolution('{{ $uniqid }}');">Remove</a>

                                                                </div>

                                                            </div>



                                                        </div>

                                                        @endforeach
                                                        @else

                                                        @php

                                                        $uniqid = uniqid();

                                                        @endphp

                                                        <div class="scopy_id" id="{{ $uniqid }}">

                                                            <div class="row">

                                                                <div class="col-md-3 mb-0">

                                                                    <div class="form-group">

                                                                        <label>University/Institution</label><span style="color:red" class="required-error">*</span>
                                                                        <input name="university[]" maxlength="35" data-id="{{ $uniqid }}" class="mb-0 form-control" autocomplete="off" type="text" placeholder="University/Institution">
                                                                        <span id="customer_name_{{$uniqid}}_error" style="color:red;"></span>

                                                                    </div>

                                                                </div>

                                                                <div class="col-md-3 mb-0">

                                                                    <div class="form-group">

                                                                        <label>Qualification</label><span style="color:red" class="required-error">*</span> <input name="qualification[]" maxlength="255" data-id="{{ $uniqid }}" class="mb-0 form-control" autocomplete="off" type="text" placeholder="Qualification">

                                                                        <span id="qualification{{$uniqid}}_error" style="color:red;"></span>

                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4 mb-0">

                                                                    <div class="form-group">

                                                                        <label>Upload Certificates Here</label><span style="color:red" class="required-error">*</span>
                                                                        <div class="position-relative  max-upload-main">
                                                                            <input type="file" class="mb-0 form-control input-upload-cus" name="document_certi[]" class="bio-input-fild" data-id="{{ $uniqid }}" id="uploadeviBtn">
                                                                            <div class="upload-photo-main">
                                                                                <i class="fa fa-plus plus-sign-upload"></i>
                                                                            </div>
                                                                        </div>

                                                                        <span id="document_certi{{$uniqid}}_error" style="color:red;"></span>

                                                                    </div>

                                                                </div>

                                                                <div class="col-md-1 text-end p-0 mb-0" id="remove_ids_section_two">

                                                                    <a class="btn btn-danger  remove-btn1 mb-0" href="javascript:void(0)" onclick="removeSolution('{{ $uniqid }}');">Remove</a>

                                                                </div>

                                                            </div>



                                                        </div>
                                                        @endif

                                                    </div>

                                                </div>

                                                <div class="col-md-12 text-end add-btn">

                                                    <a class="btn btn-primary float-right" onclick="addMoreSolution();" href="javascript:void(0)">Add</a>

                                                </div>

                                            </div>

                                            <div class="col-md-3 offset-md-9 mt-3">
                                                <input id="submitBtn" class="btn btn-primary w-100" type="button" value="Update">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <div class="prime-container">
                                    <form method="post" id="update_password">
                                        @csrf
                                        <div class="row row-spacing">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Current Password</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="current_password" name="current_password" type="password" autocomplete="off" placeholder="Current Password">
                                                    <button id="toggle-password" class="pass-icons" type="button">
                                                        <img src="{{ asset('front/img/close-eye.svg')}}" alt="eye icon" class="icon1">
                                                        <img src="{{ asset('front/img/eye.svg')}}" alt="eye icon" class="icon2">
                                                    </button>
                                                    <span id="current_password_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">New Password</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="new_password" name="new_password" type="password" autocomplete="off" placeholder="New Password">
                                                    <button id="new-toggle-password" class="pass-icons" type="button">
                                                        <img src="{{ asset('front/img/close-eye.svg')}}" alt="eye icon" class="icon1">
                                                        <img src="{{ asset('front/img/eye.svg')}}" alt="eye icon" class="icon2">
                                                    </button>
                                                    <span id="new_password_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Confirm Password</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="confirmation_password" name="confirmation_password" type="password" autocomplete="off" placeholder="Confirm Password">
                                                    <button id="confirm-toggle-password" class="pass-icons" type="button">
                                                        <img src="{{ asset('front/img/close-eye.svg')}}" alt="eye icon" class="icon1">
                                                        <img src="{{ asset('front/img/eye.svg')}}" alt="eye icon" class="icon2">
                                                    </button>
                                                    <span id="confirmation_password_error" style="color:red;"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-3 offset-md-9 mt-3">
                                                <input id="submitBtnPwd" class="btn btn-primary w-100" type="button" value="Update">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-status" role="tabpanel" aria-labelledby="account-status-tab">
                                @if(Auth::guard('web')->user()->status == "Pending")
                                <td><span class="badge badge-primary">Pending</span></td>
                                @elseif(Auth::guard('web')->user()->status =='Accepted')
                                <td><span class="badge badge-success">Approved</span></td>
                                @else
                                <td><span class="badge badge-danger">Not Approved</span></td>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="my-bank-account" role="tabpanel" aria-labelledby="my-bank-account-tab">
                                <p class="mb-1"><b>Please provide us with your bank details so we are able to transfer your wages.</b></p>
                                <p><b>We pay every friday.</b></p>
                                <div class="prime-container">
                                    <form method="post" id="account-details">
                                        @csrf
                                        <div class="row row-spacing">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Account Holder Name</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="account_holder_name" name="account_holder_name" type="text" autocomplete="off" placeholder="Enter Account Holder Name">
                                                    <span id="account_holder_name_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Bank Name</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="bank_name" name="bank_name" type="text" autocomplete="off" placeholder="Enter Bank Name">
                                                    <span id="bank_name_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Bank Account Number</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="account_number" maxlength="12" name="account_number" type="text" autocomplete="off" placeholder="Enter Bank Account Number" onkeypress="return isNumber(event)">
                                                    <span id="account_number_error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-control-spacing">
                                                    <label for="example-text-input" class="form-label">Bank Sort Code</label> <span style="color:red" class="required-error">*</span>
                                                    <input class="form-control placeholder2" id="sort_code" name="sort_code" type="text" autocomplete="off" placeholder="Enter Bank Sort Code">
                                                    <span id="sort_code_error" style="color:red;"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-3 offset-md-9 mt-3">
                                                <input id="submitbankdetails" class="btn btn-primary w-100" type="button" value="Update">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

            <!--end::Content-->

        </div>

        <!--end::Subject List-->

    </div>

    <!--end::Container-->

</div>


@endsection
@section('page-js')
<script>
    if ($('.dbs-exists').length == 0) {
        show1();
    }

    function show1() {

        var names = $('input[name="dbsdisclosure"]:checked').val();

        if (names == 'Yes') {

            document.getElementById('div1').style.display = 'block';

        } else {

            document.getElementById('div1').style.display = 'none';

        }



    }

    CKEDITOR.replace('bio');

    var togglePassword = document.getElementById("toggle-password");

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            var x = document.getElementById("current_password");
            if (x.type === "password") {
                x.type = "text";
                $(this).addClass("active");
            } else {
                x.type = "password";
                $(this).removeClass("active");

                // $("#toggle-password" <!--Background Area Start-->).removeClass("active");

            }
        });
    }

    var togglePassword = document.getElementById("new-toggle-password");

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            var x = document.getElementById("new_password");
            if (x.type === "password") {
                x.type = "text";
                $(this).addClass("active");
            } else {
                x.type = "password";
                $(this).removeClass("active");

                // $("#toggle-password" <!--Background Area Start-->).removeClass("active");

            }
        });
    }
    var togglePassword = document.getElementById("confirm-toggle-password");

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            var x = document.getElementById("confirmation_password");
            if (x.type === "password") {
                x.type = "text";
                $(this).addClass("active");
            } else {
                x.type = "password";
                $(this).removeClass("active");

                // $("#toggle-password" <!--Background Area Start-->).removeClass("active");

            }
        });
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
    toastr.options.closeButton = true;
    toastr.options.tapToDismiss = false;
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

    $("#submitBtn").click(function() {
        $('#submitBtn').attr('disabled', true);
        var name = $("#name").val();
        var email = $("#email").val();
        var country = $("#country").val();
        var mobile = $("#mobile").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var address3 = $("#address3").val();
        var postcode = $("#postcode").val();
        var city = $("#city").val();
        var bio = CKEDITOR.instances['bio'].getData();
        var title = $("#title").val();
        var subjectName = $("#subject_name").val();
        var temp = 0;
        $("#error_name").html('');
        $("#error_email").html('');
        $("#error_country").html('');
        $("#error_mobile").html('');
        $("#error_address1").html('');
        $("#error_address2").html('');
        $("#error_address3").html('');
        $("#error_city").html('');
        $("#error_postcode").html('');
        $("#error_bio").html('');
        $("#error_title").html('');
        $("#error_subject_name").html('');
        $("#update_dbs_error").html('');

        var formData = new FormData($('#personal_information')[0]);
        formData.append('bionew', bio)

        if (name.trim() == '') {
            $('#error_name').html('Please enter Name');
            temp++;
        }
        if (email == '') {
            $('#error_email').html('Please enter Email');
            temp++;

        } else {
            if (!ValidateEmail(email)) {
                $('#error_email').html("Invalid Email");
                temp++;
            } else {
                $.ajax({
                    async: false,
                    global: false,
                    url: "{{ route('check-email-tutor') }}",
                    type: "get",
                    data: {
                        email: email
                    },
                    success: function(response) {

                        if (response.status == 1) {

                            $('#error_email').html("Email is already exist");

                            temp++;



                        } else {

                            $('#error_email').html("");

                        }

                    }

                });

            }

        }



        if (country.trim() == '') {

            $('#error_country').html('Please select Country');

            temp++;

        }
        if (mobile.trim() == '') {

            $('#error_mobile').html('Please enter Telephone');

            temp++;

        } else if (!validateMobileNo(mobile)) {
            $('#error_mobile').html('Please enter Valid Telephone');
            temp++;
        }

        if (address1.trim() == '') {

            $('#error_address1').html('Please enter Address 1');

            temp++;

        }

        if (address2.trim() == '') {

            $('#error_address2').html('Please enter Address 2');

            temp++;

        }

        if (address3.trim() == '') {

            $('#error_address3').html('Please enter Address 3');

            temp++;

        }

        if (city.trim() == '') {

            $('#error_city').html('Please enter City');

            temp++;

        }

        if (postcode.trim() == '') {

            $('#error_postcode').html('Please enter Postcode');

            temp++;

        }

        if (bio.trim() == '') {

            $('#error_bio').html('Please enter Bio');

            temp++;

        }
        var formData = new FormData($('#personal_information')[0]);
        formData.append('bionew', bio);

        if (title.trim() == '') {

            $('#error_title').html('Please enter Title');

            temp++;

        }

        if (subjectName.trim() == '') {

            $('#error_subject_name').html('Please enter Subject Name');

            temp++;

        }
        if ($('.dbs-exists').length != 0) {
            var dbsImage = $('#update_dbs').prop('files');

            if (dbsImage.length != 0) {
                var fileUploadPath = dbsImage[0].name;
                var Extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (Extension == "pdf") {
                    $('#update_dbs_error').html("");
                } else {
                    $('#update_dbs_error').html("Only Pdf Allowed");
                    temp++;
                }
            }
        }
        var radioVal = $("input[name='dbsdisclosure']:checked").val();
        $('#new_dbs_error').html("");
        if (radioVal == "Yes") {
            var dbsNew = $('#dbs').prop('files');
            if (dbsNew.length == 0) {
                $('#new_dbs_error').html("Please upload DBS.");
                temp++;
            } else {
                var fileUploadPath = dbsNew[0].name;
                var Extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (Extension == "pdf") {
                    $('#new_dbs_error').html("");
                } else {
                    $('#new_dbs_error').html("Only Pdf Allowed.");
                    temp++;
                }
            }
        }



        $('input[name="university[]"]').each(function(e) {

            var dataId = $(this).attr('data-id');

            var value = $(this).val();

            $('#customer_name_' + dataId + '_error').html("");

            if (value.trim() == '') {

                $('#customer_name_' + dataId + '_error').html("Please enter University/Institution");

                temp++;

            }

        })

        $('input[name="qualification[]"]').each(function(e) {

            var dataId = $(this).attr('data-id');

            var value = $(this).val();

            $('#qualification' + dataId + '_error').html("");

            if (value.trim() == '') {

                $('#qualification' + dataId + '_error').html("Please enter Qualification");

                temp++;

            }

        })

        $('input[name="document_certi[]"]').each(function(e) {
            var dataId = $(this).attr('data-id');
            var image = $(this).prop('files');
            var exisImage = $('.odocument_' + dataId).val();
            if (image.length == 0 && exisImage == undefined) {
                $('#document_certi' + dataId + '_error').html("Please upload Certificate");
                temp++;
            } else {
                if (image.length != 0) {
                    var fileUploadPath = image[0].name;
                    var Extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                    if (Extension == "pdf") {
                        $('#document_certi' + dataId + '_error').html("");
                    } else {
                        $('#document_certi' + dataId + '_error').html("Only Pdf Allowed");
                        temp++;
                    }
                }

            }


        });

        if (temp == 0) {

            $.ajax({

                url: "{{route('update-tutor')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    setTimeout(function() {
                        $('#submitBtn').attr('disabled', false);
                    }, 2500);
                    if (result) {
                        toastr.success(result.success_msg);
                        if (result.data[0].update_dbs != "") {
                            $("#updateDbs").attr("href", result.data[0].update_dbs);
                        }
                        if (result.data[0].new_dbs != "") {
                            location.reload();
                        }
                        $("#sidebar_auth_name").html(result.data[0].first_name);
                        $("#header_auth_name").html(result.data[0].first_name);
                        $("#auth_email_sidebar").html(result.data[0].email);
                    } else {
                        toastr.error(result.error_msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.name) {
                        tempVal++;
                        $('#error_name').text(jqXHR.responseJSON.message.name);
                    } else {
                        $('#error_name').text('');
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
                    if (jqXHR.responseJSON.message.mobile) {
                        tempVal++;
                        $('#error_mobile').text(jqXHR.responseJSON.message.mobile);
                    } else {
                        $('#error_mobile').text('');
                    }
                    if (jqXHR.responseJSON.message.address1) {
                        tempVal++;
                        $('#error_address1').text(jqXHR.responseJSON.message.address1);
                    } else {
                        $('#error_address1').text('');
                    }
                    if (jqXHR.responseJSON.message.address2) {
                        tempVal++;
                        $('#error_address2').text(jqXHR.responseJSON.message.address2);
                    } else {
                        $('#error_address2').text('');
                    }
                    if (jqXHR.responseJSON.message.address3) {
                        tempVal++;
                        $('#error_address3').text(jqXHR.responseJSON.message.address3);
                    } else {
                        $('#error_address3').text('');
                    }
                    if (jqXHR.responseJSON.message.city) {
                        tempVal++;
                        $('#error_city').text(jqXHR.responseJSON.message.city);
                    } else {
                        $('#error_city').text('');
                    }
                    if (jqXHR.responseJSON.message.postcode) {
                        tempVal++;
                        $('#error_postcode').text(jqXHR.responseJSON.message.postcode);
                    } else {
                        $('#error_postcode').text('');
                    }
                    if (jqXHR.responseJSON.message.bio) {
                        tempVal++;
                        $('#error_bio').text(jqXHR.responseJSON.message.bio);
                    } else {
                        $('#error_bio').text('');
                    }
                    if (jqXHR.responseJSON.message.title) {
                        tempVal++;
                        $('#error_title').text(jqXHR.responseJSON.message.title);
                    } else {
                        $('#error_title').text('');
                    }
                    if (jqXHR.responseJSON.message.subject_name) {
                        tempVal++;
                        $('#error_subject_name').text(jqXHR.responseJSON.message.subject_name);
                    } else {
                        $('#error_subject_name').text('');
                    }
                    if (jqXHR.responseJSON.message.update_dbs) {
                        tempVal++;
                        $('#update_dbs_error').text(jqXHR.responseJSON.message.update_dbs);
                    } else {
                        $('#update_dbs_error').text('');
                    }
                    if (jqXHR.responseJSON.message.dbs) {
                        tempVal++;
                        $('#new_dbs_error').text(jqXHR.responseJSON.message.dbs);
                    } else {
                        $('#new_dbs_error').text('');
                    }
                    if (tempVal == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });
        } else {
            $('#submitBtn').attr('disabled', false);
            return false;
        }

    });
    $("#submitBtnPwd").click(function() {
        var temp = 0;
        var current_password = $('#current_password').val();
        var new_password = $('#new_password').val();
        var confirmation_password = $('#confirmation_password').val();
        $('#current_password_error').html("");
        $('#new_password_error').html("");
        $('#confirmation_password_error').html("");
        if (current_password.trim() == '') {
            $('#current_password_error').html("Current Password is required.");
            temp++;
        } else {
            $.ajax({
                async: false,
                global: false,
                url: "{{ route('check-password-tutor') }}",
                type: "get",
                data: {
                    pwd: current_password
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#current_password_error').html("Please enter correct Current Password");
                        temp++;
                    } else {
                        $('#current_password_error').html("");
                    }
                }
            });
        }

        if (new_password.trim() == '') {
            $('#new_password_error').html("New Password is required.");
            temp++;
        }

        if (new_password.trim() != '') {
            if (!ValidatePassword(new_password)) {
                $('#new_password_error').html("Password should include 6 charaters, alphabets, numbers and special characters");
                temp++;
            }
        }
        if (confirmation_password.trim() == '') {
            $('#confirmation_password_error').html("Confirm Password is required.");
            temp++;
        }
        if (confirmation_password.trim() != '' && new_password.trim() != '') {
            if (new_password.trim() != confirmation_password.trim()) {
                $('#confirmation_password_error').html("New password and Confirm password does not match.");
                temp++;
            }

        }
        if (temp == 0) {
            $.ajax({
                async: false,
                url: "{{route('update-password-tutor')}}",
                type: "POST",
                data: new FormData($('#update_password')[0]),
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    if (result) {
                        $('#update_password')[0].reset();
                        toastr.success(result.success_msg);
                    } else {
                        toastr.error(result.error_msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.current_password) {
                        tempVal++;
                        $('#current_password_error').text(jqXHR.responseJSON.message.current_password);
                    } else {
                        $('#current_password_error').text('');
                    }
                    if (jqXHR.responseJSON.message.new_password) {
                        tempVal++;
                        $('#new_password_error').text(jqXHR.responseJSON.message.new_password);
                    } else {
                        $('#new_password_error').text('');
                    }
                    if (jqXHR.responseJSON.message.confirmation_password) {
                        tempVal++;
                        $('#confirmation_password_error').text(jqXHR.responseJSON.message.confirmation_password);
                    } else {
                        $('#confirmation_password_error').text('');
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

    function tutorBankDetailsAjax() {
        $.ajax({
            async: false,
            global: false,
            url: "{{ route('get-tutor-bank-details') }}",
            type: "get",

            success: function(response) {

                $('#account_holder_name').val(response.account_holder_name);
                $('#bank_name').val(response.bank_name);
                $('#account_number').val(response.bank_account_number);
                $('#sort_code').val(response.bank_sort_code);

            }
        });
    }
    $(document).ready(function() {
        tutorBankDetailsAjax();
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
    $("#submitbankdetails").click(function() {
        var temp = 0;
        var accountHolderName = $('#account_holder_name').val();
        var bankName = $('#bank_name').val();
        var accountNumber = $('#account_number').val();
        var sortCode = $('#sort_code').val();

        $('#account_holder_name_error').html("");
        $('#bank_name_error').html("");
        $('#account_number_error').html("");
        $('#sort_code_error').html("");

        if (accountHolderName.trim() == '') {
            $('#account_holder_name_error').html("Account holder name is required.");
            temp++;
        }
        if (bankName.trim() == '') {
            $('#bank_name_error').html("Bank name is required.");
            temp++;
        }
        if (accountNumber.trim() == '') {
            $('#account_number_error').html("Account number Bank is required.");
            temp++;
        }
        if (sortCode.trim() == '') {
            $('#sort_code_error').html("Bank sort code is required.");
            temp++;
        }

        if (temp == 0) {
            $.ajax({
                async: false,
                url: "{{route('store-account-details')}}",
                type: "POST",
                data: new FormData($('#account-details')[0]),
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    if (result) {
                        $('#account-details')[0].reset();
                        toastr.success(result.success_msg);
                        tutorBankDetailsAjax();
                    } else {
                        toastr.error(result.error_msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tempVal = 0;
                    if (jqXHR.responseJSON.message.current_password) {
                        tempVal++;
                        $('#account_holder_name_error').text(jqXHR.responseJSON.message.account_holder_name);
                    } else {
                        $('#account_holder_name_error').text('');
                    }
                    if (jqXHR.responseJSON.message.new_password) {
                        tempVal++;
                        $('#bank_name_error').text(jqXHR.responseJSON.message.bank_name);
                    } else {
                        $('#bank_name_error').text('');
                    }
                    if (jqXHR.responseJSON.message.account_number) {
                        tempVal++;
                        $('#account_number_error').text(jqXHR.responseJSON.message.confirmation_password);
                    } else {
                        $('#account_number_error').text('');
                    }
                    if (jqXHR.responseJSON.message.sort_code) {
                        tempVal++;
                        $('#sort_code_error').text(jqXHR.responseJSON.message.confirmation_password);
                    } else {
                        $('#sort_code_error').text('');
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


    function addMoreSolution() {

        var length = $('.copy_id').length;

        var mathRand = Math.floor(100000000 + Math.random() * 900000000);

        var htmlRep = '';

        htmlRep += '<div class="scopy_id  customer_records_dynamic remove" id="' + mathRand + '">' +

            '<div class="row form-data">' +

            '<div class="col-md-3 mb-6">' +

            '<input name="university[]" class="mb-0 form-control" autocomplete="off" maxlength="35" data-id="' + mathRand +
            '" type="text" placeholder="University/Institution">' +

            '<span id="customer_name_' + mathRand + '_error" style="color:red;"></span>' +

            '</div>' +

            '<div class="col-md-3 mb-6">' +

            '<input name="qualification[]" class="mb-0 form-control" autocomplete="off" maxlength="255" data-id="' + mathRand +
            '" type="text" placeholder="Qualification">' +

            '<span id="qualification' + mathRand + '_error" style="color:red;"></span>' +

            '</div>' +

            '<div class="col-md-4 mb-6">' +

            '<div class="downloaded-file position-relative">' +

            '<div class="chemistry-icon-text">    <div class="input-file-bio"> <p type="text" id="uploadeviFile" class="input-upload-bio mt-0 mb-0"> </p> </div> <div class="position-relative  max-upload-main"><input type="file"  class="bio-input-fild mb-0 form-control input-upload-cus" name="document_certi[]" id="uploadeviBtn" data-id="' +
            mathRand + '" > <div class="upload-photo-main"> <i class = "fa fa-plus plus-sign-upload"></i></div><span id="document_certi' + mathRand + '_error" style="color:red;"></span > </div>' +
            '</div>' +

            '</div>' +

            '</div>' +

            '<div class="col-md-1 add text-end p-0"> <a href="javascript:void(0)" class="remove-field btn btn-danger btn-remove-customer" onclick="removeSolution(' +
            mathRand + ')">Remove</a></div>' +

            '</div>' +

            '</div>';

        $('#solumailAddMore').append(htmlRep);
        if ($('.scopy_id').length > 1) {

            $('#remove_ids').attr('style', '');

        }
    }


    function removeSolution(id) {

        var copyLength = $('.scopy_id').length;

        $('#' + id).remove();

        if ($('.scopy_id').length == 1) {

            $('#remove_ids').attr('style', 'display:none');

        }
    }
</script>
@endsection
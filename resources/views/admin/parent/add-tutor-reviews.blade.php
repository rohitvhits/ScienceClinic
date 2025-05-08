@extends('layouts.master')
@section('title', 'Add Tutor Review')
@section('content')
<style>
    .card-header {Tutor Name * border-bottom: 0 !important; } .error { color: red; } .card-custom { padding: 20px 0; }
</style>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <div class="flex-row-fluid">
                <div class="card card-custom card-stretch">
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Add Tutor Review</h3>
                        </div>
                    </div>
                    <form class="form" id="submitid">
                        @csrf
                        <div class="card-body py-0">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tutor <span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker" name="tutor" id="tutor" aria-label="Default select example" data-live-search="true">
                                            <option value="">Select Tutor</option>
                                            @foreach($tutorList as $key => $tv)
                                            <option value="{{$tv->id}}">{{$tv->first_name.' '.$tv->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text error tutor_error">{{ $errors->useredit->first('tutor')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject Name <span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker" required name="subject_name" id="subject_name" aria-label="Default select example" data-live-search="true">
                                            <option value="">Select Subject</option>
                                            @foreach($teacher_subject_list as $key => $sval)
                                                <option value="{{$sval->id}}">{{$sval->main_title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text error subject_name_error">{{ $errors->useredit->first('subject_name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent First Name <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent First Name" autocomplete="off" id="parent_first_name" type="text" data-msg="Parent First Name" name="parent_first_name">
                                        <span class="form-text error parent_first_name_error">{{ $errors->useredit->first('parent_first_name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent Last Name" autocomplete="off" id="parent_last_name" type="text" data-msg="Parent Last Name" name="parent_last_name">
                                        <span class="form-text error parent_last_name_error">{{ $errors->useredit->first('parent_last_name')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                                <span class="form-text error country_error">{{ $errors->useredit->first('level')}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group mb-0">
                                                <label>Parent Mobile <span class="text-danger">*</span></label>
                                                <input class="form-control validate_field" placeholder="Enter Parent Mobile" autocomplete="off" id="parent_mobile" type="text" data-msg="Parent Mobile" name="parent_mobile">
                                                <span class="form-text error parent_mobile_error">{{ $errors->useredit->first('parent_mobile')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent Email <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent Email" autocomplete="off" id="parent_email" type="text" data-msg="Parent Email" name="parent_email">
                                        <span class="form-text error parent_email_error">{{ $errors->useredit->first('parent_email')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Star <span class="text-danger">*</span></label>
                                        <select class="form-control validate_field" id="star" name="star">
                                            <option value="">Select star</option>
                                            <option value="5">5</option>
                                            <option value="4">4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                            <option value="0">0</option>
                                        </select>
                                        <span class="form-text error star_error">{{ $errors->useredit->first('star')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Feedback Message <span class="text-danger">*</span></label>
                                        <textarea class="form-control validate_field" placeholder="Enter Feedback Message" autocomplete="off" id="message" data-msg="Parent Address" name="message"></textarea>
                                        <span class="form-text error message_error">{{ $errors->useredit->first('message')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="both-btn-form">
                                <button type="button" id="add_tutor" class="btn btn-primary mr-2 add_tutor_form" style="background-color:#3498db !important">Add</button>
                                <a href="{{route('tutor-reviews')}}" class="btn btn-secondary mr-2">Cancel</a>
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
@endsection
@section('page-js')
<script src="{{asset('assets/Modulejs/textbooks.js')}}"></script>
<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $('#tuition_time').timepicker({
        defaultTIme: false
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
    $('.add_tutor_form').click(function() {
        var tutor = $('#tutor').val();
        var subNam = $('#subject_name').val();
        var pfnam = $('#parent_first_name').val();
        var plnam = $('#parent_last_name').val();
        var country = $('#country').val();
        var pmob = $('#parent_mobile').val();
        var pmail = $('#parent_email').val();
        var star = $('#star').val();
        var msg = $('#message').val();
        var temp = 0;
        $('.tutor_error').html("");
        $('.subject_name_error').html("");
        $('.parent_first_name_error').html("");
        $('.parent_last_name_error').html("");
        $('.country_error').html("");
        $('.parent_mobile_error').html("");
        $('.parent_email_error').html("");
        $('.star_error').html("");
        $('.message_error').html("");
        if (tutor.trim() == "") { $('.tutor_error').html("Please select tutor"); temp++; }
        if (subNam.trim() == "") { $('.subject_name_error').html("Please select subject"); temp++; }
        if (pfnam == "") { $('.parent_first_name_error').html("Please enter parent first name"); temp++; }
        if (plnam == "") { $('.parent_last_name_error').html("Please enter parent last name"); temp++; }
        if (country == "") { $('.country_error').html("Please select country"); temp++; }
        if (pmob == "") { $('.parent_mobile_error').html("Please enter parent mobile"); temp++; }
        if (pmail == "") { $('.parent_email_error').html("Please enter parent email"); temp++; }
        if (star == "") { $('.star_error').html("Please select star"); temp++; }
        if (msg == "") { $('.message_error').html("Please enter message"); temp++; }
        if (temp == 0) {
            $.ajax({
                url: "{{route('save-tutor-reviews')}}",
                type: 'post',
                data: new FormData($('#submitid')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(res) {
                    if (res.status == 1) {
                        $('#tutor').val("");
                        $('#subject_name').val("");
                        $('#parent_first_name').val("");
                        $('#parent_last_name').val("");
                        $('#country').val("");
                        $('#parent_mobile').val("");
                        $('#parent_email').val("");
                        $('#star').val("");
                        $('#message').val("");
                        $(".selectpicker").selectpicker("refresh");
                        toastr.success(res.error_msg);
                    }
                    else if (res.status == 2) {
                        toastr.error(res.data);
                    }
                    else {
                        toastr.error(res.error_msg);
                    }
                },
            })
        } else { return false; }
    });
</script>
@endsection
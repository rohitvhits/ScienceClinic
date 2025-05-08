@extends('layouts.master')
@section('title', 'Edit Student')
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
                            <h3 class="card-label font-weight-bolder text-dark">Edit Student</h3>
                        </div>
                    </div>
                    <form class="form" id="submitid">
                        @csrf
                        <input type="hidden" name="eid" value="{{$formData->id}}">
                        <div class="card-body py-0">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Student Name" autocomplete="off" id="student_name" type="text" data-msg="Student Name" name="student_name" value="{{$studentData->student_name}}">
                                        <span class="form-text error student_name_error">{{ $errors->useredit->first('student_name')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Name <span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker" required id="subject_name" name="subject_name" aria-label="Default select example" data-live-search="true">
                                            <option value="">Select Subject</option>
                                            @foreach($teacher_subject_list as $key => $sval)
                                                <option value="{{$sval->subject_id}}" @if($studentData->subject_id==$sval->subject_id) selected @endif>{{$sval->main_title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text error subject_name_error">{{ $errors->useredit->first('subject_name')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Level <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Level" autocomplete="off" id="level" type="text" data-msg="Level" name="level" value="{{$studentData->level}}">
                                        <span class="form-text error level_error">{{ $errors->useredit->first('level')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Year Group <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Year Group" autocomplete="off" id="year_group" type="text" data-msg="Year Group" name="year_group" value="{{$studentData->year_group}}">
                                        <span class="form-text error year_group_error">{{ $errors->useredit->first('year_group')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent Name <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent Name" autocomplete="off" id="parent_name" type="text" data-msg="Parent Name" name="parent_name" value="{{$studentData->parent_name}}">
                                        <span class="form-text error parent_name_error">{{ $errors->useredit->first('parent_name')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-0">
                                                    <label>Country <span class="text-danger">*</span></label>
                                                    <select class="selectpicker " data-id="country" name="country" id="country" aria-label="Default select example" data-live-search="true">
                                                        <option value="">Select country</option>
                                                        @foreach ($country_list as $val)
                                                        <option value="{{ $val->id }}" @if($val->id==$studentData->country_id) selected @endif>+{{ $val->phonecode.' ('.$val->iso.')' }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-text error country_error">{{ $errors->useredit->first('country')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group mb-0">
                                                    <label>Parent Mobile <span class="text-danger">*</span></label>
                                                    <input class="form-control validate_field" placeholder="Enter Parent Mobile" autocomplete="off" id="parent_mobile" type="text" data-msg="Parent Mobile" name="parent_mobile" value="{{$studentData->parent_mobile}}">
                                                    <span class="form-text error parent_mobile_error">{{ $errors->useredit->first('parent_mobile')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent Email <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent Email" autocomplete="off" id="parent_email" type="text" data-msg="Parent Email" name="parent_email" value="{{$studentData->parent_email}}">
                                        <span class="form-text error parent_email_error">{{ $errors->useredit->first('parent_email')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent Address <span class="text-danger">*</span></label>
                                        <input class="form-control validate_field" placeholder="Enter Parent Address" autocomplete="off" id="parent_address" type="text" data-msg="Parent Address" name="parent_address" value="{{$studentData->parent_address}}">
                                        <span class="form-text error parent_address_error">{{ $errors->useredit->first('parent_address')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="both-btn-form">
                                <button type="button" id="add_tutor" class="btn btn-primary mr-2 add_tutor_form" style="background-color:#3498db !important">Update</button>
                                <a href="{{route('tutor-student')}}" class="btn btn-secondary mr-2">Cancel</a>
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
        var studentName = $('#student_name').val();
        var temp = 0;
        $('.student_name_error').html("");
        if (studentName.trim() == "") {
            $('.student_name_error').html("Please enter Student Name");
            temp++;
        }
        if (temp == 0) {
            $.ajax({
                url: "{{route('save-tutor-student')}}",
                type: 'post',
                data: new FormData($('#submitid')[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(res) {
                    if (res.status == 1) {
                        toastr.success(res.error_msg);
                        window.location.assign('/tutor-student');
                    } else {
                        toastr.error(res.error_msg);
                    }
                },
            })
        } else { return false; }
    });
</script>
@endsection
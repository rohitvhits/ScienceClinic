@extends('layouts.master')
@section('title', 'New Bookings Master')
@section('content')
<link href="{{ asset('assets/css/pages/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">

<style>
    .daterangepicker {

        z-index: 999999 !important;

    }
</style>
<div class="d-flex flex-column-fluid">

    <div class="container-fluid">

        <div class="d-flex flex-row">

            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <!--begin::Header-->

                    <div class="card-header py-3">

                        <div class="card-title align-items-start flex-column">

                            <h3 class="card-label font-weight-bolder text-dark">New Bookings List</h3>

                        </div>

                        <div class="card-toolbar">

                            <!--begin::Dropdown-->

                            <div class="dropdown dropdown-inline mr-2">

                                <button id="kt_demo_panel_toggle" type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="svg-icon svg-icon-md">

                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                <rect x="0" y="0" width="24" height="24"></rect>

                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>

                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>

                                            </g>

                                        </svg>

                                        <!--end::Svg Icon-->

                                    </span>Search</button>

                                <!--begin::Dropdown Menu-->



                            </div>

                            <div class="dropdown dropdown-inline mr-2">

                                <a href="javascript:void(0)" class="btn btn-primary mr-2" id="add-booking" data-toggle="modal" data-target="#ajax-crud-modal" title="Add booking">

                                    <span class="svg-icon svg-icon-md">

                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                <rect x="0" y="0" width="24" height="24"></rect>

                                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>

                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>

                                            </g>

                                        </svg>

                                        <!--end::Svg Icon-->

                                    </span>Add booking
                                </a>

                                <!--begin::Dropdown Menu-->

                            </div>

                            <!--end::Dropdown-->

                            <!--begin::Button-->



                            <!--end::Button-->

                        </div>



                    </div>

                    <div class="card-body">

                        <div class="table-responsive" id="response_id">



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

<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10 ">

    <!--begin::Header-->

    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7" kt-hidden-height="47">

        <h4 class="font-weight-bold m-0">Search</h4>

        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">

            <i class="ki ki-close icon-xs text-muted"></i>

        </a>

    </div>

    <!--end::Header-->

    <!--begin::Content-->

    <div class="offcanvas-content">

        <!--begin::Wrapper-->
        <div class="form-group row">

            <label class="col-4 col-form-label">Student Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Student Name" type="text" name="name" id="name">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Tutor Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Tutor Name" type="text" name="tname" id="tname">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Subject Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Subject Name" type="text" name="sname" id="sname">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Level</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Level" type="text" name="level" id="level">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Day</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Day" type="text" name="day" id="day">

            </div>

        </div>


        <!--end::Wrapper-->

        <!--begin::Purchase-->

        <div class="offcanvas-footer" kt-hidden-height="38">

            <div class="row">

                <div class="col-6">

                    <a class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase search_id">Apply</a>



                </div>

                <div class="col-6">

                    <a class="btn btn-block btn-secondary btn-shadow font-weight-bolder text-uppercase clear">Cancel</a>

                </div>

            </div>

        </div>

        <!--end::Purchase-->

    </div>

    <!--end::Content-->

</div>
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add booking</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <i aria-hidden="true" class="ki ki-close"></i>

                </button>

            </div>

            <form action="{{route('admin-offline-booking-store')}}" method="post" id="offlineBookingForm" name="userForm" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Student Name <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker validate_field" name="sname" id="student_name" data-msg="Student Name" aria-label="select" data-live-search="true">
                                <option value="">Select Student</option>
                                @foreach($studentList as $key2 => $sval)
                                <?php
                                $snam=trim($sval->student_name);
                                ?>
                                <option value="{{$snam}}">{{$snam}}</option>
                                @endforeach
                            </select>
                            <span class="title error_msg error" style="color: red;" id="name_error">{{ $errors->booking->first('sname')}}</span>

                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Tutor <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="tutor_name" id="tutor_name">

                                <option value="">Select Tutor</option>

                                @foreach($tutorData as $val)
                                <option value="{{$val->id}}">{{$val->first_name}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="tutor_name_error">{{ $errors->booking->first('tutor_name')}}</span>

                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Subject <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="main_subject" id="main_subject">

                                <option value="">Select Subject</option>

                                @foreach($subject as $val)
                                <option value="{{$val->id}}">{{$val->main_title}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="subject_error">{{ $errors->booking->first('main_subject')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Level <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="level" id="add_level">

                                <option value="">Select Level</option>

                                @foreach($level as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="level_error">{{ $errors->booking->first('level')}}</span>

                        </div>

                    </div>
                    @php $daysArr = [ 'Monday' =>'monday',
                    'Tuesday' => 'tuesday',
                    'Wednesday' => 'wednesday',
                    'Thursday' => 'thursday',
                    'Friday' => 'friday',
                    'Saturday' => 'saturday',
                    'Sunday' => 'sunday'] @endphp
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Day <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="day" id="add_day">

                                <option value="">Select Day</option>

                                @foreach($daysArr as $key=>$val)
                                <option value="{{$val}}">
                                    {{$key}}
                                </option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="day_error">{{ $errors->booking->first('level')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Idel Time <span class="text-danger">*</span></label>

                            <input type="text" class="form-control" name="idel_time" id="idel_time">


                            <span class="idel_time error_msg error" style="color: red;" id="idel_time_error">{{ $errors->booking->first('idel_time')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Email</label>

                            <input type="text" class="form-control" name="email" id="email">


                            <span class="idel_time error_msg error" style="color: red;" id="email_error"></span>

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="exampleSelectd">No of Lessons <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="no_of_lessons" id="no_of_lessons">
                            <span class="idel_time error_msg error" style="color: red;" id="no_of_lessons_error">{{ $errors->booking->first('no_of_lessons')}}</span>
                        </div>
                    </div>
                    <span class="title error_msg error" style="color: red;" id="unique_error"></span>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="btn-save" title="Submit">Submit

                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" aria-hidden="true" title="Cancel">Cancel</button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade title-edit" id="editajax-crud-modal" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Edit booking</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <i aria-hidden="true" class="ki ki-close"></i>

                </button>

            </div>

            <form action="{{route('admin-offline-booking-update')}}" method="post" id="subjectForm" name="userForm" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="main_id_edit" id="main_id_edit">

                <div class="modal-body">

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Student Name <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker validate_field" name="sname_edit" id="sname_edit" data-msg="Student Name" aria-label="select" data-live-search="true">
                                <option value="">Select Student</option>
                                @foreach($studentList as $key2 => $sval)
                                <?php
                                $snam=trim($sval->student_name);
                                ?>
                                <option value="{{$snam}}">{{$snam}}</option>
                                @endforeach
                            </select>
                            <span class="title error_msg error" style="color: red;" id="name_error_edit">{{ $errors->booking_edit->first('sname_edit')}}</span>

                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Tutor <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="tutor_name_edit" id="tutor_name_edit">

                                <option value="">Select Tutor</option>

                                @foreach($tutorData as $val)
                                <option value="{{$val->id}}">{{$val->first_name}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="tutor_name_error_edit">{{ $errors->booking_edit->first('tutor_name_edit')}}</span>

                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Subject <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="main_subject_edit" id="main_subject_edit">

                                <option value="">Select Subject</option>

                                @foreach($subject as $val)
                                <option value="{{$val->id}}">{{$val->main_title}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="subject_error_edit">{{ $errors->booking_edit->first('main_subject_edit')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Level <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="level_edit" id="level_edit">

                                <option value="">Select Level</option>

                                @foreach($level as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="level_error_edit">{{ $errors->booking_edit->first('level_edit')}}</span>

                        </div>

                    </div>
                    @php $daysArr = [ 'Monday' =>'monday',
                    'Tuesday' => 'tuesday',
                    'Wednesday' => 'wednesday',
                    'Thursday' => 'thursday',
                    'Friday' => 'friday',
                    'Saturday' => 'saturday',
                    'Sunday' => 'sunday'] @endphp
                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Day <span class="text-danger">*</span></label>

                            <select class="form-control validate_field main_subject" name="day_edit" id="day_edit">

                                <option value="">Select Day</option>

                                @foreach($daysArr as $key=>$val)
                                <option value="{{$val}}">
                                    {{$key}}
                                </option>
                                @endforeach

                            </select>

                            <span class="title error_msg error" style="color: red;" id="day_error_edit">{{ $errors->booking_edit->first('level_edit')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Idel Time <span class="text-danger">*</span></label>

                            <input type="text" class="form-control" name="idel_time_edit" id="idel_time_edit">


                            <span class="idel_time error_msg error" style="color: red;" id="idel_time_error_edit">{{ $errors->booking_edit->first('idel_time_edit')}}</span>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Email</label>

                            <input type="text" class="form-control" name="email_edit" id="email_edit">


                            <span class="idel_time error_msg error" style="color: red;" id="email_error_edit"></span>

                        </div>

                    </div>
                    <div class="form-group row" id="edit-lessons" style="display:none;">
                        <div class="col-md-12">
                            <label for="exampleSelectd">No of Lessons <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="no_of_lessons_edit" id="no_of_lessons_edit">
                            <span class="idel_time error_msg error" style="color: red;" id="no_of_lessons_edit_error">{{ $errors->booking_edit->first('no_of_lessons')}}</span>
                        </div>
                    </div>
                    <span class="idel_time error_msg error" style="color: red;" id="unique_error_edit"></span>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" id="btn-update" title="Submit">Update

                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" aria-hidden="true" title="Cancel">Cancel</button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@section('page-js')


<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.9') }}"></script>

<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    }
    $('#idel_time').timepicker({
        defaultTIme: false
    });
    $('#idel_time_edit').timepicker({
        defaultTIme: false
    });
    var _AJAX_LIST = "{{ route('offline-bookings-ajax') }}";

    function ajaxList(page) {

        var name = $('#name').val();
        var tutorName = $('#tname').val();
        var subjectName = $('#sname').val();
        var level = $('#level').val();
        var day = $('#day').val();

        $('.ki-close').click();

        $.ajax({

            type: "GET",

            url: _AJAX_LIST,

            data: {
                'name': name,
                'tutorName': tutorName,
                'subjectName': subjectName,
                'level': level,
                'day': day,
                'page': page
            },

            success: function(res) {

                $('#response_id').html("");

                $('#response_id').html(res);

            }

        })

    }

    ajaxList(1);

    $('body').on('click', '.pagination a', function(event) {

        $('li').removeClass('active');

        $(this).parent('li').addClass('active');

        event.preventDefault();

        var myurl = $(this).attr('href');

        var page = $(this).attr('href').split('page=')[1];

        ajaxList(page);

    });

    $('#btn-save').click(function(e) {
        var name = $('#main_subject').val();
        var studentName = $('#student_name').val();
        var tutorName = $('#tutor_name').val();
        var level = $('#add_level').val();
        var day = $('#add_day').val();
        var idelTime = $('#idel_time').val();
        var email = $("#email").val();
        var noLessons = $("#no_of_lessons").val();
        var cnt = 0;
        $('#name_error').html("");
        $('#subject_error').html("");
        $('#tutor_name_error').html("");
        $('#level_error').html("");
        $('#day_error').html("");
        $('#idel_time_error').html("");
        $('#email_error').html("");
        $('#no_of_lessons_error').html("");
        if (studentName == '') {
            $('#name_error').html("Student Name is required");
            cnt = 1;
        }
        if (name == '') {
            $('#subject_error').html("Subject is required");
            cnt = 1;
        }
        if (level == '') {
            $('#level_error').html("Level is required");
            cnt = 1;
        }
        if (tutorName == '') {
            $('#tutor_name_error').html("Tutor is required");
            cnt = 1;
        }
        if (day == '') {
            $('#day_error').html("Day is required");
            cnt = 1;
        }
        if (idelTime == '') {
            $('#idel_time_error').html("Idel Time is required");
            cnt = 1;
        }
        if (!ValidateEmail(email) && email != "") {
            $('#email_error').html("Please enter valid Email");
            cnt = 1;
        }
        if (noLessons == '') {
            $('#no_of_lessons_error').html("No of lessons is required");
            cnt = 1;
        }
        if (idelTime != "" && day != "" && level != "" && name != "") {

            $.ajax({
                url: "{{ url('check-unique-entry') }}",
                type: "GET",
                async: false,
                global: false,
                data: {
                    "subjectname": name,
                    "day": day,
                    "level": level,
                    "ideltime": idelTime,
                    "tutorid": tutorName
                },
                success: function(res) {
                    if (res.status == 1) {
                        $('#unique_error').html("Slot not available.");
                        cnt = 1;
                    }
                }
            });
        }
        if (cnt == 1) {
            return false;
        } else {
            $('#offlineBookingForm').submit();
        }
    })

    $('#btn-update').click(function(e) {
        var name = $('#main_subject_edit').val();
        var studentName = $('#sname_edit').val();
        var level = $('#level_edit').val();
        var day = $('#day_edit').val();
        var idelTime = $('#idel_time_edit').val();
        var email = $('#email_edit').val();
        var tutorName = $('#tutor_name_edit').val();
        var cnt = 0;
        var checkCls= $("#edit-lessons").hasClass('active');
        $('#name_error_edit').html("");
        $('#subject_error_edit').html("");
        $('#level_error_edit').html("");
        $('#day_error_edit').html("");
        $('#idel_time_error_edit').html("");
        $('#tutor_name_error_edit').html("");
        if (studentName == '') {
            $('#name_error_edit').html("Student Name is required");
            cnt = 1;
        }
        if (name == '') {
            $('#subject_error_edit').html("Subject is required");
            cnt = 1;
        }
        if (level == '') {
            $('#level_error_edit').html("Level is required");
            cnt = 1;
        }
        if (day == '') {
            $('#day_error_edit').html("Day is required");
            cnt = 1;
        }
        if (idelTime == '') {
            $('#idel_time_error_edit').html("Ideltime is required");
            cnt = 1;
        }
        if (tutorName == '') {
            $('#tutor_name_error_edit').html("Tutor is required");
            cnt = 1;
        }
        if (!ValidateEmail(email) && email != "") {
            $('#email_error_edit').html("Please enter valid Email");
            cnt = 1;
        }
        if (checkCls == true){
            var noLessons = $("#no_of_lessons_edit").val(); 
            if (noLessons == '') {
                $('#no_of_lessons_edit_error').html("No of lessons is required");
                cnt = 1;
            }
        }
        if (idelTime != "" && day != "" && level != "" && name != "") {
            var id = $('#main_id_edit').val();
            var tutorId = $('#tutor_name_edit').val();
            $.ajax({
                url: "{{ url('check-unique-entry') }}",
                type: "GET",
                async: false,
                global: false,
                data: {
                    "subjectname": name,
                    "day": day,
                    "level": level,
                    "ideltime": idelTime,
                    "tutorid": tutorId,
                    "id": id
                },
                success: function(res) {
                    if (res.status == 1) {
                        $('#unique_error_edit').html("Slot not available.");
                        cnt = 1;
                    }
                }
            });
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }
    })

    function editDetail(id) {
        $('#unique_error_edit').html("");
        var currentDate = moment(new Date()).format("YYYY-MM-DD");
        var dataId = $("#edit_"+id).attr('data-id');
        if (id != "") {
            $('#editajax-crud-modal').modal('show');
            $.ajax({
                url: "{{ url('offline-booking-edit') }}/" + id,
                data: {"dataId": dataId},
                type: "GET",
                success: function(res) {
                    var val = JSON.parse(res);
                    $("#main_subject_edit").find("option[value=" + val.bookingDetails.subject_id + "]").attr('selected', true);
                    $("#level_edit").find("option[value=" + val.bookingDetails.level_id + "]").attr('selected', true);
                    $("#day_edit").find("option[value=" + val.bookingDetails.tuition_day + "]").attr('selected', true);
                    $("#tutor_name_edit").find("option[value=" + val.bookingDetails.tutor_id + "]").attr('selected', true);
                    $("#sname_edit").val(val.bookingDetails.userName).change();
                    // $("#sname_edit").val(val.bookingDetails.userName);
                    $("#email_edit").val(val.bookingDetails.userEmail);
                    $("#main_id_edit").val(val.bookingDetails.id);
                    $("#idel_time_edit").val(val.bookingDetails.teaching_start_time);
                    if(val.bookingDate != null){
                        var dateVal = val.bookingDate.booking_date;
                        if(val.bookingDate.booking_date <= currentDate){
                            $('#edit-lessons').show();
                            $('#edit-lessons').addClass('active');
                        }
                        else{
                            $('#edit-lessons').hide();
                            $('#edit-lessons').removeClass('active');
                        }
                    }
                }
            });

        }
    }

    function deleteDetail(id) {
        $.confirm({
            title: 'Are you sure?',
            columnClass: "col-md-6",
            content: "you want to delete this Booking?",
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            method: "POST",
                            url: "{{ url('offline-booking-delete') }}/" + id,
                            data: {
                                '_token': "{{csrf_token()}}",
                                '_method': "POST",
                                'id': id
                            }
                        }).done(function(r) {
                            toastr.success(r.error_msg);
                            location.reload();

                        }).fail(function() {
                            toastr.error('Sorry, something went wrong. Please try again.');
                        });
                    }
                },
                cancel: function() {
                    //close

                },
            },
            onContentReady: function() {}
        });
    }
</script>

<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');

        var end = moment();

        $('#kt_daterangepicker_3').daterangepicker({

            buttonClasses: ' btn',

            applyClass: 'btn-primary',

            cancelClass: 'btn-secondary',

            startDate: start,

            endDate: end,

            ranges: {

                'Today': [moment(), moment()],

                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

                'Last 7 Days': [moment().subtract(6, 'days'), moment()],

                'Last 30 Days': [moment().subtract(29, 'days'), moment()],

                'This Month': [moment().startOf('month'), moment().endOf('month')],

                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            }

        }, function(start, end, label) {

            $('#kt_daterangepicker_3 .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));

        });

    })
    $('.clear').click(function(e) {
        $('#name').val("");
        $('#tname').val("");
        $('#sname').val("");
        $('#level').val("");
        $('#day').val("");
        ajaxList(1);
    })

    $('.search_id').click(function(e) {
        ajaxList(1);
    });

    $(document).ready(function() {
        <?php if (Request::get('addpopup') == '1') { ?>
            $("#ajax-crud-modal").modal('show');
        <?php } ?>
        <?php if (Request::get('editpopup') == '1') { ?>
            var edit = <?php echo Request::get('id'); ?>;
            $.ajax({
                async: false,
                global: false,
                url: "{{ url('offline-booking-edit') }}/" + edit,
                type: "GET",
                success: function(response) {
                    var val = JSON.parse(response);
                    $("#main_subject_edit").find("option[value=" + val.subject_id + "]").attr('selected', true);
                    $("#level_edit").find("option[value=" + val.level_id + "]").attr('selected', true);
                    $("#day_edit").find("option[value=" + val.tuition_day + "]").attr('selected', true);
                    $("#tutor_name_edit").find("option[value=" + val.bookingDetails.tutor_id + "]").attr('selected', true);
                    $("#sname_edit").val(val.userName).change();
                    // $("#sname_edit").val(val.userName);
                    $("#email_edit").val(val.userEmail);
                    $("#idel_time_edit").val(val.teaching_start_time);
                }
            });
            $('#editajax-crud-modal').modal('show');
        <?php } ?>
    });
</script>

@endsection
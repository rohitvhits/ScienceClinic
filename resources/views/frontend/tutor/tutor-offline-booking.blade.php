@extends('layouts.master')
<link href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css
" rel="stylesheet">
<link href="{{ asset('assets/plugins/custom/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
@section('title', 'New Booking')
@section('content')
<style>
    .modal-open .bootstrap-timepicker-meridian {
        width: 38px;
    }

    .custom-table-td tr td {
        font-size: 13px;
    }
</style>
<div class="d-flex flex-column-fluid">



    <div class="container-fluid">



        <div class="d-flex flex-row">



            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">New Booking</h3>
                        </div>

                        <div class="card-toolbar">

                            <!--begin::Dropdown-->
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

                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-pills personaltab-ul" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="personal-info-tab" data-toggle="pill" href="javascript:void(0)" onclick="window.location.href='tutor-bookings'" role="tab" aria-controls="pills-home" aria-selected="true">My Bookings</a>
                            </li>
                            <li class="nav-item active" role="presentation">
                                <a class="nav-link" id="payment-tab" data-toggle="pill" role="tab" aria-controls="pills-home" href="javascript:void(0)" onclick="window.location.href='tutor-availability'" role="tab" aria-selected="true">My Availability</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="payment-tab" data-toggle="pill" href="javascript:void(0)" onclick="window.location.href='tutor-missed-lessons'" role="tab" aria-controls="pills-home" aria-selected="true">Missed Lessons</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="payment-tab" data-toggle="pill" href="javascript:void(0)" role="tab" aria-controls="pills-home" aria-selected="true">New Booking</a>
                            </li>
                            <input type="hidden" value="{{Auth::user()->id}}" id="tutor_id">
                        </ul>

                        <div class="tab-pane fade show active" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <div class="prime-container">
                                <h3>New Booking</h3>
                            </div>
                        </div>
                        <div class="table-responsive" id="response_id">
                        </div>
                    </div>


                </div>

            </div>

        </div>


    </div>
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

            <form action="{{route('offline-booking-store')}}" method="post" id="subjectformsave" name="userForm" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Student Name <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" required name="sname" aria-label="Default select example" data-live-search="true" id="sname">
                                <option value="">Select Student</option>
                                @foreach($parentslist as $key => $sval)
                                    <option value="{{$sval->id.'_'.$sval->student_name}}">{{$sval->student_name}}</option>
                                @endforeach
                            </select>
                            <span class="title error_msg error" style="color: red;" id="name_error">{{ $errors->booking->first('sname')}}</span>

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

                            <select class="form-control validate_field main_subject" name="level" id="level">

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

                            <select class="form-control validate_field main_subject" name="day" id="day">

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
                    <span class="idel_time error_msg error" style="color: red;" id="uniqueData_error"></span>


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

            <form action="{{route('offline-booking-update')}}" method="post" id="subjectForm" name="userForm" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="main_id_edit" id="main_id_edit">

                <div class="modal-body">

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label for="exampleSelectd">Student Name <span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" class="form-control" name="sname_edit" id="sname_edit">
                            <span class="title error_msg error" style="color: red;" id="name_error_edit">{{ $errors->booking_edit->first('sname_edit')}}</span>

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

                    <button type="button" class="btn btn-primary" id="btn-update" title="Submit">Update

                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" aria-hidden="true" title="Cancel">Cancel</button>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
@section('page-js')
<script src="{{asset('assets/plugins/custom/timepicker/bootstrap-timepicker.js')}}"></script>
<script>
    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    }
    var _AJAX_LIST = "{{ route('tutor-offline-subject-ajax') }}";

    function ajaxList(page) {
        $('.ki-close').click();
        $.ajax({
            type: "GET",
            url: _AJAX_LIST,
            data: {
                'page': page,
            },
            success: function(res) {
                $('#response_id').html("");
                $('#response_id').html(res);
            }

        })
    }
    $('#idel_time').timepicker({
        defaultTIme: false
    });
    $('#idel_time_edit').timepicker({
        defaultTIme: false
    });
    ajaxList(1);
    $('#btn-save').click(function(e) {
        var name = $('#main_subject').val();
        var studentName = $('#sname').val();
        var level = $('#level').val();
        var day = $('#day').val();
        var idelTime = $('#idel_time').val();
        var email = $("#email").val();
        var noLessons = $("#no_of_lessons").val();
        var cnt = 0;
        $('#name_error').html("");
        $('#subject_error').html("");
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
        if (day == '') {
            $('#day_error').html("Day is required");
            cnt = 1;
        }
        if (idelTime == '') {
            $('#idel_time_error').html("Ideltime is required");
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
                url: "{{ url('check-unique') }}",
                type: "GET",
                async: false,
                global: false,
                data: {
                    "subjectname": name,
                    "day": day,
                    "level": level,
                    "ideltime": idelTime,
                },
                success: function(res) {
                    if (res.status == 1) {
                        $('#uniqueData_error').html("Slot not available.");
                        cnt = 1;
                    }
                }
            });
        }
        if (cnt == 1) {
            return false;
        } else {
            $('#subjectformsave').submit();
            return true;
        }
    })

    $('#btn-update').click(function(e) {
        var name = $('#main_subject_edit').val();
        var studentName = $('#sname_edit').val();
        var level = $('#level_edit').val();
        var day = $('#day_edit').val();
        var idelTime = $('#idel_time_edit').val();
        var email = $('#email_edit').val();
        var cnt = 0;
        var checkCls= $("#edit-lessons").hasClass('active');
        $('#name_error_edit').html("");
        $('#subject_error_edit').html("");
        $('#level_error_edit').html("");
        $('#day_error_edit').html("");
        $('#idel_time_error_edit').html("");
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
        if (cnt == 1) {
            return false;
        } else {
            $('#subjectForm').submit();
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
                url: "{{ url('tutor-offline-booking-edit') }}/" + id,
                data: {"dataId": dataId},
                type: "GET",
                success: function(res) {
                    var val = JSON.parse(res);
                    $("#main_subject_edit").find("option[value=" + val.bookingDetails.subject_id + "]").attr('selected', true);
                    $("#level_edit").find("option[value=" + val.bookingDetails.level_id + "]").attr('selected', true);
                    $("#day_edit").find("option[value=" + val.bookingDetails.tuition_day + "]").attr('selected', true);
                    $("#sname_edit").val(val.bookingDetails.userName);
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
                            url: "{{ url('tutor-offline-booking-delete') }}/" + id,
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
    function attendOfflineClass(id){
        $.confirm({
            title: 'Are you sure?',
            columnClass: "col-md-6",
            content: "you want to attend this Booking?",
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            method: "POST",
                            url: "{{ url('tutor-offline-booking-attend') }}/" + id,
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

    $(document).ready(function() {
        <?php if (Request::get('addpopup') == '1') { ?>
            $("#ajax-crud-modal").modal('show');
        <?php } ?>
        <?php if (Request::get('editpopup') == '1') { ?>
            var edit = <?php echo Request::get('id'); ?>;
            $.ajax({
                async: false,
                global: false,
                url: "{{ url('tutor-offline-booking-edit') }}/" + edit,
                type: "GET",
                success: function(response) {
                    var val = JSON.parse(response);
                    $("#main_subject_edit").find("option[value=" + val.subject_id + "]").attr('selected', true);
                    $("#level_edit").find("option[value=" + val.level_id + "]").attr('selected', true);
                    $("#day_edit").find("option[value=" + val.tuition_day + "]").attr('selected', true);
                    $("#sname_edit").val(val.userName);
                    $("#email_edit").val(val.userEmail);
                    $("#idel_time_edit").val(val.teaching_start_time);
                }
            });
            $('#editajax-crud-modal').modal('show');
        <?php } ?>
    });

    $('body').on('click', '.pagination a', function(event) {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        ajaxList(page);
    });
</script>
@endsection
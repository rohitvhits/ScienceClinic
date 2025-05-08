@extends('layouts.master')
@section('title', 'Centre Time Table')
@section('content')
@section('page-css')
<link href="{{ asset('assets/plugins/custom/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('front/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fullcalender-css/main.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-awesome/all.min.css')}}" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body {
        background: #EEF0F8;
    }

    .jconfirm.jconfirm-white .jconfirm-box .jconfirm-buttons button.btn-default,
    .jconfirm.jconfirm-light .jconfirm-box .jconfirm-buttons button.btn-default {
        background: #0f7dc2 !important;
        color: #fff !important;
    }
</style>
@endsection

<div class="d-flex flex-column-fluid">



    <div class="container-fluid">



        <div class="d-flex flex-row">



            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Centre Time Table</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="prime-container">
                            <div class="main-custom-calendar">
                                <div id="calendar-new"></div>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
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
<span id="monthlist_id" style="display:none">
    <option value="">Select Month</option>
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</span>
<span id="ctlist_id" style="display:none">
    <option value="">Select Teacher</option>
    @foreach ($teacher_list as $val)
    <option value="{{ $val->id }}">{{ $val->first_name }}</option>
    @endforeach
</span>
<span id="cslist_id" style="display:none">
    <option value="">Select Student</option>
    @foreach ($student_list as $val)
    <option value="{{ $val->id }}">{{ $val->student_name }}</option>
    @endforeach
</span>
@endsection
@section('page-js')
<script src="{{asset('assets/js/fullcalender-js/main.min.js')}}"></script>
<script src="{{asset('assets/js/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js')}}"></script>
<script src="{{asset('assets/js/font-awesome/all.min.js')}}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/Modulejs/textbooks.js')}}"></script>
<script src="{{asset('assets/plugins/custom/timepicker/bootstrap-timepicker.js')}}"></script>
<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function pad(numb) {
        return (numb < 10 ? '0' : '') + numb;
    }
    document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = $('#dropdowns_id').html();
        var level_id = $('#tutor_level_id').html();
        var monthlist = $('#monthlist_id').html();
        var tdropdowns = $('#ctlist_id').html();
        var sdropdowns = $('#cslist_id').html();
        var mathRandSubject = Math.floor(100000000 + Math.random() * 900000000);
        var calendarElNew = document.getElementById('calendar-new');
        var calendarNew = new FullCalendar.Calendar(calendarElNew, {
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },
            contentHeight: "auto",
            selectable: true,
            editable: true,
            initialView: 'timeGridWeek',
            slotDuration: '00:30',
            displayEventTime: false,
            allDaySlot: false,
            slotMinTime: "9:00:00",
            slotMaxTime: "22:00:00",
            dateClick: function(info, callback) {
                $.confirm({
                    title: 'Are You Sure ?',
                    content: 'Are you available to teach during this time?',
                    buttons: {
                        confirm: function() {
                            $.confirm({
                                title: '',
                                content: '' +
                                    '<form action="" class="formName">' +
                                        '<div class="form-group">' +
                                            '<label>Enter Teacher <span class="text-danger">*</span></label>' +
                                            '<select class="form-control" id="teacher_name" name="teacher_name">' + tdropdowns + '</select>' +
                                            '<span class="text-danger" id="error_teacher_name"></span>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Enter Subject <span class="text-danger">*</span></label>' +
                                            '<select class="form-control" id="subject_name" name="subject_name">' + dropdowns + '</select>' +
                                            '<span class="text-danger" id="error_subject_name"></span>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Enter Level <span class="text-danger">*</span></label>' +
                                            '<select class="form-control" name="level" id="level">' + level_id + '</select>' +
                                            '<span class="text-danger" id="error_level"></span>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Enter Month <span class="text-danger">*</span></label>' +
                                            '<select name="month" id="month" class="form-control" required>'+monthlist+'</select>' +
                                            '<span class="text-danger" id="error_month"></span>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Enter Student <span class="text-danger">*</span></label>' +
                                            '<select class="form-control" id="student" name="student">' + sdropdowns + '</select>' +
                                            '<span class="text-danger" id="error_student"></span>' +
                                        '</div>' +
                                    '</form>',
                                buttons: {
                                    formSubmit: {
                                        text: 'Submit',
                                        btnClass: 'btn-blue',
                                        action: function() {
                                            var teacher_name = $("#teacher_name").val();
                                            var subject_name = $("#subject_name").val();
                                            var level = $("#level").val();
                                            var month = $("#month").val();
                                            var student = $("#student").val();
                                            var temp = 0;
                                            $('#error_teacher_name').html("");
                                            $('#error_subject_name').html("");
                                            $('#error_level').html("");
                                            $('#error_month').html("");
                                            $('#error_student').html("");
                                            if (teacher_name.trim() == '') {
                                                $('#error_teacher_name').html("Please enter Teacher Name");
                                                temp++;
                                            }
                                            if (subject_name.trim() == '') {
                                                $('#error_subject_name').html("Please enter Subject Name");
                                                temp++;
                                            }
                                            if (level.trim() == '') {
                                                $('#error_level').html("Please enter Level");
                                                temp++;
                                            }
                                            if (month.trim() == '') {
                                                $('#error_month').html("Please enter Month");
                                                temp++;
                                            }
                                            if (student.trim() == '') {
                                                $('#error_student').html("Please enter Student Name");
                                                temp++;
                                            }
                                            if (temp == 0) {
                                                $.ajax({
                                                    url: "{{route('add-center-timetable')}}",
                                                    type: 'POST',
                                                    data: {
                                                        date: info.dateStr,
                                                        teacher_name: teacher_name,
                                                        subject_name: subject_name,
                                                        level: level,
                                                        month: month,
                                                        student: student
                                                    },
                                                    success: function(result) {
                                                        var allData = result.data.original;
                                                        toastr.success(result.error_msg);
                                                        var data = result.data.original;
                                                        calendarNew.refetchEvents();
                                                    }
                                                });
                                            } else {
                                                return false;
                                            }
                                        }
                                    },
                                    cancel: function() {

                                    },
                                },
                            });
                        },
                        cancel: function() {},
                    }
                });
            },
            /*
            eventContent: {
                html: '<a><i class="fa fa-check"></i></a>'
            },
            */
            eventClick: function(info) {
                var id = info.event.id;
                var time = info.event.time;
                checkBookSlot(id);
            },
            events: function(fetchInfo, callback) {
                var events = [];
                $.ajax({
                    url: "{{route('get-center-timetable')}}",
                    type: 'get',
                    success: function(result) {
                        if (!!result) {
                            var sunDate = fetchInfo.start;
                            var tsdY = pad(sunDate.getFullYear());
                            var tsdM = pad(sunDate.getMonth()+1);
                            var tsdD = pad(sunDate.getDate());
                            var tsd=tsdY+'-'+tsdM+'-'+tsdD;
                            var bookedlist = [];
                            $.map(result, function(r) {
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
                                var eventTitle = r.teacher_name+', '+r.subjectName+', '+r.student_name;
                                var cusCheck=r.day_of_tution+'_'+timeslot[0];
                                if(jQuery.inArray(cusCheck, bookedlist) !== -1)
                                {
                                }
                                else
                                {
                                    events.push({
                                        id: r.id,
                                        title: eventTitle,
                                        start: tsd2 + ' ' + timeslot[0],
                                        end: tsd2 + ' ' + timeslot[1],
                                        time: r.tuition_time,
                                        htmlTitle: true,
                                        "textColor": "#fff"
                                    });
                                }
                            });
                        }
                        callback(events);
                    }
                })
            },
        });

        calendarNew.render();
    });

    function checkBookSlot(id) {
        $.ajax({
            url: "{{route('get-booked-timetable')}}",
            type: 'get',
            data: {
                id: id
            },
            success: function(result) {
                if (result == 1) {
                    $.confirm({
                        title: 'Alert',
                        content: 'Booking Already Exists',
                        buttons: {
                            cancel: function() {},
                        }
                    });
                } else {
                    $.confirm({
                        title: 'Are You Sure ?',
                        content: 'Are you want to delete this slot?',
                        buttons: {
                            confirm: function() {
                                $.ajax({
                                    url: "{{route('delete-center-timetable')}}",
                                    type: 'POST',
                                    data: {
                                        id: id
                                    },
                                    success: function(result) {
                                        if(result.status == 1){
                                            toastr.success(result.success_message);
                                            location.reload();
                                        }
                                        else{
                                            toastr.error(result.error_message);
                                        }
                                    }
                                });
                            },
                            cancel: function() {},
                        }
                    });
                }
            }
        })
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
</script>
@endsection
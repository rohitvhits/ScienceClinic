@extends('layouts.master')
@section('title', 'Bookings')
@section('content')
@section('page-css')
<link rel="stylesheet" href="{{asset('front/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fullcalender-css/main.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-awesome/all.min.css')}}" crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body {
        background: #EEF0F8;
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
                            <h3 class="card-label font-weight-bolder text-dark">Schedule Lessons</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-pills personaltab-ul" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="personal-info-tab" data-toggle="pill" href="#personal-info" role="tab" aria-controls="pills-home" aria-selected="true">My Bookings</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="payment-tab" data-toggle="pill" href="javascript:void(0)" onclick="window.location.href='tutor-availability'" role="tab" aria-controls="pills-home" aria-selected="true">My Availability</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="payment-tab" data-toggle="pill" href="javascript:void(0)" onclick="window.location.href='tutor-missed-lessons'" role="tab" aria-controls="pills-home" aria-selected="true">Missed Lessons</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="payment-tab" data-toggle="pill" href="javascript:void(0)" role="tab" onclick="window.location.href='tutor-offline-booking'" aria-controls="pills-home" aria-selected="true">New Booking</a>
                            </li>
                            <input type="hidden" value="{{Auth::user()->id}}" id="tutor_id">
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                <div class="prime-container">
                                    <h3>My Bookings</h3>
                                    <br></br>
                                    <div class="main-custom-calendar">
                                        <div id="calendar"></div>

                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>

            </div>


        </div>



    </div>



</div>


@endsection
@section('page-js')
<script src="{{asset('assets/js/fullcalender-js/main.min.js')}}"></script>
<script src="{{asset('assets/js/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js')}}"></script>
<script src="{{asset('assets/js/font-awesome/all.min.js')}}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        var calendar;
        var calendarEl = document.getElementById('calendar');
        var tutorId = $('#tutor_id').val();
        var events = [];

        calendar = new FullCalendar.Calendar(calendarEl, {

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
            displayEventTime: true,
            allDaySlot: false,
            html: true,
            slotMinTime: "9:00:00",
	        slotMaxTime: "22:00:00",
            events: function(fetchInfo, callback) {
                var events = [];
                $.ajax({
                    url: "{{route('get-tutor-bookings')}}",
                    type: 'get',
                    success: function(result) {
                        var sunDate = fetchInfo.start;
                        var tsdY = pad(sunDate.getFullYear());
                        var tsdM = pad(sunDate.getMonth()+1);
                        var tsdD = pad(sunDate.getDate());
                        var tsd=tsdY+'-'+tsdM+'-'+tsdD;
                        if (!!result) {
                            var bookedlist = [];
                            $.map(result.online, function(r) {
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
                                var d = new Date();
                                var month = d.getMonth() + 1;
                                var day = d.getDate();
                                var output = d.getFullYear() + '-' +
                                    (('' + month).length < 2 ? '0' : '') + month + '-' +
                                    (('' + day).length < 2 ? '0' : '') + day;
                                var timeslot = r.tution_time.split('-');
                                //if (r.inquiry_type == "1") {
                                   // if(r.user_details){
                                        var eventTitle = r.student_name+'\n'+r.tution_time;
                                        var eventTitle = r.student_name;
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
                                                bookingType: 'online',
                                                backgroundColor: '#727272',
                                                borderColor: '#727272'
                                            });
                                        }
                                 /*   }
                                } else {
                                    var eventTitle = r.user_name + "\r" + r.subject_details.main_title;
                                    events.push({
                                        id: r.id,
                                        title: eventTitle,
                                        start: r.booking_date + ' ' + r.teaching_start_time,
                                        end: r.booking_date + ' ' + r.teaching_end_time,
                                        time: r.tuition_time,
                                        backgroundColor: '#727272',
                                        borderColor: '#727272',
                                        inquiry_type: r.inquiry_type
                                    })
                                }*/
                            });
                            $.map(result.offline, function(r) {
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
                                var d = new Date();
                                var month = d.getMonth() + 1;
                                var day = d.getDate();
                                var output = d.getFullYear() + '-' +
                                    (('' + month).length < 2 ? '0' : '') + month + '-' +
                                    (('' + day).length < 2 ? '0' : '') + day;
                                var eventTitle = r.userName;

                                var oldDate = new Date(r.booking_date+' '+r.teaching_start_time);
                                var hour = oldDate.getHours();
                                var newDate = oldDate.setHours(hour + 1);
                                var newDate = new Date(newDate);
                                var etH = pad(newDate.getHours());
                                var etM = pad(newDate.getMinutes());
                                var etS = pad(newDate.getSeconds());
                                var et=etH+':'+etM+':'+etS;

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
                                        bookingType: 'offline',
                                        backgroundColor: '#727272',
                                        borderColor: '#727272'
                                    });
                                }
                            });
                        }
                        callback(events);
                    }
                })
            },
            eventClick: function(info) {
                var userId = info.event.id;
                var setTime = info.event.extendedProps.time;
                var btyp = info.event.extendedProps.bookingType;
                checkBookSlot(userId, btyp);
                if(info.event.extendedProps.inquiry_type == 1){
                    // window.location.href = '{{url("/show-bookslot-data/")}}' + '/' + userId + '/' + setTime;
                }
            },
        });
        calendar.render();

    });

    function checkBookSlot(id, typ) {
        $.confirm({
            title: 'Are You Sure ?',
            content: 'Are you want to delete this slot?',
            buttons: {
                confirm: function() {
                    $.ajax({
                        url: "{{route('delete-booking-slot')}}",
                        type: 'POST',
                        data: {
                            id: id,
                            typ: typ
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
@extends('layouts.master')
@section('title', 'Parent Details')
<link href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css
" rel="stylesheet">
<link href="{{ asset('assets/plugins/custom/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<style>
    .bootstrap-timepicker-widget table td input {
        width: 33px !important;
    }

    .table {
        font-size: 13px !important;
    }
</style>
@section('content')
<div class="d-flex flex-column-fluid">

    <!--begin::Container-->

    <div class="container-fluid">

        <!--begin::Subject List-->

        <div class="d-flex flex-row">

            <!--begin::Content-->

            <div class="flex-row-fluid" id="personam_id">



                <!--begin::Header-->

                <div class="card card-custom gutter-b">

                    <div class="card-header">

                        <div class="card-title">

                            <span class="nav-profile-name">Parent Details</span>



                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">

                            <div class="col-lg-4">

                                <div class="d-flex mb-4">

                                    <strong>First Name:</strong>
                                    <span class="ml-1">{{$parentData->first_name}}</span>

                                </div>

                            </div>
                            <div class="col-lg-4">

                                <div class="d-flex mb-4">

                                    <strong>Last Name: </strong>
                                    <span class="ml-1">{{$parentData->last_name}}</span>

                                </div>

                            </div>


                            <div class="col-lg-4">

                                <div class="d-flex mb-4">

                                    <strong>Address1: </strong>
                                    <span class="ml-1">{{$parentData->address1}}</span>
                                </div>

                            </div>
                            @if($parentData->status == "Accepted")
                            <div class="col-lg-4">

                                <div class="d-flex mb-4">

                                    <strong>Email : </strong>
                                    <span class="ml-1">{{$parentData->email}}</span>

                                </div>

                            </div>
                            <div class="col-lg-4">

                                <div class="d-flex mb-4">

                                    <strong>Phone : </strong>
                                    <span class="ml-1">{{$parentData->mobile_id}}</span>

                                </div>

                            </div>
                            @endif



                        </div>

                    </div>

                </div>



                <!--begin::Header-->

                <div class="card card-custom">

                    <div class="card-header">

                        <div class="card-title tutor">

                            <span class="nav-profile-name">Subject List</span>
                            <!-- <ul class="nav nav-pills nav-fill">

                                <li class="nav-item">

                                    <a class="nav-link active" onclick="addSubjectList()" href="#subjectlist" data-toggle="tab">
                                        <span class="nav-text">Subject List</span>
                                    </a>

                                </li>
                            </ul> -->

                        </div>

                    </div>
                    <div class="tab-content" id="tabs">

                        <div class="tab-pane active" id="subjectlist">

                            <span id="responsive_id"></span>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script src="{{asset('assets/plugins/custom/timepicker/bootstrap-timepicker.js')}}"></script>
<script>
    $(document).ready(function() {
        addSubjectList();
    });

    function sendPaymentMailTutor(id) {
        $.ajax({
            type: "GET",
            url: "{{ route('send-payment-mail-tutor') }}",
            data: {
                inquiryId: id,
            },
            success: function(res) {
                var result = JSON.parse(res);
                if (result.hourly_rate != null) {
                    sendEmail(id);
                } else {
                    sendNotification(id);
                }
            }

        })
    }

    function sendEmail(id) {
        $.ajax({
            type: "GET",
            url: "{{route('send-booking-mail-tutor')}}",
            data: {
                id: id,
            },
            success: function(res) {
                if (res.status == 1) {
                    $('.book-lesson-' + id).hide();
                    toastr.success(res.error_msg);
                    addSubjectList(1);
                } else {
                    $('.book-lesson-' + id).show();
                    toastr.error(res.error_msg);
                }
            }

        })
    }

    function sendNotification(id) {
        $.ajax({
            type: "GET",
            url: "{{route('send-booking-notification-admin')}}",
            data: {
                id: id,
            },
            success: function(res) {
                if (res.status == 1) {
                    $('.book-lesson-' + id).attr('disabled', true);
                    addSubjectList(1);
                    toastr.success(res.error_msg);
                } else {
                    $('.book-lesson-' + id).attr('disabled', false);
                    toastr.error(res.error_msg);
                }
            }

        })
    }

    function addSubjectList() {
        var parentID = "{{$parentData->id}}";
        $.ajax({

            type: "GET",

            url: "{{ route('parent-subject-details') }}",

            data: {
                parentID: parentID,
            },

            success: function(res) {

                $('#responsive_id').html("");

                $('#responsive_id').html(res);

            }

        })
    }


    function attendClass(id, subjectId, teachingType) {
        $.confirm({
            title: 'Are you sure?',
            columnClass: "col-md-6",
            content: "you want to attend this class?",
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            type: "post",
                            url: "{{ route('attend-lesson-subject') }}",
                            data: {
                                'id': id,
                                'subjectId': subjectId,
                                'teachingType': teachingType,
                                "_token": "{{ csrf_token() }}"
                            },

                            success: function(res) {
                                if (res.status == 1) {
                                    toastr.success(res.error_msg);
                                    addSubjectList(1);
                                } else {
                                    toastr.error(res.error_msg);
                                }
                            }

                        });
                    }
                },
                cancel: function() {},
            },
            onContentReady: function() {}
        });
    }

    function addTeachingHours(id) {
        $.ajax({
            async: false,
            global: false,
            url: "{{ url('get-online-tutoring-data') }}",
            type: "GET",
            success: function(response) {
                var val = JSON.parse(response);
                var html_res = '';
                html_res += '<option value="">Select</option>';
                $.each(val, function(k, v) {
                    html_res += '<option value="' + v.id + '">' + v.online_tutoring_name + '</option>';
                });
                $.confirm({
                    title: 'Add Teaching Hours',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Enter Teaching Hours <span class="text-danger">*</span></label>' +
                        '<input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" maxlength="3" name="teaching_hours" id="teaching_hours" placeholder="Enter Teaching Hours" class="hours form-control number-only" required />' +
                        '<span class="text-danger" id="error_hours"></span>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label>Enter Teaching Start Time <span class="text-danger">*</span></label>' +
                        '<input type="text" name="teaching_start_time" id="teaching_start_time" placeholder="Enter Teaching Start Time" class="form-control" required />' +
                        '<span class="text-danger" id="error_teaching_start_time"></span>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label>Select Teaching Type <span class="text-danger">*</span></label>' +
                        '<select class="form-control validate_field" onchange="addZoomDetails(' + id + ')" name="teching-type" id="teaching_type">' + html_res + '</select>' +
                        '<span class="text-danger" id="error_teaching_type"></span>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label>Enter No. of Lessons <span class="text-danger">*</span></label>' +
                        '<input type="number" name="no_of_lessons" id="no_of_lessons" placeholder="Enter No. Of Lessons" class="form-control numberCls" required />' +
                        '<span class="text-danger" id="error_no_of_lessons"></span>' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function() {
                                var hours = $("#teaching_hours").val();
                                // var hourly_rate = $("#hourly_rate").val();
                                var teaching_start_time = $("#teaching_start_time").val();
                                var teaching_type = $("#teaching_type").val();
                                var noOfLesson = $('#no_of_lessons').val();
                                var tutionTime = $('#desc' + id).html();
                                var time = tutionTime.split('-');
                                var startTime = time[0];
                                var endTime = time[1];
                                var teachingTime = moment(teaching_start_time, "h:mm:ss A").format("HH:mm:ss");
                                var startTimeVal = moment(startTime, "h:mm:ss A").format("HH:mm:ss");
                                var endTimeVal = moment(endTime, "h:mm:ss A").format("HH:mm:ss");
                                var format = 'hh:mm:ss';
                                var time = moment(teachingTime, format),
                                    beforeTime = moment(startTimeVal, format),
                                    afterTime = moment(endTimeVal, format);
                                var minutes = hours.split('.');
                                var temp = 0;
                                $('#error_hours').html("");
                                // $('#error_hourly_rate').html("");
                                $('#error_no_of_lessons').html("");
                                $('#error_teaching_start_time').html("");
                                $('#error_teaching_type').html("");
                                if (hours.trim() == '') {
                                    $('#error_hours').html("Please enter Teaching Hours");
                                    temp++;
                                } else {
                                    if (minutes[1] > 59) {
                                        $('#error_hours').html("Please enter valid Teaching Hours");
                                        temp++;
                                    }
                                }
                                // if (hourly_rate.trim() == '') {
                                //     $('#error_hourly_rate').html("Please enter Hourly Rates");
                                //     temp++;
                                // }
                                if (teaching_start_time.trim() == '') {
                                    $('#error_teaching_start_time').html("Please enter Teaching Start Time");
                                    temp++;
                                } else if ((!time.isBetween(beforeTime, afterTime)) && (!time.isSame(beforeTime)) && (!time.isSame(afterTime))) {
                                    $('#error_teaching_start_time').html("Please enter Teaching Start Time Between " + startTime + " & " + endTime);
                                    temp++;
                                }
                                if (teaching_type == '') {
                                    $('#error_teaching_type').html("Please select Teaching Type");
                                    temp++;
                                }
                                if(noOfLesson.trim() == ''){
                                    $('#error_no_of_lessons').html("Please enter No. of Lessons");
                                    temp++;
                                }
                                if (temp == 0) {
                                    $.ajax({
                                        type: "post",
                                        url: "{{ route('add-teaching-hours') }}",
                                        data: {
                                            'id': id,
                                            'hours': minutes[0],
                                            'minutes': minutes[1],
                                            // 'hourly_rate': hourly_rate,
                                            'teaching_start_time': teaching_start_time,
                                            'no_of_lessons': noOfLesson,
                                            'teaching_type': teaching_type,
                                            "_token": "{{ csrf_token() }}"
                                        },

                                        success: function(res) {
                                            if (res.status == 1) {
                                                toastr.success(res.error_msg);
                                                addSubjectList(1);
                                            } else {
                                                toastr.error(res.error_msg);
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            var tempVal = 0;
                                            if (jqXHR.responseJSON.error_msg.hours[0]) {
                                                $('#error_hours').html(jqXHR.responseJSON.error_msg.hours[0]);
                                                tempVal++;
                                            } else {
                                                $('#error_hours').html('');
                                            }
                                            // if (jqXHR.responseJSON.error_msg.hourly_rate[0]) {
                                            //     $('#error_hourly_rate').html(jqXHR.responseJSON.error_msg.hourly_rate[0]);
                                            //     tempVal++;
                                            // } else {
                                            //     $('#error_hourly_rate').html('');
                                            // }
                                            if (jqXHR.responseJSON.error_msg.teaching_type[0]) {
                                                $('#error_teaching_type').html(jqXHR.responseJSON.error_msg.teaching_type[0]);
                                                tempVal++;
                                            } else {
                                                $('#error_teaching_type').html('');
                                            }
                                            if (tempVal == 1) {
                                                return false;
                                            }
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
                    onContentReady: function() {

                        var jc = this;
                        this.$content.find('form').on('submit', function(e) {

                            e.preventDefault();
                            jc.$$formSubmit.trigger('click');
                        });
                        $('#teaching_start_time').timepicker({
                            defaultTIme: false
                        });
                    }
                });
            }
        });
    }

    function validateLink(link) {
        var expr = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
        return expr.test(link);
    }

    function addZoomDetails(id) {
        var val = $('#teaching_type').val();
        if (val == 1) {
            $.confirm({
                title: 'Add Zoom Details',
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Meeting Id <span class="text-danger">*</span></label>' +
                    '<input type="number" name="meeting_id" id="meeting_id" placeholder="Enter Meeting Id" class="hours form-control number-only" required />' +
                    '<span class="text-danger" id="error_meeting_id"></span>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label>Meeting Url <span class="text-danger">*</span></label>' +
                    '<input type="url" name="meeting_url" autocomplete="off" id="meeting_url" placeholder="Enter Meeting URL" class="hours form-control" required />' +
                    '<span class="text-danger" id="error_meeting_url"></span>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label>Password <span class="text-danger">*</span></label>' +
                    '<input type="password" name="password" id="password" placeholder="Enter Password" class="hours form-control number-only" required />' +
                    '<span class="text-danger" id="error_password"></span>' +
                    '</div>' +
                    '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Submit',
                        btnClass: 'btn-blue',
                        action: function(e) {
                            var meetingId = $("#meeting_id").val();
                            var meetingPassword = $("#password").val();
                            var meetingUrl = $("#meeting_url").val();
                            var tempZoom = 0;
                            $('#error_meeting_id').html("");
                            $('#error_password').html("");
                            if (meetingId.trim() == '') {
                                $('#error_meeting_id').html("Please enter Meeting Id");
                                tempZoom++;
                            }
                            if (meetingUrl.trim() == '') {
                                $('#error_meeting_url').html("Please enter Meeting Url");
                                tempZoom++;
                            } else if(!validateLink(meetingUrl)) {
                                $('#error_meeting_url').html("Please enter valid Meeting Url");
                                tempZoom++;
                            }
                            if (meetingPassword == '') {
                                $('#error_password').html("Please enter Meeting Password");
                                tempZoom++;
                            }
                            if (tempZoom == 0) {
                                $.ajax({
                                    type: "post",
                                    async: false,
                                    url: "{{ route('add-zoom-details') }}",
                                    data: {
                                        'id': id,
                                        'meeting_id': meetingId,
                                        'meeting_url': meetingUrl,
                                        'password': meetingPassword,
                                        "_token": "{{ csrf_token() }}"
                                    },

                                    success: function(res) {
                                        if (res.status == 1) {
                                            toastr.success(res.error_msg);
                                        } else {
                                            toastr.error(res.error_msg);
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        var tempVal = 0;
                                        if (jqXHR.responseJSON.error_msg.meeting_id[0]) {
                                            $('#error_meeting_id').html(jqXHR.responseJSON.error_msg.meeting_id[0]);
                                            tempVal++;
                                        } else {
                                            $('#error_meeting_id').html('');
                                        }
                                        if (jqXHR.responseJSON.error_msg.password[0]) {
                                            $('#error_password').html(jqXHR.responseJSON.error_msg.password[0]);
                                            tempVal++;
                                        } else {
                                            $('#error_password').html('');
                                        }
                                        if (jqXHR.responseJSON.error_msg.meeting_url[0]) {
                                            $('#error_meeting_url').html(jqXHR.responseJSON.error_msg.meeting_url[0]);
                                            tempVal++;
                                        } else {
                                            $('#error_meeting_url').html('');
                                        }
                                        if (tempVal == 1) {
                                            return false;
                                        }
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
                onContentReady: function() {

                    var jc = this;
                    this.$content.find('form').on('submit', function(e) {

                        e.preventDefault();
                        jc.$$formSubmit.trigger('click');
                    });
                }
            });
        }
    }
</script>

@endsection
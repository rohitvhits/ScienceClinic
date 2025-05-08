@extends('layouts.master')
@section('title', 'Tutor Form Master')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css') }}">

<link href="{{asset('assets/css/pages/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('assets/css/pages/bootstrap-datetimepicker/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css">

<style>
    .daterangepicker {

        z-index: 999999 !important;

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

                            <h3 class="card-label font-weight-bolder text-dark">Tutor Form List</h3>

                        </div>

                        <div class="card-toolbar">

                            <!--begin::Dropdown-->

                            <div class="dropdown dropdown-inline mr-2">
                                <button class="btn btn-primary mr-2" onclick="importmodel();">

                                    <span class="svg-icon svg-icon-md import">

                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                <rect x="0" y="0" width="24" height="24"></rect>

                                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>

                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>

                                            </g>

                                        </svg>

                                        <!--end::Svg Icon-->

                                    </span>Import Data</button>
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

                            <!--end::Dropdown-->

                            <!--begin::Button-->

                            <a href="{{route('tutor-form.create')}}" class="btn btn-primary mr-2">

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

                                </span>New Record</a>

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

    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7" kt-hidden-height="47" style="">

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

            <label class="col-4 col-form-label">Tutor Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Tutor Name" type="text" name="tutor_name" id="tutor_name">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Student Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Enter Student Name" type="text" name="student_name" id="student_name">

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

            <label class="col-4 col-form-label">Day Of Tuition</label>

            <div class="col-8">
                <select name="tuition_day" id="tuition_day" class="form-control">
                    <option value="">Please Select Day</option>
                    @foreach($daysArr as $key=>$val)
                    <option value="{{$val}}">
                        {{$key}}
                    </option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Rate</label>

            <div class="col-8">

                <input class="form-control" onkeypress="return isNumber(event)" placeHolder="Enter Rate" type="text" name="rate" id="rate">

            </div>

        </div>
        <div class="form-group row">

            <label class="col-4 col-form-label">Commission</label>

            <div class="col-8">

                <input class="form-control" onkeypress="return isNumber(event)" placeHolder="Enter Commission" type="text" name="commission" id="commission">

            </div>

        </div>
        @php
        $month = array(
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
        );
        @endphp
        <div class="form-group row">

            <label class="col-4 col-form-label">Month</label>

            <div class="col-8">

                <select name="month" id="month" class="form-control">
                    <option value="">Please Select Month</option>
                    @foreach($month as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>

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

@endsection



@section('page-js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function importmodel() {
        $.confirm({
            title: 'Import File',
            content: '' +
                '<form action="" class="formName" id="fileform" enctype="multipart/form-data">' +
                '<div class="form-group">' +
                '<label>Select File</label>' +
                '<input type="file" class="csvFile form-control" name="csvfile" required />' +
                '<span id="csvfile_error" class="text-danger"></span>' +
                '</div>' +
                '<div>' +
                '<a href="{{asset("uploads/csv_format/sample.csv")}}" download>Sample File</a>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var file = $('.csvFile').prop('files');
                        var temp = 0;
                        if (file.length == 0) {
                            $('#csvfile_error').html("Please Select File");
                            temp++;
                        } else {
                            if (file.length != 0) {
                                $('#csvfile_error').html("");
                                var FileUploadPath = file[0].name;
                                var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                if (Extension == 'csv') {} else {
                                    $('#csvfile_error').html("File only allows CSV");
                                    temp++;
                                }
                            }
                        }
                        if (temp == 0) {
                            $.ajax({
                                url: "{{route('import-file')}}",
                                type: 'post',
                                data: new FormData($('#fileform')[0]),
                                processData: false,
                                contentType: false,
                                cache: false,
                                success: function(res) {
                                    if (res.status == 1) {
                                        toastr.success(res.error_msg);
                                        $('#fileform').trigger("reset");
                                        ajaxList1(1);
                                    } else {
                                        toastr.error(res.error_msg);
                                    }
                                },

                            })
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                cancel: function() {},
            },

        });
    }



    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode >
            31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function ajaxList1(page) {

        var tutorName = $('#tutor_name').val();
        var studentName = $('#student_name').val();
        var day = $('#tuition_day').val();
        var rate = $('#rate').val();
        var commission = $('#commission').val();
        var month = $('#month').val();

        $('.ki-close').click();
        $.ajax({
            type: "GET",
            url: "{{route('tutor-form-ajax-list')}}",
            data: {
                'tutor_name': tutorName,
                'student_name': studentName,
                'tuition_day': day,
                'page': page,
                'rate': rate,
                'commission': commission,
                'month': month
            },

            success: function(res) {
                $('#response_id').html("");
                $('#response_id').html(res);
            }

        });
    }
    $(document).ready(function() {
        ajaxList1(1);
    });

    $('body').on('click', '.pagination a', function(event) {

        $('li').removeClass('active');

        $(this).parent('li').addClass('active');

        event.preventDefault();

        var myurl = $(this).attr('href');

        var page = $(this).attr('href').split('page=')[1];

        ajaxList1(page);

    });

    $('.search_id').click(function(e) {

        ajaxList1(1);

    });

    $('.clear').click(function(e) {
        $('#tutor_name').val("");
        $('#student_name').val("");
        $('#tuition_day').val("");
        $('#rate').val("");
        $('#commission').val("");
        $('#month').val("");
        ajaxList1(1);
    });

    function deleteDetail(Id) {
        event.preventDefault(); // prevent form submit
        $.confirm({
            title: 'Delete!',
            content: 'you want to delete this tutor data?',
            buttons: {
                formSubmit: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            method: "POST",
                            url: "{{ URL::to('tutor-form') }}/" + Id,
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': "DELETE",
                                'id': Id
                            }
                        }).done(function(r) {
                            toastr.success(r.message);
                            ajaxList1(1);
                        }).fail(function() {
                            toastr.error('Sorry, something went wrong. Please try again.');
                        });
                    }
                },
                cancel: function() {
                    //close
                },
            }
        });
    }
</script>
<script>
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
</script>



@endsection
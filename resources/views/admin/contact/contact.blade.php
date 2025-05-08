@extends('layouts.master')
@section('title', 'Contact Master')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css') }}">
<link href="{{ asset('assets/css/pages/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
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
                            <h3 class="card-label font-weight-bolder text-dark">Contact List</h3>
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
            <label class="col-4 col-form-label">Name</label>
            <div class="col-8">
                <input class="form-control" placeHolder="Enter Search Name" type="text" name="name" id="name" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label">Phone No</label>
            <div class="col-8">
                <input class="form-control" maxlength="12" placeHolder="Enter Search Phone No" type="text" name="phone_no" id="phone_no" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label">Tutor Type</label>
            <div class="col-8">
                <input class="form-control" placeHolder="Enter Tutor Type" type="text" name="tutor_type" id="tutor_type" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input class="form-control" placeHolder="Enter Search Email" type="text" name="email" id="email" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label">Created Date</label>
            <div class="col-8">
                <div class="input-group">
                    <input type="text" name="created_date" id="created_date" class="form-control" placeholder="Created Date" autocomplete="off">
                </div>
            </div>
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer" kt-hidden-height="38" style="">
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
<script src="{{ asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    var _AJAX_LIST = "{{ route('contact-ajax') }}";

    function ajaxList(page) {
        var name = $('#name').val();
        var phone_no = $('#phone_no').val();
        var tutor_type = $('#tutor_type').val();
        var email = $('#email').val();
        var created_date = $('#created_date').val();
        $('.ki-close').click();
        $.ajax({
            type: "GET",
            url: _AJAX_LIST,
            data: {
                'name': name,
                'phone_no': phone_no,
                'tutor_type': tutor_type,
                'email': email,
                'page': page,
                'created_date': created_date
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

    $('.search_id').click(function(e) {
        ajaxList(1);
    })
    $('.clear').click(function(e) {

        $('#name').val("");
        $('#phone_no').val("");
        $('#tutor_type').val("");
        $('#email').val("");
        $('#created_date').val("");

        ajaxList(1);
    })


    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment();
        $('#created_date').daterangepicker({
            autoUpdateInput: false,
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
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#created_date .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end
                .format('MM/DD/YYYY'));
        });
    })

    $('#kt_demo_panel_toggle').click(function(e) {

        $('#created_date').val("");

    })
    $('body').on('click', '.view-detail', function(e) {
        var dataId = $(this).attr('data-id');
        var htmls = $('#desc' + dataId).html();
        $.dialog({
            title: 'Message',
            content: htmls,

        });
    })
    function deleteDetail(Id) {
        event.preventDefault(); // prevent form submit
        $.confirm({
            title: 'Delete!',
            content: 'you want to delete this contact inquiry?',
            buttons: {
                formSubmit: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            method: "POST",
                            url: "{{ url('contact-list') }}/" + Id,
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': "DELETE",
                                'id': Id
                            }
                        }).done(function(r) {
                            toastr.success(r.message);
                            ajaxList(1);
                        }).fail(function() {
                            toastr.error(r.message);
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
@endsection
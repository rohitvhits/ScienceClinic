@extends('layouts.master')
@section('title', 'Pay Claim History')
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

                            <h3 class="card-label font-weight-bolder text-dark">Pay Claim History</h3>

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
@endsection



@section('page-js')

<script src="{{asset('assets/Modulejs/textbooks.js')}}"></script>

<script src="{{ asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js') }}"></script>

<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.9') }}"></script>

<script src="{{asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
    var _AJAX_LIST = "{{url('tutor-pay-claim-form-ajax-list')}}";
    var _CSRF_TOKEN = '{{ csrf_token() }}';
    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment();
        $('#kt_daterangepicker_3').daterangepicker({
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
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#kt_daterangepicker_3 .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
        });
    })
</script>
@endsection
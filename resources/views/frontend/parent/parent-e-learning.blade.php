@extends('layouts.master')
@section('title', 'E-Learning')
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

                            <h3 class="card-label font-weight-bolder text-dark">E-Learning List</h3>

                        </div>

                        <div class="card-toolbar">

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
<script>
    var _AJAX_LIST = "{{url('parent-e-learning-ajax-list')}}";

    function AjaxList(page) {
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
        return false;
    }
    AjaxList(1);
    $('body').on('click', '.pagination a', function(event) {

        $('li').removeClass('active');

        $(this).parent('li').addClass('active');

        event.preventDefault();

        var myurl = $(this).attr('href');

        var page = $(this).attr('href').split('page=')[1];

        AjaxList(page);


    });
</script>
@endsection
@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<style>
    @media only screen and (max-width:767px) {
        .apply-details {
            line-height: normal;
        }
        .apply-details-inner{
            align-items:baseline;
        }
        .dash-btn{
            margin-bottom: 7px;
        }
        .res-startbtn{
            justify-content: left !important;
            margin-left:25px;
        }
    }
</style>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Subheader-->

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">

        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <!--begin::Info-->

            <div class="mr-2 w-100">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Page Title-->
                        @php
                        date_default_timezone_set("Europe/London");
                        $h = date('G');
                        $val = '';
                        @endphp
                        @if($h>=5 && $h<=11) @php $val="Good morning" ; @endphp @elseif($h>=12 && $h<=15) @php $val="Good afternoon" ; @endphp @else @php $val="Good evening" ; @endphp @endif <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-dark font-weight-bold mt-2 mb-2 mr-5 greeting-text">{{$val}} {{Auth::user()->first_name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Page Title-->

            </div>

            <!--end::Info-->

        </div>

    </div>

    <!--end::Subheader-->

    <!--begin::Entry-->

    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->

        <div class="container-fluid">

            <!--begin::Dashboard-->
            <div class="d-flex flex-row">

                <!--begin::Content-->

                <div class="flex-row-fluid" id="personam_id">

                    <div class="card card-custom card-stretch">

                        <!--begin::Header-->

                        <div class="card-body d-none">
                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--end::Content-->

                </div>
                <!--end::Dashboard-->

            </div>

            <!--end::Container-->

        </div>

        <!--end::Entry-->

    </div>

    @endsection

    @section('page-js')
    <script>
        $('input.example').on('change', function() {
            $('input.example').not(this).prop('checked', false);
        });

        function dbsData(value) {
            if(value==1)
            {
                $('.yesdbsDiv').removeClass('d-none');
                $('.nodbsDiv').addClass('d-none');
            }
            else
            {
                $('.yesdbsDiv').addClass('d-none');
                $('.nodbsDiv').removeClass('d-none');
            }

/*
$.ajax({
url: "{{route('change-dbs')}}",
type: 'POST',
data: {
'dbs': value,
"_token": "{{ csrf_token() }}"
},
success: function(result) {
if (result.status == 1) {
toastr.success(result.error_msg);
} else {
toastr.error(result.error_msg);
}
}
});
*/
        }

        function updateDbs(value) {
            var myForm = document.getElementById('submitid');
            var formData = new FormData(myForm);
            $.ajax({
                url: "{{route('dbs-update')}}",
                type: 'POST',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.status == 1) {
                        toastr.success(result.error_msg);
                    } else {
                        toastr.error(result.error_msg);
                    }
                }
            });
        }
    </script>
    @endsection
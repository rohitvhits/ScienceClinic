@extends('layouts.master')
@section('title', 'DBS')
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

                        <div class="card-body">
                            <form class="form" id="submitid" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h5>You must have a DBS less than a year old or be on update service for your account to be approved. </h5>
                                        <div class="apply-details-inner">
                                            <div class="ml-4">
                                                <input class="form-check-input example" type="checkbox" id="valid-dbs" name="dbs" value="1" @if(Auth::user()->valid_dbs == 1) checked @endif onclick="dbsData(1)">
                                                <label class="form-check-label">I have a valid DBS</label>
                                            </div>
                                        </div>
                                        <div class="apply-details-inner">
                                            <div class="ml-4">
                                                <input class="form-check-input example" type="checkbox" id="no-valid-dbs" name="dbs" @if(Auth::user()->valid_dbs == 0) checked @endif onclick="dbsData(0)" value="0">
                                                <label class="form-check-label">I have no valid DBS</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 yesdbsDiv @if(Auth::user()->valid_dbs == 0) d-none @endif">
                                        <div class="form-group">
                                            <label class="form-label">Upload DBS</label>
                                            <input class="form-control" type="file" id="dbsFile" name="dbsFile">
                                        </div>
                                    </div>
                                    <div class="col-md-6 yesdbsDiv @if(Auth::user()->valid_dbs == 0) d-none @endif">
                                        <div class="form-group">
                                            <label class="form-label">Update Service Number</label>
                                            <input class="form-control" type="text" id="dbsNumber" name="dbsNumber" value="{{Auth::user()->dbs_application_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-10 text-right">
                                        <input type="button" value="Update" class="btn btn-primary" onclick="updateDbs()">
                                    </div>
                                </div>
                            </form>
                            <div class="row nodbsDiv @if(Auth::user()->valid_dbs == 1) d-none @endif">
                                <div class="col-md-12">
                                    <div class="apply-main">
                                        <h5>Apply for an Enhanced DBS</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="apply-main">
                                                <!-- <h5>Apply for an Enhanced DBS</h5> -->
                                                <div class="apply-details">
                                                    <div class="apply-details-inner">
                                                        <i class="fa fa-check mr-2"></i>
                                                        <div>
                                                            We can process your DBS application and verify your documents.
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-end res-startbtn">
                                            <a class="btn start-dbs btn-primary dash-btn" href="https://portal.checksdirect.co.uk/registration.php" target="_blank">
                                                Start DBS Application
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--- New --->							
                            <div class="col-md-12 nodbsDiv @if(Auth::user()->valid_dbs == 1) d-none @endif" style="padding-left:0">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="apply-main">
                                            <div class="apply-details">
                                                <div class="apply-details-inner">


                                                    <div>
                                                        <i class="fa fa-check mr-2"></i>    You will need this info for your application: 
                                                        <br>&nbsp;&nbsp;&nbsp;&nbsp; 
                                                        ● Organisational PIN code: <b>82318</b>
                                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ● Organisational Passphrase: <b>SCPTEnhanced</b>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="apply-main">
                                                    <div class="apply-details">
                                                        <div class="apply-details-inner">

                                                            <i class="fa fa-check mr-2"></i>
                                                            <div>
                                                                When you get your certificate please register for update service here.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center mt-2 justify-content-end res-startbtn">
                                                <a class="btn start-dbs btn-primary dash-btn" href="https://secure.crbonline.gov.uk/crsc/apply?execution=e1s1" target="_blank">
                                                    Update Service
                                                </a>
                                            </div>
                                        </div>



                                        <div class="col-md-12 p-0">
                                            <div class="apply-main">
                                                <div class="apply-details">
                                                    <div class="apply-details-inner">
                                                        <i class="fa fa-check mr-2"></i>
                                                        <div>
                                                            Click <a class="start-dbs" href="{{asset('uploads/pdf/DBS-ID-docs-info-jan22.pdf')}}" target="_blank">here</a> to see the 3 acceptable identification documents for DBS checks.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 p-0">
                                            <div class="apply-main">
                                                <div class="apply-details">
                                                    <div class="apply-details-inner">
                                                        <!--   <i class="fa fa-check mr-2"></i> -->
                                                        <div>
                                                            <!--             Contact admin to obtain organisation pin and the phrases you need for application. -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <img src="https://www.scienceclinic.co.uk/front/img/footer/img2.png">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="apply-main">
                                        <h5>As a tutor working with children whether online or in-person, you need to be DBS checked. This is in accordance with the Rehabilitation of Offenders Act 1974 (Exceptions) Order 1975 as amended), and where appropriate (Police Act Regulations as amended).</h5>
                                    </div>
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
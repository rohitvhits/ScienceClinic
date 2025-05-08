@extends('layouts.master')
@section('title', 'Tutor Details')
@section('content')
<style>
    .break-text {
        word-break: break-all;
    }

    .bold-text {
        padding-right: 15px;
    }

    .tutor-photo {
        width: 100%;
        max-width: 140px;
        height: 170px;
        object-fit: contain;
    }
</style>

<link rel="stylesheet" href="{{ asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css') }}">

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

                            <span class="nav-profile-name">Tutor Detail</span>

                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>

                        </div>

                        <div class="card-toolbar">

                            <input type="hidden" id="tutor_id" value="{{$tutor->id}}">
                            <input type="hidden" id="counter" value="">


                            @if($tutor->status == '' || $tutor->status == 'Pending')
                            <a href="javascript:void(0);" class="btn btn-success mr-2 accepted_id" onclick="changeStatus('Accepted',{{$tutor->id}})" @if($tutor->status=="Accepted") style="display:none" @endif>Accept</a>

                            <a href="javascript:void(0);" class="btn btn-danger mr-2 rejected_id" onclick="changeStatus('Rejected',{{$tutor->id}})" @if($tutor->status=="Rejected") style="display:none" @endif>Reject</a>
                            @elseif($tutor->status == "Accepted")
                            @if($tutor->deleted_at == NULL)
                            <a href="{{URL::to('tutor-redirect')}}{{'/'}}{{$tutor->email}}" class="btn btn-danger mr-2">Login to Account</a>
                            @endif
                            @endif

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group row">

                            <div class="col-lg-5">

                                <div class="d-flex mb-4">

                                    <strong>Full Name:</strong>

                                    <span class="ml-1 break-text">{{ $tutor->first_name }}</span>

                                </div>
                                <div class="d-flex mb-4">

                                    <strong>Mobile No:</strong>

                                    <span class="ml-1">@if(!empty($tutor->country_code)) +{{$tutor->country_code}} - @endif {{ $tutor->mobile_id }}</span>

                                </div>
                                <div class="d-flex mb-4">

                                    <strong>Address2:</strong>

                                    <span class="ml-1 break-text">{{ $tutor->address2 }}</span>

                                </div>
                                <div class="d-flex mb-4">
                                    <strong>City:</strong>


                                    <span class="ml-1">{{ $tutor->city }}</span>
                                </div>

                                <div class="d-flex mb-4">

                                    <strong>Post Code:</strong> <span class="ml-1">{{ $tutor->postcode }}</span>


                                </div>

                                <div class="d-flex mb-4">
                                    <div>
                                        <strong>Status: </strong>
                                    </div>
                                    <div class="ml-1">
                                        <span id="status_id">@if($tutor->status =='Pending') <span class="badge badge-primary">Pending</span> @elseif($tutor->status =='Accepted') <span class="badge badge-success">Accepted</span> @else <span class="badge badge-danger">Rejected</span> @endif</span>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-5">

                                <div class="d-flex mb-4">

                                    <strong>Email:</strong> <span class="ml-1 break-text">{{ $tutor->email }}</span>

                                </div>
                                <div class="d-flex mb-4">

                                    <strong>Address1:</strong>

                                    <span class="ml-1 break-text">{{ $tutor->address1 }}</span>
                                </div>
                                <div class="d-flex mb-4 ">

                                    <strong>Address3:</strong>

                                    <span class="ml-1 break-text">{{ $tutor->address3 }}</span>

                                </div>

                                <div class="d-flex mb-4">
                                    <div>
                                        <strong>Bio:</strong>
                                    </div>

                                    <div class="ml-1 break-text">
                                        {!! $tutor->bio !!}
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-2">
                                <div class="upload-txt">
                                    <img src="{{$tutor->profile_photo}}" alt="tutor photo" class="tutor-photo">
                                </div>
                            </div>


                        </div>

                    </div>

                </div>



                <!--begin::Header-->

                <div class="card card-custom">

                    <div class="card-header">

                        <div class="card-title tutor">

                            <ul class="nav nav-pills nav-fill">

                                <li class="nav-item">

                                    <a class="nav-link active" onclick="getUniversityDetails(1)" href="#university" data-toggle="tab">

                                        <span class="nav-text">University</span>

                                    </a>

                                </li>


                                <li class="nav-item">

                                    <a class="nav-link" href="#level" data-toggle="tab" onclick="getLevelDetails(1)" aria-controls="Level" id="tutorlevel">

                                        <span class="nav-text">Level Tutor</span>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="#other" data-toggle="tab" onclick="getOtherDetails(1)" aria-controls="Other">

                                        <span class="nav-text">Other</span>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="#student_list" data-toggle="tab" onclick="getStudentDetails(1)" aria-controls="Other">

                                        <span class="nav-text">Student</span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </div>
                    <div class="tab-content" id="tabs">

                        <div class="tab-pane active" id="university">

                            <span id="responsive_id"></span>

                        </div>



                        <div class="tab-pane" id="subject">
                            <div class="table-responsive">
                                <span id="responsive_Id2"></span>
                            </div>

                        </div>



                        <div class="tab-pane" id="level">
                            <div class="table-responsive">
                                <span id="responsived_id"></span>
                            </div>

                        </div>





                        <div class="tab-pane" id="other">
                            <div class="table-responsive">
                                <span id="responsived1_id"></span>
                            </div>


                        </div>

                        <div class="tab-pane" id="student_list">
                            <div class="table-responsive">
                                <span id="responsived2_id"></span>
                            </div>


                        </div>

                    </div>

                </div>





            </div>

            <!--end::Subject List-->

        </div>

        <!--end::Container-->

    </div>

    <!--end::Card-->

</div>

<!--end::Container-->



@endsection

@section('page-js')

<script src="{{ asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js') }}"></script>

<script>
    function addhourlyrate(subjectId) {
        $.confirm({
            title: 'Add Hourly Rate',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Enter Rate</label>' +
                '<input type="number" placeholder="Your Rate" class="rate form-control" required />' +
                '<span class="text-danger" id="error_rate"></span>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var rate = this.$content.find('.rate').val();
                        if (rate.trim() == '') {
                            $('#error_rate').html("Please enter rate");
                            return false;
                        }

                        $.ajax({

                            type: "post",

                            url: "{{ route('add-hourly-rate') }}",
                            data: {
                                'tutor_id': '{{ $tutor->id }}',
                                'rate': rate,
                                'subject_id': subjectId,
                                "_token": "{{ csrf_token() }}"

                            },

                            success: function(res) {

                                toastr.success(res.error_msg);
                                getLevelDetails(1);
                                getCounter();
                            }

                        })
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
    $(document).ready(function() {

        getCounter();
    });

    function getUniversityDetails(page) {

        $.ajax({

            type: "GET",

            url: "{{ route('tutor-university') }}",

            data: {

                'tutor_id': '{{ $tutor->id }}',

                'page': page,

            },

            success: function(res) {

                $('#responsive_id').html("");

                $('#responsive_id').html(res);

            }

        })

    }

    getUniversityDetails(1);



    function getSubjectDetails(page) {

        $.ajax({

            type: "GET",

            url: "{{ route('tutor-subject') }}",

            data: {

                'tutor_id': '{{ $tutor->id }}',

                'page': page,

            },

            success: function(res) {

                $('#responsive_Id2').html("");

                $('#responsive_Id2').html(res);

            }

        })

    }

    getSubjectDetails(1);



    function getLevelDetails(page) {

        $.ajax({

            type: "GET",

            url: "{{ route('tutor-level-list') }}",

            data: {

                'tutor_id': '{{ $tutor->id }}',

                'page': page,

            },

            success: function(res) {

                $('#responsived_id').html("");

                $('#responsived_id').html(res);

            }

        })

    }

    getLevelDetails(1);


    function getOtherDetails(page) {

        $.ajax({

            type: "GET",

            url: "{{ route('tutor-other-list') }}",

            data: {

                'tutor_id': '{{ $tutor->id }}',

                'page': page,

            },

            success: function(res) {
                $('#responsived1_id').html("");

                $('#responsived1_id').html(res);

            }

        })

    }

    getOtherDetails(1);

    function getStudentDetails(page) {

        $.ajax({

            type: "GET",

            url: "{{ route('tutor-student-list') }}",

            data: {

                'tutor_id': '{{ $tutor->id }}',

                'page': page,

            },

            success: function(res) {
                $('#responsived2_id').html("");

                $('#responsived2_id').html(res);

            }

        })

    }

    getStudentDetails(1);
</script>

<script>
    function getCounter() {
        var id = $('#tutor_id').val();
        $.ajax({
            method: "GET",
            url: "{{ route('get-count') }}",
            data: {
                'id': id,
            },
            success: function(res) {
                $('#tutor_id').val(res.data);
            }
        })
    }


    function changeStatus(status, id) {
        var count = $('#tutor_id').val();
        var name = '';
        if (status == 'Accepted') {
            name = 'Accept';
        } else {
            name = 'Reject';
        }
        $.confirm({

            title: 'Are you sure?',

            columnClass: "col-md-6",



            content: "you want to change status?",

            buttons: {

                formSubmit: {

                    text: name,

                    btnClass: 'btn-primary',

                    action: function() {

                        $.ajax({

                            method: "GET",

                            url: "{{ route('changestatus') }}",

                            data: {

                                'id': id,

                                'status': status

                            }



                        }).done(function(r) {



                            toastr.success(r.error_msg);

                            $('.rejected_id').attr('style', 'display:block');

                            $('.accepted_id').attr('style', 'display:block');

                            if (r.data.status == "Accepted") {

                                var html_res = '<span class="badge badge-success">Accepted</span>';

                                $('.rejected_id').attr('style', 'display:none');
                                $('.accepted_id').attr('style', 'display:none');

                            } else {

                                var html_res = '<span class="badge badge-danger">Rejected</span>';

                                $('.rejected_id').attr('style', 'display:none');
                                $('.accepted_id').attr('style', 'display:none');

                            }



                            $('#status_id').html(html_res);



                        }).fail(function() {

                            // _self.setContent('Something went wrong. Contact Support.');

                            toastr.error('Sorry, something went wrong. Please try again.');

                        });



                    }

                },
                cancel: function() {

                },


            },



        });
    }
</script>

@endsection
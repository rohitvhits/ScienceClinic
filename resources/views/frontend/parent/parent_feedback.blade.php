@extends('layouts.master')
@section('title', 'Give a review')
@section('content')


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

                            <h3 class="mb-2 card-label font-weight-bolder text-dark">Tutors List</h3>
                            <span style="font-size: 12px;">Please tell us your experience with Tutor</span>
                        </div>


                    </div>

                    <div class="card-body">

                        <table class="table table-separate table-head-custom">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Tutor Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Subject Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($data) > 0)
                                @php $temp = 1; @endphp
                                @foreach($data as $value)
                                <tr>
                                    <td>{{$temp}}</td>
                                    <td>{{$value->tutorDetails->first_name}} {{$value->tutorDetails->last_name}}</td>
                                    <td>{{$value->tutorDetails->email}}</td>
                                    <td>{{$value->tutorDetails->mobile_id}}</td>
                                    <td>{{$value->subjectDetails->main_title}}</td>
                                    <td>
                                        <a href="{{route('feedback-form',$value->id)}}" class="btn btn-primary">Review</a>
                                    </td>
                                </tr>
                                @php $temp++; @endphp
                                @endforeach
                                @endif

                                @if (count($data) == 0)

                                <tr class="text-center">

                                    <td colspan="6">No record available</td>

                                </tr>

                                @endif
                            </tbody>
                        </table>

                        {!! $data->render('pagination::bootstrap-5') !!}
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
@endsection
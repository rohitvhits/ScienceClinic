<table class="table table-separate table-head-custom ">

    <thead>

        <tr>

            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">User Type</th>
            <th style="white-space: nowrap">Student Name</th>
            <th style="white-space: nowrap">Tutor Name</th>
            <th style="white-space: nowrap">Subject Name</th>
            <th style="white-space: nowrap">Level</th>
            <th style="white-space: nowrap">Day</th>
            <th style="white-space: nowrap">Booking Date</th>
            <th style="white-space: nowrap">Time</th>
            <th style="white-space: nowrap">Email</th>
            <th style="white-space: nowrap">Actions</th>

        </tr>

    </thead>

    <tbody>
        @php

        $i = $page * 10 - 9;
        @endphp
        @if (count($query) > 0)
        @foreach ($query as $val)
        <tr>

            <td>{{ $i++ }}</td>
            @if($val->created_by == 1)
            <td><span class="badge badge-success">Admin</span></td>
            @else
            <td><span class="badge badge-primary">Tutor</span></td>
            @endif
            <td>{{$val->user_name}}</td>
            <td>{{$val->tutorDetails->first_name}}</td>
            <td>{{$val->subjectDetails->main_title}}</td>
            <td class="parent-address">{{$val->levelDetails->title}}</td>
            <td style="text-transform: capitalize;">{{$val->tuition_day}}</td>
            <td>{{ date('d/m/Y', strtotime($val->booking_date)) }}</td>
            <td>{{Utility::convertTime($val->teaching_start_time)}}</td>
            @if($val->email != '')
            <td>{{$val->email}}</td>
            @else
            <td>N/A</td>
            @endif
            <td>
                <a href="javascript:void(0)" onclick="editDetail('{{$val->id}}')" class="edit-details" id="edit_{{$val->id}}" data-id="{{$val->main_id}}"><i class="fa fa-edit" title="Edit"></i></a>
                <a href="javascript:void(0)" onclick="deleteDetail('{{$val->id}}')" class="edit-details" data-id="{{$val->id}}"><i class="fa fa-trash" title="Delete"></i></a>
            </td>
        </tr>

        @endforeach

        @endif

        @if (count($query) == 0)

        <tr>

            <td colspan="4">No record available</td>

        </tr>

        @endif

    </tbody>

</table>

{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
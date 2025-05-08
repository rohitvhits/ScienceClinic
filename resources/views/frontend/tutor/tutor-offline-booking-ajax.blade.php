<table class="table table-separate table-head-custom custom-table-td">

    <thead>

        <tr>

            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">User Type</th>
            <th style="white-space: nowrap">Student Name</th>

            <th style="white-space: nowrap">Subject</th>

            <th style="white-space: nowrap">Level</th>

            <th>Day</th>
            <th>Booking Date</th>

            <th>Time</th>
            <th>Email</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>
        @php

        $i = $page * 10 - 9;

        @endphp
        @if(count($data) > 0)

        @foreach ($data as $val)
        <tr>

            <td >{{ $i++ }}</td>
            @if($val->createdBy == 1)
            <td><span class="badge badge-success">Admin</span></td>
            @else
            <td><span class="badge badge-primary">By Me</span></td>
            @endif

            <td>{{ $val->userName }}</td>

            <td>{{ $val->subjectDetails->main_title }}</td>

            <td>{{ $val->levelDetails->title }}</td>

            <td style="text-transform: capitalize;">{{ $val->tuition_day }}</td>
            <td>{{ date('d/m/Y', strtotime($val->booking_date)) }}</td>

            <td>{{ Utility::convertTime($val->teaching_start_time) }}</td>
            @if($val->userEmail != '')
            <td>{{$val->userEmail}}</td>
            @else
            <td>N/A</td>
            @endif
            <td>
                <a href="javascript:void(0)" onclick="editDetail('{{$val->id}}')" class="edit-details" data-id="{{$val->main_id}}" id="edit_{{$val->id}}"><i class="fa fa-edit" title="Edit"></i></a>
                <a href="javascript:void(0)" onclick="deleteDetail('{{$val->id}}')" class="edit-details" data-id="{{$val->id}}"><i class="fa fa-trash" title="Delete"></i></a>
                @if($val->booking_date == date('Y-m-d') && $val->attend_class == 0)
                <a href="javascript:void(0)" onclick="attendOfflineClass('{{$val->id}}')" class="edit-details" data-id="{{$val->id}}"><i class="fa fa-check" title="Attend"></i></a>
                @endif
            </td>

        </tr>

        @endforeach

        @else

        <tr>

            <td colspan="4">No record available</td>

        </tr>

        @endif

    </tbody>

</table>

{!! $data->render('pagination::bootstrap-5') !!}
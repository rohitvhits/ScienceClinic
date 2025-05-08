<table class="table table-separate table-head-custom">

    <thead>

        <tr>

            <th nowrap="nowrap">ID</th>

            <th style="white-space: nowrap">Subject Name</th>

            <th style="white-space: nowrap">Tuition Day</th>

            <th style="white-space: nowrap">Time</th>

            <th>Reason</th>

            <th>Actions</th>

        </tr>

    </thead>

    <tbody>
        @php

        $i = $page * 10 - 9;

        @endphp
        @if(count($data) > 0)

        @foreach ($data as $val)
        <span style="display: none;" id="desc{{$val->id}}">{{$val->tutor_reject_reason}}</span>
        <tr>

            <td>{{ $i++ }}</td>

            <td>{{ $val->subjectDetails->main_title }}</td>

            <td>{{ $val->tuition_day }}</td>
            @if($val->teaching_start_time)
            <td>{{ $val->teaching_start_time }}</td>
            @else
            <td>-</td>
            @endif
            <td>
                @if(empty($val->tutor_reject_reason))
                <a href="javascript:void(0)" onclick="addReason('{{$val->id}}')" class="edit-details btn btn-primary" data-id="{{$val->id}}">Reason</a>
                @else
                {{ Str::limit($val->tutor_reject_reason, 50) }}
                @endif
            </td>

            <td>
                @if(!empty($val->tutor_reject_reason))
                <a href="javascript:void(0)" onclick="showReason('{{$val->id}}')" class="edit-details" data-id="{{$val->id}}"><i class="fa fa-eye"></i></a>
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
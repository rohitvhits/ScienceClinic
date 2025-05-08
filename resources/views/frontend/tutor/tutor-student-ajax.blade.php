<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Student Name</th>
            <th style="white-space: nowrap">Subject</th>
            <th style="white-space: nowrap">Level</th>
            <th style="white-space: nowrap">Year Group</th>
            <th style="white-space: nowrap">Parent Name</th>
            <th style="white-space: nowrap">Parent Mobile</th>
            <th style="white-space: nowrap">Parent Email</th>
            <th style="white-space: nowrap">Created time</th>
            <th style="white-space: nowrap">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = $page * 10 - 9;
        @endphp
         @if (count($query) > 0)
        @foreach ($query as $value)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $value->student_name}}</td>
                <td>{{ $value->main_title}}</td>
                <td>{{ $value->level}}</td>
                <td>{{ $value->year_group}}</td>
                <td>{{ $value->parent_name}}</td>
                <td>@if(!empty($value->country_code)) +{{$value->country_code}} - @endif {{ $value->parent_mobile}}</td>
                <td>{{ $value->parent_email}}</td>
                <td>{{ Utility::convertYMDTimeToDMYTime($value->created_at) }}</td>
                <td>
                    <a href="{{ url('tutor-student-edit') }}/{{$value->id}}"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" onclick="deleteDetail('{{$value->id }}')" class="delete-category"><i class="fa fa-trash"></i></a>
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
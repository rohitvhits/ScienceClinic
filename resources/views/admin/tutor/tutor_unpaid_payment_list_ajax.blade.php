<table class="table table-separate table-head-custom ">

    <thead>

        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Tutor’s Name </th>
            <th style="white-space: nowrap">Week Commencing </th>
            <th style="white-space: nowrap">Total Hrs </th>
            <th style="white-space: nowrap">GBP (£)</th>
            <th style="white-space: nowrap">Created Date</th>
            <th style="white-space: nowrap">Status</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>
        @php
            $i = $page * 10 - 9;
        @endphp
        @if (count($query) > 0)
        @foreach ($query as $val)
        <span id="desc{{$val->id}}" style="display:none">{{ $val->message}}</span>
        <tr>
            <td style="white-space: nowrap">{{ $i++ }}</td>
            <td style="white-space: nowrap">{{ Utility::getTutorName($val->teacher_id) }}</td>
            <td style="white-space: nowrap">{{ Utility::convertDMY($val->start_date) }} - {{ Utility::convertDMY($val->end_date) }}</td>
            <td style="white-space: nowrap">{{ $val->total_hrs }}</td>
            <td style="white-space: nowrap">{{ $val->total_euro }}</td>
            <td style="white-space: nowrap">
                @if ($val->created_at != '')
                    {{ Utility::convertYMDTimeToDMYTime($val->created_at) }}
                @endif
            </td>
            <td>{{ $val->pay_status}}</td>
            <td style="white-space: nowrap">
                <a href="{{ url('view-pay-claim-form/'.$val->id) }}" title="show"><i class="fa fa-eye"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
        @if (count($query) == 0)
            <tr>
                <td colspan="8">No record available</td>
            </tr>
        @endif

    </tbody>

</table>

{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
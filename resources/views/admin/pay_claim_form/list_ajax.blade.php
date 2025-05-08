<table class="table table-separate table-head-custom">
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
        <?php
        $todayDate=date('Y-m-d');
        $todayTime=date('H:i:s');
        $todayName=date('l');
        if($todayName=='Friday')
        {
            $fri1 = date('Y-m-d', strtotime('this friday'));
            $fri2 = date('Y-m-d', strtotime('next friday'));
        }
        else
        {
            $fri1 = date('Y-m-d', strtotime('last friday'));
            $fri2 = date('Y-m-d', strtotime('this friday'));
        }
        ?>
        @php
            $i = $page * 10 - 9;
           
        @endphp
         @if (count($query) > 0)
        @foreach ($query as $val)
        <?php
        $value=explode(' ', $val->created_at);
        $submitDate=$value[0];
        $submitTime=$value[1];
        $rowDayName=date('l', strtotime($submitDate));
        $cc='rgb(238 240 248 / 100%)';
        if($rowDayName=='Friday' && $submitDate<=$todayDate && $submitTime>='10:00:00' && $submitTime<='18:00:00')
        {
            $cc='rgb(0 128 0 / 10%)';
        }
        elseif($submitDate>=$fri1 && $submitDate<=$fri2)
        {
            $cc='rgb(194 224 255 / 100%)';
        }
        ?>
        <span id="desc{{$val->id}}" style="display:none">{{ $val->message}}</span>
            <tr style="background-color: <?= $cc; ?>;">
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
                    <a href="javascript:void(0)" title="show" class="delete-detail" onclick="deleteDetail('{{$val->id }}')" data-id="{{$val->id}}"><i class="fa fa-trash"></i></a>
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


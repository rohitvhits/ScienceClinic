<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap"> ID</th>
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

        

        $i = $page * 50 - 49;

    @endphp

     @if (count($query) > 0)

        @foreach ($query as $live_in)

            

            <tr>

                <td>

                    {{ $i++}}

                </td>
                <td>{{ Utility::convertDMY($live_in->start_date) }} - {{ Utility::convertDMY($live_in->end_date) }}</td>
                <td>{{ $live_in->total_hrs}}</td>
                <td>{{ $live_in->total_euro}}</td>

                

                <td>

                 @if($live_in->created_at !='')

                            {{ Utility::convertYMDTimeToDMYTime($live_in->created_at) }}

                        @endif

                </td>

                <td>{{ $live_in->pay_status}}</td>
                <td>
                    @if($live_in->pay_status=='Pending')
                        <a href="{{ url('tutor-pay-claim-form-edit') }}/{{$live_in->id}}"><i class="fa fa-edit"></i></a>
                    @else
                        <a href="{{ url('tutor-pay-claim-form-edit') }}/{{$live_in->id}}"><i class="fa fa-eye"></i></a>
                    @endif
                </td>

            </tr>

        @endforeach

        

    @endif

    @if (count($query) == 0)

            <tr>

                <td colspan="7"><center>No record available</center></td>

            </tr>

        @endif

    </tbody>

</table>



{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}




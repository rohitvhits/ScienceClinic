<table class="table table-separate table-head-custom">

    <thead>

        <tr>

            <th nowrap="nowrap"> ID</th>

            <th style="white-space: nowrap">Tutor Name</th>

            <th style="white-space: nowrap">Student Name</th>
            <th style="white-space: nowrap">Day Of Tuition</th>
            <th style="white-space: nowrap">Tuition Time</th>
            <th style="white-space: nowrap">Rate</th>
            <th style="white-space: nowrap">Commission</th>
            <th style="white-space: nowrap">Month</th>
            <th style="white-space: nowrap">Created time</th>
            <th style="white-space: nowrap">Actions</th>

        </tr>

    </thead>

    <tbody>

        @php



        $i = $page * 10 - 9;
        $nameArray = array();
        @endphp

        @if (count($query) > 0)

        @foreach ($query as $value)


        <tr>

            @php
                $name = strtoupper($value->tutor_name);
            @endphp
            @if(in_array($name, $nameArray))
            <td></td>
            <td></td>
            @else
            <td>{{ $i++}}</td>
            <td>{{ $value->tutor_name}}</td>
            @endif
            @php
                array_push($nameArray, strtoupper($value->tutor_name));
            @endphp
            <td>{{ $value->student_name}}</td>
            <td>{{ ucfirst($value->day_of_tution)}}</td>
            <td>{{ $value->tution_time}}</td>
            <td>{{ $value->rate}}</td>
            <td>{{ $value->commission}}</td>
            <td> @if($value->month == 1)
                January
                @elseif($value->month == 2)
                February
                @elseif($value->month == 3) March
                @elseif($value->month == 4) April
                @elseif($value->month == 5) May
                @elseif($value->month == 6) June
                @elseif($value->month == 7) July
                @elseif($value->month == 8) August
                @elseif($value->month == 9) September
                @elseif($value->month == 10) October
                @elseif($value->month == 11) November
                @elseif($value->month == 12) December
                @else
                N/A
                @endif
            </td>
            <td>{{ Utility::convertYMDTimeToDMYTime($value->created_at) }}</td>
            <td>
                <a href="{{ url('tutor-form') }}/{{$value->id}}/edit"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0)" onclick="deleteDetail('{{$value->id }}')" class="delete-category"><i class="fa fa-trash"></i></a>
            </td>


        </tr>

        @endforeach



        @endif

        @if (count($query) == 0)

        <tr>

            <td colspan="6">No record available</td>

        </tr>

        @endif

    </tbody>

</table>



{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
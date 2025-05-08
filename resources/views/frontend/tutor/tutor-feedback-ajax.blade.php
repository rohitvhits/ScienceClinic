<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Name</th>
            <th style="white-space: nowrap">Description</th>
            <th style="white-space: nowrap">Subject Name</th>
            <th style="white-space: nowrap">Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @php
        $i = $page * 10 - 9;
        @endphp
        @if (count($query2) > 0)
        @foreach ($query2 as $val)
        <span id="desc{{$val->id}}" style="display:none">{{ $val->message}}</span>
        <tr>

            <td>{{ $i++ }}</td>
            <td>{{ $val->parent_first_name }} {{ $val->parent_last_name }}</td>
            <td>{{ Str::limit($val->message, 50) }}</td>
            <td>{{ $val->subject_name }}</td>
            <td>
                <div class="review-score">
                    <div class="stars stars2" style="--rating: {{$val->star}};" aria-label="Rating of this product is {{$val->star}} out of 5."></div>
                </div>
            </td>
            <td>
                <a href="javascript:void(0)" onclick="viewDetail('{{$val->id}}')" class="edit-details" data-id="{{$val->id}}}"><i class="fa fa-eye"></i></a>
            </td>

        </tr>

        @endforeach

        @endif

        @if (count($query2) == 0)

        <tr>

            <td colspan="4">Currently you have no feedback</td>

        </tr>

        @endif

    </tbody>

</table>

{!! $query2->withQueryString()->links('pagination::bootstrap-5') !!}
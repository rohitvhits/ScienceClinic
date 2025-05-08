<table class="table table-separate table-head-custom">

    <thead>

        <tr>

            <th nowrap="nowrap"> ID</th>
            <th style="white-space: nowrap">Type</th>
            <th style="white-space: nowrap">Title </th>
            <th style="white-space: nowrap">Document</th>
        </tr>

    </thead>

    <tbody>

        @php



        $i = $page * 10 - 9;

        @endphp
    @if(!empty($query))
        @if (count($query) > 0)

        @foreach ($query as $live_in)



        <tr>

            <td>

                {{ $i++}}

            </td>
            @if($live_in->user_id == 1)
            <td><span class="badge badge-success">Admin</span></td>
            @else
            <td><span class="badge badge-primary">Tutor</span></td>
            @endif
            <td>
                {{ $live_in->title}}
            </td>
            <td>
                <a href="{{$live_in->upload_data}}#toolbar=0" target="_blank"><i class="far fa-file"></i></a>
            </td>

            <td>
            </td>

        </tr>

        @endforeach



        @endif

        @if (count($query) == 0)

        <tr>

            <td colspan="6">No record available</td>

        </tr>

        @endif
    @else
    <tr>

        <td colspan="6">No record available</td>

    </tr>
    @endif
    </tbody>

</table>
@if(!empty($query))
    {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
@endif
<table class="table table-separate table-head-custom">

    <thead>

        <tr>

            <th nowrap="nowrap"> ID</th>

            <th style="white-space: nowrap">Title </th>



            <th style="white-space: nowrap">Created Date</th>
            <th style="white-space: nowrap">Header Show</th>

            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

        @php



        $i = $page * 10 - 9;

        @endphp

        @if (count($query) > 0)

        @foreach ($query as $live_in)



        <tr>

            <td>

                {{ $i++}}

            </td>

            <td id="title{{$live_in->id}}">

                {{$live_in->main_title}}

            </td>




            <td>

                @if($live_in->created_at !='')

                {{ Utility::convertYMDTimeToDMYTime($live_in->created_at) }}

                @endif

            </td>
            <td>
                <input type="checkbox" class="header_show" id="header_show{{$live_in->id}}" data-id="{{$live_in->id}}" @if($live_in->show == 1) checked @endif>
            </td>

            <td>

                <a href="javascript:void(0)" onclick="editDetail({{$live_in->id}})"><i class="fa fa-edit" title="Edit"></i></a>
                <a href="javascript:void(0)" class="delete-category" data-id="{{ $live_in->id}}"><i class="fa fa-trash"></i></a>

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



{!! $query->withQueryString()->render('pagination::bootstrap-5') !!}

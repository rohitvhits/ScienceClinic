<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Tutor Name</th>
            <th style="white-space: nowrap">Parent Name</th>
            <th style="white-space: nowrap">Parent Mobile</th>
            <th style="white-space: nowrap">Parent Email</th>
            <th style="white-space: nowrap">Created time</th>
            <th style="white-space: nowrap">Status</th>
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
                <td>{{ $value->first_name.' '.$value->last_name}}</td>
                <td>{{ $value->parent_first_name.' '.$value->parent_last_name}}</td>
                <td>@if(!empty($value->country_code)) +{{$value->country_code}} - @endif {{ $value->parent_mobile}}</td>
                <td>{{ $value->parent_email}}</td>
                <td>{{ Utility::convertYMDTimeToDMYTime($value->created_at) }}</td>
                <td>
                    @if($value->status =='active')
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-primary">Pending</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('tutor-reviews-edit') }}/{{$value->id}}"><i class="fa fa-edit"></i></a>
                    @if($value->status =='active')
                    <a href="javascript:void(0)" onclick="functionDeactivate('{{ $value->id }}')" class="delete-details" data-id="{{ $value->id }}}"><i class="fa fa-user-slash" title="Pending"></i></a>
                    @else
                    <a href="javascript:void(0)" onclick="functionActivate('{{ $value->id }}')" class="activae-details" data-id="{{ $value->id }}}"><i class="fa fa-user-alt" title="Active"></i></a>
                    @endif
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
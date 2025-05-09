<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Title</th>
            <th style="white-space: nowrap">Image</th>
            <th style="white-space: nowrap">Link</th>
            <th style="white-space: nowrap">Created Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = $page * 10 - 9;
        @endphp

        @if (count($query) > 0)
            @foreach ($query as $val)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td id="title{{ $val->id }}">{{ $val->title ?? "" }}</td>

                    {{-- Image --}}
                    <td>
                        @if ($val->image)

                            <img src="{{ $val->image ?? "" }}" alt="Image" width="50" height="25" class="img-thumbnail">
                        @else
                            N/A
                        @endif
                    </td>

                    {{-- Link --}}
                    <td>
                        @if ($val->link)
                            <a href="{{ $val->link ?? "" }}" target="_blank">{{ $val->link }}</a>
                        @else
                            N/A
                        @endif
                    </td>

                    {{-- Created Date --}}
                    <td>
                        @if ($val->created_at != '')
                            {{ Utility::convertYMDTimeToDMYTime($val->created_at) }}
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td>
                        {{-- <a href="{{ route('our-featured-show', $val->id) }}" class="show-details"><i class="fa fa-eye"></i></a> --}}
                        <a href="{{ route('our-featured-edit', $val->id) }}" class="edit-details" data-id="{{ $val->id }}"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="deleteDetail('{{ $val->id }}')" class="delete-details" data-id="{{ $val->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No record available</td>
            </tr>
        @endif
    </tbody>
</table>

{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}

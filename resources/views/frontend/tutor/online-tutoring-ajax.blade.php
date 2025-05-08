<table class="table table-separate table-head-custom">
    <thead>
        <tr>

            <th>Id</th>
            <th>Name</th>
            <th>Url</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @if(!empty($query))

        <tr>
            <td>1</td>
            <td>Science Clinic Whiteboard</td>
            <td style="word-break: break-all;"><a href="{{$query->merithub_link}}" target="_blank">{{$query->merithub_link}}</a></td>
            <td><a onclick="editUrl('{{$query->id}}')"><i class="fa fa-edit"></i></a>

                <a href="javascript:void(0)" onclick="deleteUrl('{{$query->id}}')" class="delete-category"><i class="fa fa-trash"></i></a>
            </td>

        </tr>
        @else

        <tr>

            <td colspan="6" class="text-center">No record available</td>

        </tr>

        @endif
    </tbody>
</table>
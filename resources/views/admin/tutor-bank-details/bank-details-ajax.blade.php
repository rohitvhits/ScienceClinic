<table class="table table-separate table-head-custom">
    <thead>
        <tr>
            <th nowrap="nowrap">ID</th>
            <th style="white-space: nowrap">Name</th>
            <th style="white-space: nowrap">Account Holder Name</th>
            <th style="white-space: nowrap">Bank Name</th>
            <th style="white-space: nowrap">Bank Account Number</th>
            <th style="white-space: nowrap">Bank Sort Code</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = $page * 10 - 9;

        @endphp
        @if (count($query) > 0)
        @foreach ($query as $val)
        @if($val->userDetails)
        <tr>
            <td style="white-space: nowrap">{{ $i++ }}</td>
            <td style="white-space: nowrap">{{ $val->userDetails->first_name }}</td>
            <td style="white-space: nowrap">{{ $val->account_holder_name }}</td>
            <td style="white-space: nowrap">{{ $val->bank_name }}</td>
            <td style="white-space: nowrap">{{ $val->bank_account_number }}</td>
            <td style="white-space: nowrap">{{ $val->bank_sort_code }}</td>
        </tr>
        @endif
        @endforeach
        @endif
        @if (count($query) == 0)
        <tr>
            <td colspan="9">No record available</td>
        </tr>
        @endif
    </tbody>
</table>
{!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
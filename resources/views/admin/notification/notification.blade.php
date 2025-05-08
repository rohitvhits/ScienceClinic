@extends('layouts.master')
@section('title', 'Notification')
<style>
    .notification-ul li {
    display: FLEX;
    justify-content: space-between;
}

.notification-ul {
    padding: 0;
    list-style: none;
}
    </style>
@section('content')
<div class="d-flex flex-column-fluid">

    <div class="container-fluid">

        <div class="d-flex flex-row">

            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <!--begin::Header-->

                    <div class="card-header py-3">

                        <div class="card-title align-items-start flex-column">

                            <h3 class="card-label font-weight-bolder text-dark">Notification</h3>

                        </div>



                    </div>

                    <div class="card-body">

                        <div class="table-responsive" id="unreadnotification_id">

                        </div>

                    </div>

                </div>

            </div>

            <!--end::Content-->

        </div>

        <!--end::Subject List-->

    </div>

    <!--end::Container-->

</div>
@endsection
@section('page-js')
<script type="text/javascript">
    function getAllUnreadNotification() {
        $.ajax({
            url: "{{URL::to('unread-notification')}}",
            type: "GET",
            success: function(result) {
                var responseHtml = '';
                if (result.length != 0) {
                    $.each(result, function(k, v) {
                        var respId = "'" + v.id + "'";
                        responseHtml += '<ul class="notification-ul" id="unreadNotification">';
                        responseHtml += '<li>';
                        if (v.data.type == 'Hourly Rate') {
                            responseHtml += '<div class="text">';
                            responseHtml += '<a href="{{URL::to("parent-list/")}}/'+v.data.parentid+'" style="color: #3F4254;"><span class="text-primary">' + v.data.username + '</span>' + v.data.body + ' <span class="text-primary">' + v.data.subjectname + '.</span></a>';
                            responseHtml += '</div>';
                        }
                        responseHtml += '<div class="close-last">';
                        responseHtml += '<a href="javascript:void(0);" onClick="markRead(' + respId + ')" class="btn btn-transparent p-0"><span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" style="width:20px !important;height:20px !important;"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000"><rect x="0" y="7" width="16" height="2" rx="1" /> <rect opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1" /></g></g></svg></span> </a>';
                        responseHtml += '</div>';
                        responseHtml += '</li>';
                        responseHtml += '</ul>';
                    });
                } else {
                    responseHtml = '<center>No new notifications</center>';
                }
                $("#unreadnotification_id").html(responseHtml);
            }
        });
    }

    function markRead(id) {
        $.ajax({
            url: "{{URL::to('mark-read')}}/" + id,
            type: "GET",
            data: {
                id: id
            },
            success: function(res) {
                if(res.status == 1){
                    getAllUnreadNotification();
                    toastr.success(res.error_msg);
                }
                else{
                    toastr.error(res.error_msg);
                }
            }
        });
    }
    $(document).ready(function() {
        getAllUnreadNotification()
    });
</script>
@endsection
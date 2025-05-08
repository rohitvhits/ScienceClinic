@extends('layouts.master')
@section('title', 'Online Tutoring List')
@section('content')
<style>
    .custom-color .svg-icon-primary svg g [fill] {
        fill: #591ed3 !important;
    }

    .google-meet-color .svg-icon-primary svg g [fill] {
        fill: #F64E60 !important;
    }

    .yellow-color-svg .svg-icon-primary svg g [fill] {
        fill: #FFA800 !important;
    }
</style>
<div class="d-flex flex-column-fluid">

    <!--begin::Container-->

    <div class="container-fluid">

        <!--begin::Subject List-->

        <div class="d-flex flex-row">

            <!--begin::Content-->

            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <!--begin::Header-->

                    <div class="card-header py-3">

                        <div class="card-title align-items-start flex-column">

                            <h3 class="card-label font-weight-bolder text-dark">Online Tutoring List</h3>

                        </div>
                        @if(empty($query))
                        <div class="card-title align-items-start flex-column">
                            <button class="btn btn-primary mr-2 add-link"> <span class="svg-icon svg-icon-md">

                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->

                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                            <rect x="0" y="0" width="24" height="24"></rect>

                                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>

                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>

                                        </g>

                                    </svg>

                                    <!--end::Svg Icon-->

                                </span>Add Science Clinic Whiteboard Link</button>
                        </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="d-flex flex-column-fluid">

                            <!--begin::Container-->

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #a579ff8c !important;">
                                            <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center lms custom-color">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop-macbook.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#591ed3" />
                                                            <rect fill="#591ed3" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="https://teams.microsoft.com/_#/school/teams-grid/General?ctx=teamsGrid" target="_blank">
                                                    <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #591ed3;">
                                                        Microsoft Teams
                                                    </div>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #f66b7a87 !important;">
                                            <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center direct google-meet-color">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M10.8226874,8.36941377 L12.7324324,9.82298668 C13.4112512,8.93113547 14.4592942,8.4 15.6,8.4 C17.5882251,8.4 19.2,10.0117749 19.2,12 C19.2,13.9882251 17.5882251,15.6 15.6,15.6 C14.5814697,15.6 13.6363389,15.1780547 12.9574041,14.4447676 L11.1963369,16.075302 C12.2923051,17.2590082 13.8596186,18 15.6,18 C18.9137085,18 21.6,15.3137085 21.6,12 C21.6,8.6862915 18.9137085,6 15.6,6 C13.6507856,6 11.9186648,6.9294879 10.8226874,8.36941377 Z" fill="#F64E60" fill-rule="nonzero" opacity="0.3" />
                                                            <path d="M8.4,18 C5.0862915,18 2.4,15.3137085 2.4,12 C2.4,8.6862915 5.0862915,6 8.4,6 C11.7137085,6 14.4,8.6862915 14.4,12 C14.4,15.3137085 11.7137085,18 8.4,18 Z" fill="#F64E60" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="https://meet.google.com/?hs=197&pli=1&authuser=0" target="_blank">
                                                    <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #F64E60; ">
                                                        Google Meet
                                                    </div>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #85bffe57 !important;">
                                            <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center contact-list">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                                            <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1649788426&rver=7.1.6819.0&wp=MBI_SSL&wreply=https%3A%2F%2Flw.skype.com%2Flogin%2Foauth%2Fproxy%3Fclient_id%3D572381%26redirect_uri%3Dhttps%253A%252F%252Fweb.skype.com%252FAuth%252FPostHandler%26state%3D3977384d-7fcb-49f9-993a-7213e5e79f96&lc=1033&id=293290&mkt=en-US&psi=skype&lw=1&cobrandid=2befc4b5-19e3-46e8-8347-77317a16a5a5&client_flight=ReservedFlight33%2CReservedFlight67" target="_blank">
                                                    <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #3699ff; ">
                                                        Skype
                                                    </div>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col px-6 py-8 rounded-xl mb-7 sub-hed-card d-flex align-items-center" style="background-color: #ffeb3b54 !important;">
                                            <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-center search-inquiry yellow-color-svg">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/MC.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="https://suite.smarttech-prod.com/login" target="_blank">
                                                    <div class="tutors" style="margin-left: 15px; font-size:15px; line-height:20px; color: #FFA800; ">
                                                        Smart Notebook
                                                    </div>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="col bg-light-danger px-6 mb-7 py-8 rounded-xl mr-7 sub-hed-card" style="display: flex; align-items: center;">
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2 d-flex align-items-center">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"></path>
                                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <a href="https://scienceclinic-co-uk.zoom.us/signin#/login" target="_blank">
                                                <p class="text-danger font-weight-bold font-size-h6 mb-0" style="margin-left: 14px;font-size: 15px;">Zoom</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col bg-light-success mb-7 px-6 py-8 rounded-xl sub-hed-card" style="display: flex; align-items: center;">
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2 d-flex align-items-center">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                                    </g>
                                                </svg>
                                            </span>
                                            <a href="https://scienceclinic.ediface.org/" target="_blank">
                                                <div class="text-success font-weight-bold font-size-h6 mb-0" style="margin-left: 14px;">
                                                    LMS
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="response_id">

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
<script>
    function editUrl(id) {
        $.ajax({
            type: "get",
            url: "{{route('edit-merithub-link')}}",
            data: {
                'id': id,
                '_token': '{{ csrf_token() }}'
            },
            success: function(res) {
                $.confirm({
                    title: 'Science Clinic Whiteboard',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Enter Science Clinic Whiteboard Link</label>' +
                        '<input type="text" placeholder="Enter link" class="link form-control" value="' + res.data.merithub_link + '"/>' +
                        '<span class="text-danger" id="error_link"></span>' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function() {
                                var link = $('.link').val();
                                var temp = 0;
                                $('#error_link').html('');
                                if (link == "") {
                                    $('#error_link').html('Link is required.');
                                    temp++;
                                } else {
                                    if (!validateLink(link)) {
                                        $('#error_link').html('Please enter valid Link.');
                                        temp++;
                                    }
                                }
                                if (temp == 0) {
                                    $.ajax({

                                        type: "post",

                                        url: "{{route('update-merithub-link')}}",

                                        data: {
                                            'link': link,
                                            '_token': '{{ csrf_token() }}'
                                        },

                                        success: function(res) {
                                            if (res.status == 1) {
                                                toastr.success(res.error_msg);
                                                AjaxList();
                                            } else {
                                                toastr.success(res.error_msg);
                                            }
                                        }

                                    })
                                } else {
                                    return false;
                                }
                            }
                        },
                        cancel: function() {},
                    },
                    onContentReady: function() {
                        var jc = this;
                        this.$content.find('form').on('submit', function(e) {
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click');
                        });
                    }
                });
            }

        })
    }

    function deleteUrl(id) {
        $.confirm({
            title: 'Confirm!',
            content: 'Are Sure Want to Delete?',
            buttons: {
                confirm: function() {
                    $.ajax({
                        type: "post",
                        url: "{{route('delete-merithub-link')}}",
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}'
                        },

                        success: function(res) {
                            if (res.status == 1) {
                                toastr.success(res.error_msg);
                                $('.add-link').attr('style', 'display:block');
                                AjaxList();
                            } else {
                                toastr.success(res.error_msg);
                            }
                        }

                    })
                },
                cancel: function() {}
            }
        });


    }

    AjaxList();

    function AjaxList() {
        $.ajax({

            type: "GET",

            url: "{{'tutor-online-tutoring-ajax'}}",

            success: function(res) {
                $('#response_id').html("");

                $('#response_id').html(res);

            }

        })

        return false;

    }

    function validateLink(link) {

        var expr = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;

        return expr.test(link);

    }
    $('.add-link').on('click', function() {
        $.confirm({
            title: 'Science Clinic Whiteboard',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Enter Science Clinic Whiteboard Link</label>' +
                '<input type="text" placeholder="Enter link" class="link form-control"/>' +
                '<span class="text-danger" id="error_link"></span>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var link = $('.link').val();
                        var temp = 0;
                        $('#error_link').html('');
                        if (link == "") {
                            $('#error_link').html('Link is required.');
                            temp++;
                        } else {
                            if (!validateLink(link)) {
                                $('#error_link').html('Please enter valid Link.');
                                temp++;
                            }
                        }
                        if (temp == 0) {
                            $.ajax({

                                type: "post",

                                url: "{{route('add-merithub-link')}}",

                                data: {
                                    'link': link,
                                    '_token': '{{ csrf_token() }}'
                                },

                                success: function(res) {
                                    if (res.status == 1) {
                                        toastr.success(res.error_msg);
                                        $('.add-link').attr('style', 'display:none');
                                        AjaxList();
                                    } else {
                                        toastr.success(res.error_msg);
                                    }
                                }

                            })
                        } else {
                            return false;
                        }
                    }
                },
                cancel: function() {},
            },
            onContentReady: function() {
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click');
                });
            }
        });
    });
    toastr.options.closeButton = true;
    toastr.options.tapToDismiss = false;
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
</script>
@endsection
@extends('layouts.master')
@section('title', 'Testimonial Master')
@section('content')
<style>
    .error {

        color: red;

    }
</style>

<link rel="stylesheet" href="{{ asset('assets/css/jquery-confirmation/css/jquery-confirm.min.css') }}">

<link href="{{ asset('assets/css/pages/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">



<style>
    .daterangepicker {

        z-index: 999999 !important;

    }
</style>

<div class="d-flex flex-column-fluid">

    <div class="container-fluid">

        <div class="d-flex flex-row">

            <div class="flex-row-fluid" id="personam_id">

                <div class="card card-custom card-stretch">

                    <!--begin::Header-->

                    <div class="card-header py-3">

                        <div class="card-title align-items-start flex-column">

                            <h3 class="card-label font-weight-bolder text-dark">Testimonial List</h3>

                        </div>

                        <div class="card-toolbar">

                            <!--begin::Dropdown-->

                            <div class="dropdown dropdown-inline mr-2">

                                <button id="kt_demo_panel_toggle" type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="svg-icon svg-icon-md">

                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                <rect x="0" y="0" width="24" height="24"></rect>

                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>

                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>

                                            </g>

                                        </svg>

                                        <!--end::Svg Icon-->

                                    </span>Search</button>

                                <!--begin::Dropdown Menu-->



                            </div>

                            <!--end::Dropdown-->

                            <!--begin::Button-->

                            <a href="javascript:void(0)" class="btn btn-primary mr-2" id="create-new" data-toggle="modal" data-target="#testimonial-modal" title="Add Testimonial">

                                <span class="svg-icon svg-icon-md">

                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->

                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                            <rect x="0" y="0" width="24" height="24"></rect>

                                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>

                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>

                                        </g>

                                    </svg>

                                    <!--end::Svg Icon-->

                                </span>New Record</a>

                            <!--end::Button-->

                        </div>



                    </div>

                    <div class="card-body">

                        <div class="table-responsive" id="response_id">



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

<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10 ">

    <!--begin::Header-->

    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7" kt-hidden-height="47">

        <h4 class="font-weight-bold m-0">Search</h4>

        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">

            <i class="ki ki-close icon-xs text-muted"></i>

        </a>

    </div>

    <!--end::Header-->

    <!--begin::Content-->

    <div class="offcanvas-content">

        <!--begin::Wrapper-->

        <div class="form-group row">

            <label class="col-4 col-form-label">Author Name</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Search Author Name" type="text" name="author_name" id="author_name" autocomplete="off">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-4 col-form-label">Description</label>

            <div class="col-8">

                <input class="form-control" placeHolder="Search Description" type="text" name="description" id="description" autocomplete="off">

            </div>

        </div>

        <div class="form-group row">

            <label class="col-4 col-form-label">Created Date</label>

            <div class="col-8">

                <div class="input-group">

                    <input type="text" name="created_date" id="created_date" class="form-control" placeholder="Created Date" autocomplete="off">

                </div>

            </div>

        </div>

        <!--end::Wrapper-->

        <!--begin::Purchase-->

        <div class="offcanvas-footer" kt-hidden-height="38">

            <div class="row">

                <div class="col-6">

                    <a class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase search_id">Apply</a>



                </div>

                <div class="col-6">

                    <a class="btn btn-block btn-secondary btn-shadow font-weight-bolder text-uppercase clear">Cancel</a>

                </div>

            </div>

        </div>

        <!--end::Purchase-->

    </div>

    <!--end::Content-->

</div>

<div class="modal fade" id="testimonial-modal" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <i aria-hidden="true" class="ki ki-close"></i>

                </button>

            </div>

            <form id="testimonialForm" name="testimonialForm" class="form-horizontal">



                <div class="modal-body">

                    <div class="form-group row">

                        <label for="name" class="col-md-4 col-form-label">Author Name<span class="text-danger">*</span></label>

                        <div class="col-md-12">

                            <input type="text" name="author_name" class="form-control" value="" id="author-add" maxlength="30" placeholder="Author Name">

                            <span class="author_name error_msg error" id="author_error"></span>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Description<span class="text-danger">*</span></label>

                        <div class="col-md-12">
                            <textarea placeholder="Description" id="description-add" class="form-control" data-msg="Description"></textarea>

                            <span class="form-text error description_error" id="description_error">{{ $errors->first('description') }}</span>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="btn-save" value="create" title="Submit">Submit

                    </button>

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" aria-hidden="true" title="Cancel">Cancel</button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade testimonial-edit" id="editTestimonial-modal" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Edit Testimonial</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <i aria-hidden="true" class="ki ki-close"></i>

                </button>

            </div>

            <form id="formEdit" name="formEdit" class="form-horizontal" Method="GET">

                @method('put')

                <div class="modal-body">

                    <input type="hidden" name="id" id="testimonial_id_edit">

                    <div class="form-group row">

                        <label for="name" class="col-md-4 col-form-label">Author Name<span class="text-danger">*</span></label>

                        <div class="col-md-12">

                            <input type="text" name="author_name" class="form-control" data-msg="author_name" maxlength="30" value="author_name" id="author-edit" placeholder="Author Name">

                            <span class="author_name error_msg error" id="author_error1">{{ $errors->first('author_name') }}</span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Description<span class="text-danger">*</span></label>


                            <textarea placeholder="Description" value="description" id="description-edit" data-msg="Description"></textarea>

                            <span class="form-text error description_error1" id="description_error1">{{ $errors->first('description') }}</span>

                        </div>
                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" id="btn-update" value="update" title="Update">Update

                        </button>

                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" aria-hidden="true" title="Cancel">Cancel</button>

                    </div>

            </form>

        </div>

    </div>

</div>
@endsection

@section('page-js')
<script src="{{ asset('assets/js/pages/jquery-confirmation/js/jquery-confirm.min.js') }}"></script>

<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.9') }}"></script>

<script src="{{ asset('assets/js/pages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    $(".charCls").keypress(function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    var _AJAX_LIST = "{{ route('testimonial-ajax') }}";

    CKEDITOR.replace('description-add');
    CKEDITOR.replace('description-edit');

    function ajaxList(page) {

        var author_name = $('#author_name').val();
        var description = $('#description').val();

        var created_date = $('#created_date').val();

        $('.ki-close').click();

        $.ajax({

            type: "GET",

            url: _AJAX_LIST,

            data: {

                'author_name': author_name,

                'description': description,

                'page': page,

                'created_date': created_date

            },

            success: function(res) {

                $('#response_id').html("");

                $('#response_id').html(res);

            }

        })

    }

    ajaxList(1);

    $('body').on('click', '.pagination a', function(event) {

        $('li').removeClass('active');

        $(this).parent('li').addClass('active');

        event.preventDefault();

        var myurl = $(this).attr('href');

        var page = $(this).attr('href').split('page=')[1];

        ajaxList(page);

    });



    $('.search_id').click(function(e) {

        ajaxList(1);

    })

    $('.clear').click(function(e) {

        $('#author_name').val("");
        $('#description').val("");

        $('#created_date').val("");

        ajaxList(1);

    })



    $('#btn-save').click(function(e) {

        var author_name = $('#author-add').val();

        // var description = CKEDITOR.instances['description-add'].getData();

        var cnt = 0;

        $('#author_error').html("");

        if (author_name.trim() == '') {

            $('#author_error').html("Author Name is required");

            cnt = 1;

        }
        var description = CKEDITOR.instances['description-add'].getData();

        $('.description_error').removeClass('is-valid');

        $('.description_error').html("");

        if (description.trim() == '') {

            var dataMSG = $('#description-add').attr('data-msg');

            $('.description_error').addClass('is-invalid').removeClass('is-valid');

            $('.description_error').html(dataMSG + ' is required.');

            cnt = 1;

        }

        console.log(cnt);

        if (cnt == 1) {

            return false;

        } else {
            var forms = $('#testimonialForm')[0];
            var newForms = new FormData(forms);
            newForms.append('_token', '{{ csrf_token() }}');
            newForms.append('description', description);
            $.ajax({

                data: newForms,

                url: "{{ route('testimonial.store') }}",

                type: "POST",
                contentType: false,
                processData: false,

                success: function(data) {
                    $('#testimonialForm')[0].reset();
                    $('#testimonial-modal').modal('hide');

                    toastr.success(data.error_msg);

                    ajaxList(1);

                },
                error: (jQxhr, textStatus, errorThrown) => {
                    toastr.error(jQxhr.responseJSON.error_msg);

                }


            });

        }

    })



    function editDetail(id) {

        if (id != "") {

            $.ajax({

                url: "{{ url('testimonial') }}/" + id + "/edit",

                type: "GET",
                success: function(res) {

                    var json = res.data[0];
                    $('#author-edit').val(json.author_name);

                    CKEDITOR.instances['description-edit'].setData(json.description);

                    $('#testimonial_id_edit').val(json.id);

                    $('#editTestimonial-modal').modal('show')

                }

            });

        }

    }

    $('#btn-update').click(function(e) {

        var author_name = $('#author-edit').val();
        var description = CKEDITOR.instances['description-edit'].getData();

        var id = $('#testimonial_id_edit').val();

        var cnt = 0;
        $('#author_error1').html("");

        if (author_name.trim() == '') {

            $('#author_error1').html("Author Name is required");

            cnt = 1;

        }
        $('#description_error1').html("");

        if (description.trim() == '') {

            $('#description_error1').html("Description is required");

            cnt = 1;

        }

        if (cnt == 1) {

            return false;

        } else {

            var fornData = $('#formEdit')[0];

            var newform = new FormData(fornData);

            newform.append('_token', '{{ csrf_token() }}');
            newform.append('description', description);

            newform.append('_method', "PUT");



            $.ajax({

                type: "POST",

                url: '{{ url('testimonial')}}/'+ id,

                data: newform,

                processData: false,

                contentType: false,

                success: function(res) {

                    $('#editTestimonial-modal').modal('hide');

                    toastr.success(res.error_msg);

                    var json = res.data[0];
                    // $('#author_name' + json.id).html(json.author_name);
                    // $('#description-edit' + json.id).html(json.description);
                    ajaxList(1);

                },

                error: function(data) {

                    toastr.error(data.error_msg);

                }

            });

        }

    })
</script>

<script type="text/javascript">
    function deleteDetail(Id) {
        event.preventDefault(); // prevent form submit
        $.confirm({
            title: 'Delete!',
            content: 'you want to delete this Testimonial?',
            buttons: {
                formSubmit: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            method: "POST",
                            url: "{{ url('testimonial') }}/" + Id,
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': "DELETE",
                                'id': Id
                            }
                        }).done(function(r) {
                            toastr.success(r.message);
                            ajaxList(1);
                        }).fail(function() {

                            toastr.error('Sorry, something went wrong. Please try again.');
                        });
                    }
                },
                cancel: function() {
                    //close
                },
            }
        });
    }

    $('#testimonial-modal').on('hidden.bs.modal', function() {

        $('#author_error').html("")
        $('#description_error').html("")
        var description = CKEDITOR.instances['description-add'].setData();

        $('#testimonialForm')[0].reset();

    })

    $('#editTestimonial-modal').on('hidden.bs.modal', function() {

        $('#author_error1').html("");
        $('#description_error1').html("");
        var description = CKEDITOR.instances['description-edit'].setData();

        $('#formEdit')[0].reset();

    })



    $(function() {

        var start = moment().subtract(29, 'days');

        var end = moment();

        $('#created_date').daterangepicker({
            autoUpdateInput: false,
            buttonClasses: ' btn',

            applyClass: 'btn-primary',

            cancelClass: 'btn-secondary',

            startDate: start,

            endDate: end,

            ranges: {

                'Today': [moment(), moment()],

                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

                'Last 7 Days': [moment().subtract(6, 'days'), moment()],

                'Last 30 Days': [moment().subtract(29, 'days'), moment()],

                'This Month': [moment().startOf('month'), moment().endOf('month')],

                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]

            }

        }, function(start, end, label) {

            $('#created_date .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end
                .format('MM/DD/YYYY'));

        });

    })

    $('body').on('click', '.view-detail', function(e) {
        var dataId = $(this).attr('data-id');
        var htmls = $('#desc' + dataId).text();
        $.confirm({
            title: 'Description!',
            content: htmls,

        });
    })


    $('#kt_demo_panel_toggle').click(function(e) {

        $('#created_date').val("");

    })
</script>
@endsection
@extends('layouts.master')
@section('title', 'Add Blog')
@section('content')
<style>
    .remove-btn1 {
        margin-top: 26.5px;
    }

    .error {
        color: red;
    }
</style>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">

        <div class="d-flex flex-row">

            <div class="flex-row-fluid">
                <div class="card card-custom card-stretch">

                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Add Blog Master</h3>
                        </div>
                    </div>

                    <form class="form" id="submitid" method="post" action="{{ route('logo-master.store') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type <span class="text-danger">*</span></label>
                                        <select class="form-control validate_field" id="type" name="type" data-msg="Type">
                                            <option value="">Select Type</option>
                                            <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>First</option>
                                            <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Second</option>
                                        </select>
                                        <span class="form-text error type_error" id="type_error">{{ $errors->first('type')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <div>
                                            <input type="file" name="image" class="form-control validate_field" data-msg="Image" id="image" accept=".png, .jpg, .jpeg">
                                            <span class="form-text error image_error" id="image_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link <span class="text-danger">*</span></label>
                                        <input type="url" name="link" class="form-control validate_field" id="link" placeholder="https://example.com" value="{{ old('link') }}">
                                        <span class="form-text error link_error" id="link_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="add_logo" class="btn btn-primary mr-2" style="background-color:#3498db !important">Submit</button>
                            <a class="btn btn-secondary" href="{{ url('blog-master') }}">Cancel</a>

                        </div>
                        <!--end::Body-->

                    </form>
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Subject List-->
</div>
<!--end::Container-->
@endsection
@section('page-js')
<script>
    $(".charCls").keypress(function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $(".txtOnly").keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
    $('#add_logo').click(function(e) {

        var type = $('#type').val();
        var image = $('#image').prop('files');
        var link = $('#link').val();

        var temp = 0;

        if (type == '') {
            $('#type_error').html("Type is required");
            temp++;
        } else {
            $('#type_error').html("");
        }

        if (image.length == 0) {
            $('#image_error').html("Image is required");
            temp++;
        }

        if (link == '') {
            $('#link_error').html("Link is required");
            temp++;
        } else {
            $('#link_error').html("");
        }

        var urlPattern = /^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/\S*)?$/;

        if (link === '') {
            $('#link_error').html("Link is required");
            temp++;
        } else if (!urlPattern.test(link)) {
            $('#link_error').html("Please enter a valid URL (e.g., https://example.com)");
            temp++;
        } else {
            $('#link_error').html("");
        }


        if (temp == 0) {

            return true;
        } else {
            return false;
        }
    })
</script>

@endsection

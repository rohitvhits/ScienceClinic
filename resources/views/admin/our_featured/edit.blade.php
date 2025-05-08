@extends('layouts.master')
@section('title', 'Edit Our Featured')
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
                            <h3 class="card-label font-weight-bolder text-dark">Edit Our Featured</h3>
                        </div>
                    </div>

                    <form class="form" id="submitid" method="post" action="{{ route('our-featured-update', $query->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input placeholder="Title" class="form-control txtOnly" autocomplete="off" id="title" type="text" data-msg="Title" value="{{ old('title', $query->title)}}" name="title" maxlength=255>
                                        <span class="form-text error title_error" id="title_error">{{ $errors->first('title')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <div>
                                            <input type="file" name="image" class="form-control validate_field" data-msg="Image" id="image" accept=".png, .jpg, .jpeg">
                                            @if($query->image)
                                                <img src="{{ $query->image }}" width="50" height="50" alt="Current Image">
                                            @endif
                                            <span class="form-text error image_error" id="image_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link <span class="text-danger">*</span></label>
                                        <input type="url" name="link" class="form-control validate_field" id="link" placeholder="https://example.com" value="{{ old('link', $query->link) }}">
                                        <span class="form-text error link_error" id="link_error"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" id="add_our_featured" class="btn btn-primary mr-2" style="background-color:#3498db !important">Submit</button>
                            <a class="btn btn-secondary" href="{{ url('our-featured') }}">Cancel</a>
                        </div>
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
    $('#add_our_featured').click(function(e) {

        var title = $('#title').val();
        var image = $('#image').prop('files');
        var link = $('#link').val();

        var temp = 0;

        if (title.trim() == '') {
            $('#title_error').html("Title is required");
            temp++;
        } else {
            $('#title_error').html("");
        }

        if (image.length == 0 && !@json($query->image)) {
            $('#image_error').html("Image is required");
            temp++;
        }
        if (link.trim() == '') {
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

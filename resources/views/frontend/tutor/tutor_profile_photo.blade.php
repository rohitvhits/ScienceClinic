@extends('layouts.master')
@section('title', 'Profile Photo')
@section('content')
<link href="{{asset('front/css/cropper.css')}}" rel="stylesheet" />
<style>
    .add-subject {
        position: absolute;
        right: 0px;
    }

    .form-data .col-md-6,
    .form-data .col-md-12 {
        margin-bottom: 23px;
    }

    .inputbar-padding {
        padding-top: 10px !important;
    }

    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 700px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
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

                            <h3 class="card-label font-weight-bolder text-dark">My Photos</h3>

                        </div>
                        <form id="profileform" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative">
                                <input type="file" class="input-upload-cus" name="profile" id="profile" class="form-control">
                                <div class="upload-photo-main">
                                    <i class="fa fa-plus plus-sign-upload"></i> <span>Upload Photo</span>
                                </div>
                            </div>
                            <span class="text-danger" id="error_image"></span>
                            <input type="hidden" name="crop_image" id="crop-image">
                        </form>
                    </div>

                    <div class="card-body">
                        <h6 class="text-center">Please upload your most recent photo</h6>
                        <div id="loadingDiv" style="display: none"></div>
                        <div class="text-center user-image">
                            <img src="{{Auth::user()->profile_photo}}" id="srcimage" style="height: 150px; width: 150px; margin: auto;">
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
<div class="modal fade" id="modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="padding-top: 180px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img src="" id="sample_image" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script src="{{ asset('front/js/cropper.js')}}"></script>
<script>
    var hideLoader = function() {
        $("#loadingDiv").hide();
        $('.user-image').show();
    }
    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#profile').change(function(event) {
        var files = event.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            // viewMode: 3,
            // preview: '.preview',
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function() {
        $modal.modal('hide');
        canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 600
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $('#crop-image').val(base64data);
                showImage();
            };
        });
    });
    function showImage(event) {
        var output = document.getElementById('srcimage');

        var profileImage = $('#profile').prop('files');
        var temp = 0;
        if (profileImage.length == 0) {
            $('#error_image').html('Please Select Profile Photo');
            temp++
        } else {
            if (profileImage.length != 0) {
                var fileUploadPath = profileImage[0].name;

                var extension = fileUploadPath.substring(fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (extension == 'jpg' || extension == 'png' || extension == 'jpeg') {
                    $('#error_image').html("");
                    // output.src = URL.createObjectURL(event.target.files[0]);

                } else {
                    $('#error_image').html("Photo only allows image types of PNG, JPG, JPEG");
                    temp++;
                }
            }
        }
        if (temp == 0) {
            $.ajax({
                url: "{{route('update-tutor-image')}}",
                type: "POST",
                enctype: 'multipart/form-data',
                data: new FormData($('#profileform')[0]),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.user-image').hide();
                    $("#loadingDiv").show();
                },
                complete: hideLoader,
                success: function(result) {
                    if (result) {
                        toastr.success(result.success_msg);
                        $('#sidebar_image_header').css({
                            "background-image": "url(" + result.data + ")"
                        });
                        $('#srcimage').attr('src', result.data);
                        $("#profile").val('');

                    } else {
                        toastr.error(result.error_msg);
                    }
                }
            });
        } else {
            return false;
        }

    }
</script>

@endsection
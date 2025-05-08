@extends('layouts.master')
@section('title', 'Add Sub Subject')
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

                            <h3 class="card-label font-weight-bolder text-dark">Add Sub Subject</h3>

                        </div>

                    </div>



                    <form class="form" id="submitid" method="post" action="{{route('sub-subject-master.store')}}" enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">

                            <div class="card-title align-items-start flex-column">

                                <h4 class="card-label font-weight-bolder text-dark">Banner Information</h4>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="exampleSelectd">Select Subject <span class="text-danger">*</span></label>

                                        <select class="form-control validate_field main_subject" name="main_subject" id="main_subject" data-msg="Subject">

                                            <option value="">Select Subject</option>

                                            @foreach($query as $val)

                                            <option value="{{$val->id}}">{{$val->main_title}}</option>

                                            @endforeach

                                        </select>

                                        <span class="form-text error main_subject_error">{{ $errors->useredit->first('main_subject')}}</span>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Title <span class="text-danger">*</span></label>

                                        <input class="charCls form-control validate_field" placeholder="Title" autocomplete="off" id="title" type="text" data-msg="Title" name="title">

                                        <span class="form-text error title_error">{{ $errors->useredit->first('title')}}</span>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Sub Title</label>

                                        <input class="form-control validate_field" placeholder="Sub Title" autocomplete="off" id="sub_title" type="text" data-msg="Sub Title" name="sub_title">

                                        <span class="form-text error sub_title_error">{{ $errors->useredit->first('sub_title')}}</span>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>Sub Title 2</label>

                                        <input class="form-control validate_field" placeholder="Sub Title 2" autocomplete="off" id="sub_title_two" type="text" data-msg="Sub Title Two" name="sub_title_two">

                                        <span class="form-text error sub_title_two_error">{{ $errors->useredit->first('sub_title_two')}}</span>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div id="solumailAddMore">

                                        @php

                                        $uniqid = uniqid();

                                        @endphp

                                        <div class="scopy_id" id="{{ $uniqid }}">

                                            <div class="row">

                                                <div class="col-md-6 mb-4">

                                                    <div class="form-group">

                                                        <label>Title</label>

                                                        <input placeholder="Title" maxlength="255" class="form-control validate_field section_one_title_more{{ $uniqid }}_error" data-id="{{ $uniqid }}" autocomplete="off" id="section_one_title{{ $uniqid }}" type="text" data-msg="Section One Title" name="section_one_title_more[]">

                                                        <span class="form-text error section_one_title_more{{ $uniqid }}_error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-md-5 mb-4">

                                                    <div class="form-group">

                                                        <label>Link</label>

                                                        <input placeholder="Link" class="form-control validate_field link_more{{ $uniqid }}_error" autocomplete="off" data-id="{{ $uniqid }}" id="link_more{{ $uniqid }}" type="text" data-msg="Link" maxlength="255" name="link_more[]">

                                                        <span class="form-text error link_more{{ $uniqid }}_error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-md-1 text-end p-0" style="display:none" id="remove_ids">

                                                    <a class="btn btn-danger  remove-btn1 mb-4" href="javascript:void(0)" onclick="removeSolution('{{ $uniqid }}');">Remove</a>

                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12 text-end">

                                    <a class="btn btn-primary float-right" href="javascript:void(0)" onclick="addMoreSolution();" style="width: 81px;">Add</a>

                                </div>

                            </div>

                            <hr>

                            <div class="card-title align-items-start flex-column">

                                <h4 class="card-label font-weight-bolder text-dark">Section One</h4>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Title</label>

                                        <input placeholder="Title" class="form-control validate_field" autocomplete="off" id="title_section_one" type="text" data-msg="Title" name="title_section_one">

                                        <span class="form-text error title_section_one_error">{{ $errors->useredit->first('title_section_one')}}</span>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Image</label>

                                        <div>

                                            <input type="file" name="subject_image" data-msg="Image" accept=".png, .jpg, .jpeg">

                                            <span class="form-text error subject_image_error"></span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>Description</label>

                                        <textarea placeholder="Description" name="subject_description" id="subject_description" data-msg="Description"></textarea>

                                        <span class="form-text error subject_description_error">{{ $errors->useredit->first('subject_description')}}</span>

                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="card-title align-items-start flex-column">

                                <h4 class="card-label font-weight-bolder text-dark">Section Two</h4>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div id="solumailAddMoreSectionTwo">

                                        @php

                                        $uniqid = uniqid();

                                        @endphp

                                        <div class="scopy_id_section_two" id="{{ $uniqid }}">

                                            <div class="row">

                                                <div class="col-md-6 mb-4">

                                                    <div class="form-group">

                                                        <label>Title</label>

                                                        <input placeholder="Title" class="form-control validate_field title_section_two{{ $uniqid }}" autocomplete="off" data-id="{{ $uniqid }}" id="title_section_two{{ $uniqid }}" type="text" data-msg="Title Section Two" maxlength="255" name="title_section_two[]">

                                                        <span class="form-text error title_section_two{{ $uniqid }}_error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-md-5 mb-4">

                                                    <div class="form-group">

                                                        <label>Description</label>

                                                        <textarea type="text" placeholder="Description" data-id="{{ $uniqid }}" class="form-control validate_field description_section_two{{ $uniqid }}" name="description_section_two[]" id="description_section_two{{ $uniqid}}" data-msg="Description"></textarea>

                                                        <span class="form-text error description_section_two{{ $uniqid }}_error"></span>

                                                    </div>

                                                </div>



                                                <div class="col-md-1 text-end p-0" style="display:none" id="remove_ids_section_two">

                                                    <a class="btn btn-danger  remove-btn1 mb-4" href="javascript:void(0)" onclick="removeSolution('{{ $uniqid }}');">Remove</a>

                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12 text-end">

                                    <a class="btn btn-primary float-right" href="javascript:void(0)" onclick="addMoreSolutionSectionTwo();" style="width: 81px;">Add</a>

                                </div>

                            </div>

                        </div>

                        <div class="card-footer">

                            <button type="button" id="add_subject" class="btn btn-primary mr-2" style="background-color:#3498db !important">Submit</button>

                            <a class="btn btn-secondary" href="{{ url('sub-subject-master')}}">Cancel</a>

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

<script src="{{asset('assets/Modulejs/subsubject.js')}}"></script>



<script>
    var _Add_SUBJECT = "{{route('sub-subject-master.store')}}";
</script>

<script>
    $(".charCls").keypress(function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    // Class definition

    var uniqid = '{{ uniqid() }}';



    CKEDITOR.replace('subject_description');

    CKEDITOR.replace('description_section_two{{$uniqid}}');



    function addMoreSolution() {

        var html_solution = '';

        var uniqid = '{{ uniqid() }}';

        var copyLength = $('.scopy_id').length;

        var length = uniqid + '' + copyLength + 1;

        var lengths = "'" + length + "'";

        var htmls = '<div class="scopy_id" id="' + length + '">' +

            '<div class="row">' +

            '<div class="col-md-6 mb-4"><div class="form-group"><input placeholder="Title" class="form-control validate_field section_one_title_more{{ $uniqid }}_error" data-id="{{ $uniqid }}" autocomplete="off" id="section_one_title{{ $uniqid }}" type="text" data-msg="Section One Title" name="section_one_title_more[]" maxlength="255"><span class="form-text error section_one_title_more{{ $uniqid }}_error"></span></div></div>' +

            '<div class="col-md-5 mb-4"><div class="form-group"><input placeholder="Link" class="form-control validate_field link_more{{ $uniqid }}_error" autocomplete="off" data-id="{{ $uniqid }}" id="link_more{{ $uniqid }}" type="text" data-msg="Link" name="link_more[]"><span class="form-text error link_more{{ $uniqid }}_error"></span></div></div>' +

            '<div class="col-md-1 text-end p-0" id="remove_ids">' +

            '<a class="btn btn-danger" href="javascript:void(0)" onclick="removeSolution(' + lengths +

            ');">Remove</a>' +

            '</div>' +

            '</div>' +

            '</div>'

        $('#solumailAddMore').append(htmls);

        if ($('.scopy_id').length > 1) {

            $('#remove_ids').attr('style', '');

        }

    }



    function addMoreSolutionSectionTwo() {

        var html_solution = '';

        var uniqid = '{{ uniqid() }}';

        var copyLength = $('.scopy_id_section_two').length;

        var length = uniqid + '' + copyLength + 1;

        var lengths = "'" + length + "'";

        var htmls = '<div class="scopy_id_section_two" id="' + length + '">' +

            '<div class="row">' +

            '<div class="col-md-6 mb-4"><div class="form-group"><input placeholder="Title" class="form-control validate_field title_section_two' + length + '" autocomplete="off" data-id="' + length + '" id="title_section_two' + length + '" type="text" data-msg="Title Section Two" name="title_section_two[]" maxlength="255"><span class="form-text error title_section_two' + length + '_error"></span> </div></div>' +

            '<div class="col-md-5 mb-4"><div class="form-group"><textarea type="text" placeholder="Descritpion" data-id="' + length + '" class="form-control validate_field description_section_two' + length + '" name="description_section_two[]" id="description_section_two' + length + '" data-msg="Description"></textarea><span class="form-text error description_section_two' + length + '_error"></span></div></div>' +

            '<div class="col-md-1 text-end p-0" id="remove_ids">' +

            '<a class="btn btn-danger" href="javascript:void(0)" onclick="removeSolutionSection(' + lengths +

            ');">Remove</a>' +

            '</div>' +

            '</div>'



            +

            '</div>'

        $('#solumailAddMoreSectionTwo').append(htmls);

        var id = '#description_section_two' + length;

        CKEDITOR.replace('description_section_two' + length);



        if ($('.scopy_id_section_two').length > 1) {

            $('#remove_ids_section_two').attr('style', '');



        }

    }





    function removeSolution(id) {

        var copyLength = $('.scopy_id').length;

        $('#' + id).remove();

        if ($('.scopy_id').length == 1) {

            $('#remove_ids').attr('style', 'display:none');

        }



    }



    function removeSolutionSection(id) {

        var copyLength = $('.scopy_id_section_two').length;

        $('#' + id).remove();

        if ($('.scopy_id_section_two').length == 1) {

            $('#remove_ids_section_two').attr('style', 'display:none');

        }

    }
</script>



@endsection
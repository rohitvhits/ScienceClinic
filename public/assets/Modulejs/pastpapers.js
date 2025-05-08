/******/ (function (modules) { // webpackBootstrap

/******/ 	// The module cache

/******/ 	var installedModules = {};

/******/

/******/ 	// The require function

/******/ 	function __webpack_require__(moduleId) {

/******/

/******/ 		// Check if module is in cache

/******/ 		if (installedModules[moduleId]) {

/******/ 			return installedModules[moduleId].exports;

            /******/

        }

        /******/ 		// Create a new module (and put it into the cache)
        
        /******/ 		var module = installedModules[moduleId] = {
        
        /******/ 			i: moduleId,
        
        /******/ 			l: false,
        
        /******/ 			exports: {}
        
                    /******/
        
                };
        
        /******/
        
        /******/ 		// Execute the module function
        
        /******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        
        /******/
        
        /******/ 		// Flag the module as loaded
        
        /******/ 		module.l = true;
        
        /******/
        
        /******/ 		// Return the exports of the module
        
        /******/ 		return module.exports;
        
                /******/
        
            }
        
        /******/
        
        /******/
        
        /******/ 	// expose the modules object (__webpack_modules__)
        
        /******/ 	__webpack_require__.m = modules;
        
        /******/
        
        /******/ 	// expose the module cache
        
        /******/ 	__webpack_require__.c = installedModules;
        
        /******/
        
        /******/ 	// define getter function for harmony exports
        
        /******/ 	__webpack_require__.d = function (exports, name, getter) {
        
        /******/ 		if (!__webpack_require__.o(exports, name)) {
        
        /******/ 			Object.defineProperty(exports, name, {
        
        /******/ 				configurable: false,
        
        /******/ 				enumerable: true,
        
        /******/ 				get: getter
        
                /******/
        
            });
        
                    /******/
        
                }
        
                /******/
        
            };
        
        /******/
        
        /******/ 	// getDefaultExport function for compatibility with non-harmony modules
        
        /******/ 	__webpack_require__.n = function (module) {
        
        /******/ 		var getter = module && module.__esModule ?
        
        /******/ 			function getDefault() { return module['default']; } :
        
        /******/ 			function getModuleExports() { return module; };
        
        /******/ 		__webpack_require__.d(getter, 'a', getter);
        
        /******/ 		return getter;
        
                /******/
        
            };
        
        /******/
        
        /******/ 	// Object.prototype.hasOwnProperty.call
        
        /******/ 	__webpack_require__.o = function (object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
        
        /******/
        
        /******/ 	// __webpack_public_path__
        
        /******/ 	__webpack_require__.p = "/";
        
        /******/
        
        /******/ 	// Load entry module and return exports
        
        /******/ 	return __webpack_require__(__webpack_require__.s = 3);
        
            /******/
        
        })
        
        /************************************************************************/
        
        /******/([
        
        /* 0 */
        
        /***/ (function (module, __webpack_exports__, __webpack_require__) {
        
        
        
                "use strict";
        
            /* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function () { return Pagination; });
        
                var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
        
        
        
                function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
        
        
        
        
        
                /***/
        
            }),
        
            /* 1 */,
        
            /* 2 */,
        
            /* 3 */
        
            /***/ (function (module, exports, __webpack_require__) {
        
        
        
                module.exports = __webpack_require__(4);
        
        
        
        
        
                /***/
        
            }),
        
            /* 4 */
        
            /***/ (function (module, __webpack_exports__, __webpack_require__) {
        
        
        
                "use strict";
        
                Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
        
            /* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__helpers_pagination_v2__ = __webpack_require__(0);
        
            /* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__js_helpers_validate_form__ = __webpack_require__(5);
        
                var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };
        
        
        
                function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
        
        
        
                
        
        
        
                $(document).ready(function () {
        
                   
        
                    if(typeof(_AJAX_LIST) != "undefined" ){
        
                       
        
                        AjaxList(1);
        
                    }
        
                    
        
                    $('input').attr('autocomplete', 'off');
        
                    var getUrlParameter = function getUrlParameter(sParam) {
        
                        var sPageURL = window.location.search.substring(1),
        
                            sURLVariables = sPageURL.split('&'),
        
                            sParameterName,
        
                            i;
        
        
        
                        for (i = 0; i < sURLVariables.length; i++) {
        
                            sParameterName = sURLVariables[i].split('=');
        
        
        
                            if (sParameterName[0] === sParam) {
        
                                return _typeof(sParameterName[1]) === undefined ? true : decodeURIComponent(sParameterName[1]);
        
                            }
        
                        }
        
                        return false;
        
                    };
        
        
        
                    // Modal Static
        
                    // ==========================================================
        
        
        
                    $(".modal").modal({
        
                        show: false,
        
                        backdrop: 'static'
        
                    });
        
        
        
                    // Toastr configuration
        
                    // ==========================
        
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
        
        
        
                    // Tippy
        
                    // ============================================================
        
        
        
        
        
                    // select2 initialize
        
                    // ============================================================
        
        
        
                    $(".select2").select2();
        
        
        
                    // Task List
        
                    // =========================================================
        
        
        
                    var objectName = $.trim($('#object').val());
        
                    var objectId = $.trim($('#objectId').val());
        
                    var appendTable = $.trim($('#appendTable').val());
        
        
        
                    $('body').on('keyup', '#username', function () {
        
                        Object(__WEBPACK_IMPORTED_MODULE_1__js_helpers_validate_form__["a" /* inputEmptyCheck */])('username', 'Email');
        
                    });
        
                    $('body').on('keyup', '#password', function () {
        
                        Object(__WEBPACK_IMPORTED_MODULE_1__js_helpers_validate_form__["a" /* inputEmptyCheck */])('password', 'Password');
        
                    });
        
        
        
                    $('body').on('click', '#add_subject', function (e) {
        
                        e.preventDefault();
        
                        var _self = this;
        
                        var validation_status = 0;
        
                        
                        var validation_filed_array = ['paper_category_id','paper_title','subject_id','paper_sub_title'];
        
                        for (var i = 0; i < validation_filed_array.length; i++) {
        
                            validation_status += parseInt(validatField($('#' + validation_filed_array[i] + '.validate_field')));
        
                        }
                        
                        var subject_paper_title = document.getElementsByName("subject_paper_title[]");
                        var upload_paper = document.getElementsByName("upload_paper[]");
                        var upload_mark_scheme = document.getElementsByName("upload_mark_scheme[]");
                       
                        
                        for (var z = 0; z < subject_paper_title.length; z++) {
                                            
                                if (subject_paper_title[z].value == '') {
                                        $("#subject_paper_title"+z).addClass('is-invalid');
                                    $(".subject_paper_title_error_" + z).html('Paper Year is required.');
                                        validation_status = 1;
                                }else{
                                    $("#subject_paper_title"+z).removeClass('is-invalid');
                                    $("#subject_paper_title"+z).addClass('valid');
                                    $(".subject_paper_title_error_"+z).html('');
                                }
                        }
                        
                        for (var z1 = 0; z1 < upload_paper.length; z1++) {
                                var file = $('#upload_paper'+z1).val().split('\\').pop();
                                if(file == ''){
                                    $('.upload_paper_error_'+z1).html("Upload is required.");
                                    validation_status = 1;
                                }else{
                                
                                    var FileUploadPath = file;
                                    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                
                                    if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx') {
                                        $('.upload_paper_error_'+z1).html("");
                                    } else {
                
                                        $('.upload_paper_error_'+z1).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                                        validation_status = 1;
                
                                    }
                                }
                        }
                         for (var z2 = 0; z2 < upload_mark_scheme.length; z2++) {
                                var file = $('#upload_mark_scheme'+z2).val().split('\\').pop();
                                if(file == ''){
                                    $('.upload_mark_scheme_error_'+z2).html("Upload is required.");
                                    validation_status = 1;
                                }else{
                                
                                    var FileUploadPath = file;
                                    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                
                                    if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx') {
                                        $('.upload_mark_scheme_error_'+z2).html("");
                                    } else {
                
                                        $('.upload_mark_scheme_error_'+z2).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                                        validation_status = 1;
                
                                    }
                                }
                        }
                         
        
                        if (validation_status == 0) {
                            $('#submitid').submit();
                        }else{
                            return false;
                        }
        
        
        
                });
        
                $('body').on('click', '.pagination a', function (event) {
        
                    $('li').removeClass('active');
        
                    $(this).parent('li').addClass('active');
        
                    event.preventDefault();
        
                    var myurl = $(this).attr('href');
        
                    var page = $(this).attr('href').split('page=')[1];
        
                    AjaxList(page);
        
                });
        
                $('body').on('click', '.delete-category', function (e) {
        
                    var dataId = $(this).attr('data-id');
        
                    
        
                    $.confirm({
        
                        title: 'Are you sure?',
        
                        columnClass:"col-md-6",
        
        
        
                        content: "you want to delete this past paper?",
        
                        buttons: {
        
                            formSubmit: {
        
                                text: 'Submit',
        
                                btnClass: 'btn-danger',
        
                                action: function () {
        
                                        $.ajax({
        
                                            method: "POST",
        
                                            url: _DELETE_URL + '/' + dataId,
        
                                            data:{
        
                                                '_token':_CSRF_TOKEN,
        
                                                '_method':"DELETE",
        
                                                'id':dataId
        
                                            }
        
        
        
                                        }).done(function (r) {
        
        
        
                                            toastr.success(r.error_msg);
        
                                               
        
                                                AjaxList(1);
        
                                        }).fail(function () {
        
                                            _self.setContent('Something went wrong. Contact Support.');
        
                                            toastr.error('Sorry, something went wrong. Please try again.');
        
                                        });
        
        
        
                                }
        
                            },
        
                            cancel: function () {
        
                                //close
        
                            },
        
                        },
        
                        onContentReady: function () {
        
                            // bind to events
        
        
        
                        }
        
                    });
        
                });
        
                
        
                
        
                $('body').on('click', '#edit_subject', function (e) {
        
                    e.preventDefault();
        
                    var _self = this;
        
                    var validation_status = 0;
        
                    
                    var validation_filed_array = ['paper_category_id','paper_title','subject_id','paper_sub_title'];
        
                    for (var i = 0; i < validation_filed_array.length; i++) {
        
                        validation_status += parseInt(validatField($('#' + validation_filed_array[i] + '.validate_field')));
        
                    }

                        
                        var subject_paper_title = document.getElementsByName("subject_paper_title[]");
                        var upload_paper = document.getElementsByName("upload_paper[]");
                        var upload_mark_scheme = document.getElementsByName("upload_mark_scheme[]");
                       
                        $('input[name^="subject_paper_title[]"]').each(function(){
                            var dataId = $(this).attr("data-id");
                            var fileU = $(this).val();
                            if(fileU == ''){
                                $("#subject_paper_title"+dataId).addClass('is-invalid');
                                $(".subject_paper_title_error_" + dataId).html('Paper Year is required.');
                                validation_status = 1;
                            }else{
                                
                                $("#subject_paper_title"+dataId).removeClass('is-invalid');
                                $("#subject_paper_title"+dataId).addClass('valid');
                                $(".subject_paper_title_error_"+dataId).html('');
                                    
                            }
                        });
                        
                        // for (var z = 0; z < subject_paper_title.length; z++) {            
                        //         if (subject_paper_title[z].value == '') {
                        //                 $("#subject_paper_title"+z).addClass('is-invalid');
                        //                 $(".subject_paper_title_error_"+z).html('Subject Title is required.');
                        //                 validation_status = 1;
                        //         }else{
                        //             $("#subject_paper_title"+z).removeClass('is-invalid');
                        //             $("#subject_paper_title"+z).addClass('valid');
                        //             $(".subject_paper_title_error_"+z).html('');
                        //         }
                        // }
                        
                        // for (var z1 = 0; z1 < upload_paper.length; z1++) {
                        //         var fileU = $("#upload_paperdata"+z1).val();
                        //         if(fileU == ''){
                        //             $('.upload_paper_error_'+z1).html("Upload is required.");
                        //             validation_status = 1;
                        //         }else{
                                   
                        //                 var file = $('#upload_paper'+z1).val().split('\\').pop();
                        //                 if(file != ''){
                        //                     var FileUploadPath = file;
                        //                     var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                            
                        //                     if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx') {
                        //                         $('.upload_paper_error_'+z1).html("");
                        //                     } else {
                            
                        //                         $('.upload_paper_error_'+z1).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                        //                             validation_status = 1;
                            
                        //                     }
                        //                 }
                                        
                        //         }
                        // }
                        $('input[name^="upload_paper[]"]').each(function(){
                            var dataId = $(this).attr("data-id");
                            var fileU = $('#upload_paperdata'+dataId).val();
                            if(fileU == ''){
                                $('.upload_paper_error_'+dataId).html("Upload is required.");
                                validation_status = 1;
                            }else{
                                
                                var file = $('#upload_paper'+dataId).val().split('\\').pop();
                                if(file != ''){
                                    var FileUploadPath = file;
                                    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                    
                                    if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx') {
                                        $('.upload_paper_error_'+dataId).html("");
                                    } else {
                    
                                        $('.upload_paper_error_'+dataId).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                                            validation_status = 1;
                    
                                    }
                                }
                                    
                            }
                        });
                        //  for (var z2 = 0; z2 < upload_mark_scheme.length; z2++) {
                        //         var fileD = $('#upload_mark_schemeData'+z2).val();
                        //         if(fileD == ''){
                        //             $('.upload_mark_scheme_error_'+z2).html("Upload is required.");
                        //             validation_status = 1;
                        //         }else{
                                    
                        //                 var file = $('#upload_mark_scheme'+z2).val().split('\\').pop();
                        //                 if(file != ''){
                        //                     var FileUploadPath = file;
                        //                     var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                        
                        //                     if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx') {
                        //                         $('.upload_mark_scheme_error_'+z2).html("");
                        //                     } else {
                        
                        //                         $('.upload_mark_scheme_error_'+z2).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                        //                         validation_status = 1;
                        
                        //                     }
                        //             }
                                        
                                    
                                    
                        //         }
                        // }
                        $('input[name^="upload_mark_scheme[]"]').each(function(){
                            var dataId = $(this).attr("data-id");
                            var fileU = $('#upload_mark_schemeData'+dataId).val();
                            if(fileU == ''){
                                $('.upload_mark_scheme_error_'+dataId).html("Upload is required.");
                                validation_status = 1;
                            }else{
                                
                                var file = $('#upload_mark_scheme'+dataId).val().split('\\').pop();
                                if(file != ''){
                                    var FileUploadPath = file;
                                    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                                    
                                    if (Extension == 'jpg' || Extension == 'png' || Extension == 'gif' || Extension == 'jpeg' || Extension == 'pptx' || Extension == 'pdf' || Extension == 'doc' || Extension == 'docx'){
                                        $('.upload_mark_scheme_error_'+dataId).html("");
                                    } else {
                    
                                        $('.upload_mark_scheme_error_'+dataId).html("Image only allows image types of PNG, JPG, JPEG, PPTX, PDF, DOC, DOCX");
                                            validation_status = 1;
                    
                                    }
                                }
                                    
                            }
                        });
        
                    if (validation_status == 0) {
        
                        $('#submitid').submit();
        
                }else{
        
                    return false;
        
                }
        
        
        
            });
        
            $('.search_id').click(function(e){
        
                AjaxList(1);
        
            })
        
            $('.clear').click(function(e){
        
                $('#title').val("");
        
                $('#created_date').val("");
        
                AjaxList(1);
        
            })
        
            });
        
        
        
            function validateLink(link){
        
                var expr = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
        
                return expr.test(link);
        
            }
        
        
        
            function AjaxList(page){
        
                $('.ki-close').click();
        
                var title = $('#title').val();
        
                var created_date = $('#created_date').val();
        
                
        
                $.ajax({
        
                    type: "GET",
        
                    url: _AJAX_LIST,
        
                    data: {
        
                        'title': title,
        
                        'page': page,
        
                        'created_date': created_date
        
                    },
        
                    success: function (res) {
        
                        $('#response_id').html("");
        
                        $('#response_id').html(res);
        
                    }
        
                })
        
                return false;
        
            }
        
        
        
        function validatField(elem) {
        
            var $this = elem;
        
        
        
        
        
            var elem_type = $this.get(0).tagName;
        
            var cur_elm_val = $this.val();
        
            var cur_err_msg = $this.attr('data-msg');
        
            var cur_elem_id = $this.attr('id');
        
        
        
            var cur_elem_name = $this.attr('name');
        
            var validation_status = 0;
        
            var cur_elem_data_type = "";
        
            if ($this.attr('data-type')) {
        
                cur_elem_data_type = $this.attr('data-type');
        
            }
        
            var time_valid = $this.hasClass('time-picker') ? true : false;
        
            var range_valid = $this.hasClass('training_datepicker') ? true : false;
        
            if (elem_type == 'SELECT') {
        
                $('.' + cur_elem_id + '_error').html('');
        
                if (cur_elm_val == '') {
        
                    $('#' + cur_elem_id).next('.select2-container').find('.select2-selection').addClass('is-invalid').removeClass('is-valid');
        
                    $('.' + cur_elem_id + '_error').html(cur_err_msg + ' is required.');
        
                    validation_status = 1;
        
                } else {
        
                    $('#' + cur_elem_id).next('.select2-container').find('.select2-selection').addClass('is-valid').removeClass('is-invalid');
        
                }
        
            }
        
            
            if (elem_type == "TEXTAREA") {
                $("." + cur_elem_id + "_error").html("");
                if (cur_elm_val.trim() == "" && !range_valid) {
                    console.log(cur_elem_id);
                    $("#" + cur_elem_id)
                        .addClass("is-invalid")
                        .removeClass("is-valid");
                    $("." + cur_elem_id + "_error").html(
                        cur_err_msg + " is required."
                    );
                    validation_status = 1;
                } else {
                    $("#" + cur_elem_id)
                        .removeClass("is-invalid")
                        .removeClass("is-valid");
                }
            }
            if (elem_type == 'INPUT') {
        
                var cur_elem_type = $this.attr('type');
        
                if (cur_elem_type == 'text') {
        
        
        
                    $('.' + cur_elem_id + '_error').html('');
        
                    if (cur_elm_val.trim() == '' && !range_valid) {
        
                        console.log(cur_elem_id);
        
                        $('#' + cur_elem_id).addClass('is-invalid').removeClass('is-valid');
        
                        $('.' + cur_elem_id + '_error').html(cur_err_msg + ' is required.');
        
                        validation_status = 1;
        
                    } else if (cur_elem_data_type != "") {
        
                        $('.' + cur_elem_id + '_error').html('');
        
                        if (isNaN(cur_elm_val)) {
        
                            $('#' + cur_elem_id).addClass('is-invalid').removeClass('is-valid');
        
                            $('.' + cur_elem_id + '_error').html(cur_err_msg + ' must be a number.');
        
                            validation_status = 1;
        
                        } else {
        
                            $('#' + cur_elem_id).addClass('is-valid').removeClass('is-invalid');
        
                        }
        
                    } else if (time_valid) {
        
                        validation_status = calculateTime($this);
        
                    } else if (range_valid) {
        
                        validation_status = dateValidation($this);
        
                    } else if (!range_valid) {
        
                        $('#' + cur_elem_id).addClass('is-valid').removeClass('is-invalid');
        
                    }
        
                } else if (cur_elem_type == 'radio') {
        
                    var cur_checked = $('input[name="' + cur_elem_name + '"]:checked').val();
        
                    $('.' + cur_elem_name + '_error').html('');
        
                    if (cur_checked == undefined) {
        
                        $('.' + cur_elem_name + '_error').html(cur_err_msg + ' is required.');
        
                        validation_status = 1;
        
                    }
        
                }
        
            }
        
            return validation_status;
        
        }
        
                /***/
        
            }),
        
            /* 5 */
        
            /***/ (function (module, __webpack_exports__, __webpack_require__) {
        
        
        
            "use strict";
        
            /* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function () { return selectEmptyCheck; });
        
            /* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function () { return inputEmptyCheck; });
        
            // <-- Start: Check Input Field Empty function -->
        
            // ==================================================
        
            function selectEmptyCheck(id, errorMgs) {
        
                var error = 0;
        
                if ($.trim($('#' + id).val()).length == 0) {
        
                    $('#' + id).closest('.form-group').find('.error').text(errorMgs + ' is required.');
        
                    $('#' + id).closest('.form-group').find('.select2-selection--multiple').attr('style', 'border:0 !important');
        
                    $('#' + id).closest('.form-group').find('.select2-container').css('background', '#fff');
        
                    $('#' + id).closest('.form-group').find('.select2-container').removeClass('is-valid').addClass('is-invalid');
        
                    $('#' + id).closest('.form-group').find('.select2-container .select2-selection__arrow').addClass('d-none');
        
                    $('#' + id).closest('.form-group').find('.select2-container--default .select2-selection--single').css('border', '0');
        
                    error++;
        
                } else {
        
                    $('#' + id).closest('.form-group').find('.error').text('');
        
                    $('#' + id).closest('.form-group').find('.select2-selection--multiple').attr('style', 'border:0 !important');
        
                    $('#' + id).closest('.form-group').find('.select2-container').css('background', '#fff');
        
                    $('#' + id).closest('.form-group').find('.select2-container').removeClass('is-invalid').addClass('is-valid');
        
                    $('#' + id).closest('.form-group').find('.select2-container .select2-selection__arrow').addClass('d-none');
        
                    $('#' + id).closest('.form-group').find('.select2-container--default .select2-selection--single').css('border', '0');
        
                }
        
                return error;
        
            }
        
            function inputEmptyCheck(id, errorMgs) {
        
        
        
                var error = 0;
        
                if ($.trim($('#' + id).val()).length == 0) {
        
                    $('#' + id).closest('.form-group').find('.error').text(errorMgs + ' is required.');
        
                    $('#' + id).removeClass('is-valid').addClass('is-invalid');
        
                    error++;
        
                } else {
        
                    $('#' + id).closest('.form-group').find('.error').text('');
        
                    $('#' + id).removeClass('is-invalid').addClass('is-valid');
        
                }
        
                return error;
        
            }
        
        
        
        
        
        
        
        
        
            /***/
        
        })
        
        ]);
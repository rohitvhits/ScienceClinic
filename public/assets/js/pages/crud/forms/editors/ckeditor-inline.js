/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************************!*\
  !*** ../demo1/src/js/pages/crud/forms/editors/ckeditor-inline.js ***!
  \*******************************************************************/

// Class definition

var KTCkeditorInline = function () {    
    // Private functions
    var demos = function () {
        InlineEditor
			.create( document.querySelector( '#kt-ckeditor-1' ) )
			.then( editor => {
				console.log( editor );
			} )
			.catch( error => {
				console.error( error );
			} );

        InlineEditor
			.create( document.querySelector( '#kt-ckeditor-2' ) )
			.then( editor => {
				console.log( editor );
			} )
			.catch( error => {
				console.error( error );
			} );

		InlineEditor
			.create( document.querySelector( '#kt-ckeditor-3' ) )
			.then( editor => {
				console.log( editor );
			} )
			.catch( error => {
				console.error( error );
			} );

		InlineEditor
			.create( document.querySelector( '#kt-ckeditor-4' ) )
			.then( editor => {
				console.log( editor );
			} )
			.catch( error => {
				console.error( error );
			} );

		InlineEditor
			.create( document.querySelector( '#kt-ckeditor-5' ) )
			.then( editor => {
				console.log( editor );
			} )
			.catch( error => {
				console.error( error );
			} );
	}

    return {
        // public functions
        init: function() {
			demos(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTCkeditorInline.init();
});
/******/ })()
;
//# sourceMappingURL=ckeditor-inline.js.map
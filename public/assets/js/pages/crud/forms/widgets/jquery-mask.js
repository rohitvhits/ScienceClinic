/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************************************!*\
  !*** ../demo1/src/js/pages/crud/forms/widgets/jquery-mask.js ***!
  \***************************************************************/

// Class definition

var KTMaskDemo = function () {

    // private functions
    var demos = function () {
        $('#kt_date_input').mask('00/00/0000', {
            placeholder: "dd/mm/yyyy"
        });

        $('#kt_time_input').mask('00:00:00', {
            placeholder: "hh:mm:ss"
        });

        $('#kt_date_time_input').mask('00/00/0000 00:00:00', {
            placeholder: "dd/mm/yyyy hh:mm:ss"
        });

        $('#kt_cep_input').mask('00000-000', {
            placeholder: "99999-999"
        });

        $('#kt_phone_input').mask('0000-0000', {
            placeholder: "9999-9999"
        });

        $('#kt_phone_with_ddd_input').mask('(00) 0000-0000', {
            placeholder: "(99) 9999-9999"
        });

        $('#kt_cpf_input').mask('000.000.000-00', {
            reverse: true
        });

        $('#kt_cnpj_input').mask('00.000.000/0000-00', {
            reverse: true
        });

        $('#kt_money_input').mask('000.000.000.000.000,00', {
            reverse: true
        });

        $('#kt_money2_input').mask("#.##0,00", {
            reverse: true
        });

        $('#kt_percent_input').mask('##0,00%', {
            reverse: true
        });

        $('#kt_clear_if_not_match_input').mask("00/00/0000", {
            clearIfNotMatch: true
        });
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    KTMaskDemo.init();
});

/******/ })()
;
//# sourceMappingURL=jquery-mask.js.map
;(function (global, $) {
    "use strict";

    //variable global
    let WEB = global.WEB = global.WEB || {};

    //elementos globales
    WEB.ELEMENTS = {};
    WEB.ELEMENTS.body = $('body');

    //events
    WEB.ELEMENTS.body.on('datatable.refresh', refreshDatatable);
    WEB.ELEMENTS.body.on('submit', '#advancedSearch', advancedSearch);
    WEB.ELEMENTS.body.on('click','.show-password', showPassword);

    function showPassword() {

        let password = document.getElementById("password");

        if(password.type === "password"){
            password.type = "text";
            $('.fa-pas').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }else{
            password.type = "password";
            $('.fa-pas').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }
    }


    /**
     *
     */
    function refreshDatatable() {
        window.LaravelDataTables.dataTableBuilder._fnAjaxUpdate();
    }


    /**
     *
     * @param event
     */
    function advancedSearch(event) {

        event.preventDefault();

        WEB.ELEMENTS.body.trigger('datatable.refresh');
    }


})(window, jQuery);

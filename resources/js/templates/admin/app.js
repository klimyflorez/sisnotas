try{

    window.Popper = require('./plugins/popper/popper.min');
    window.$ = window.jQuery = require('jquery');
    window.moment = require('moment/moment');

    require('bootstrap');
    require('./jquery.slimscroll');
    require('./waves');
    require('./sidebarmenu');
    require('./plugins/sticky-kit-master/sticky-kit.min');
    require('./custom');
    require('./plugins/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker');
    require('./plugins/dropify/dropify');
    require('./plugins/bootstrap-file-input/fileinput');

    window.NProgress = require('nprogress');
    window.toastr = require('toastr');


    window.ClipboardJS = require('./plugins/clipboard/clipboard.min');

    require('../../utils/general');
    require('../../utils/ajax');



} catch (e) {
    console.log(e);
}

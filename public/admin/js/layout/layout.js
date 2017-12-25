define(function (require, exports, module) {

    $(document).ready(function () {
        require('bootstrap_js');
        require('custom');
        require('nprogress');
        require('fastclick');
    });
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
})

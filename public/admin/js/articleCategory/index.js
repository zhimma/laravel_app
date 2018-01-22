define(function (require, exports, module) {
    require('nestable');
    var select2 = require('select2');
    module.exports = {
        init:function(){
            var _self = this;
            $(document).ready(function(){
                select2 = $('.select2_single').select2({
                    placeholder : '请选择',
                    allowClear:true
                });
                $('#nestable').nestable({
                    'maxDepth' : 2
                });
            });
        },

    }

})

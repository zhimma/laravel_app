define(function (require, exports, module) {
    require('nestable');
    require('select2');
    module.exports = {
        init:function(){
            $(document).ready(function(){
                $('.select2_single').select2({
                    placeholder : '请选择',
                    allowClear:true
                });
                $('#nestable').nestable({
                    'maxDepth' : 2
                });
            });

            $(".createMenu").on('click',function(){
                alert(111);
            });
        }
    }

})

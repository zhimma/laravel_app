define(function (require, exports, module) {
    require('nestable');
    var select2 = require('select2');
    module.exports = {
        init:function(){
            $(document).ready(function(){
                select2 = $('.select2_single').select2({
                    placeholder : '请选择',
                    allowClear:true
                });
                $('#nestable').nestable({
                    'maxDepth' : 2
                });
            });

            $(".createMenu").on('click',function(){
                var self = $(this);
                select2.val(self.attr('data-pid')).trigger('change')
            });

            $(".editMenu").on('click',function(){
                var url = $(this).attr('data-href');
                $.ajax({
                    url:url,
                    dataType : 'json',
                    beforeSend:function(){

                    },
                    success:function(menu){
                        console.log(menu);
                    }
                });
            });
        }
    }

})

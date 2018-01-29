define(function (require, exports, module) {
    require('nestable');
    var select2 = require('select2');
    module.exports = {
        init: function () {
            var _self = this;
            $(document).ready(function () {
                select2 = $('.select2_single').select2({
                    placeholder: '请选择',
                    allowClear: true
                });
                $('#nestable').nestable({
                    'maxDepth': 2
                });
            });
            $(".j_submit_class").on('click',function(){
                var url = $(".j_create_category").attr('action');
                var params = {
                    'url' : url,
                    'type' : 'POST',
                    'formData':$(".j_create_category").serialize()
                };
                window.sendAjax(params,function(data){
                    if(data.status == 1){
                        if(data.data.status == 1){
                            layer.msg(data.data.msg,{time:2000},function(){
                                // layer.closeAll();
                                window.location.reload();
                            });
                        }else{
                            var str = '<div class="alert alert-danger"><ul>';
                            $.each(data.data.msg,function(i,v){
                                str += '<li>'+v+'</li>'
                            });
                            str += '</ul></div>';
                            $(".error-box").html(str);
                        }
                    }else{
                        layer.msg(data.msg,function(){
                            return false;
                        });
                    }
                });
            });
            this.edit_category();
        },

        edit_category: function () {
            $(".j_edit_class").on('click', function () {
                var url = $(this).data('href');
                var params = {
                    'url': url,
                    'type': 'GET'
                };
                window.sendAjax(params, function (result) {
                    if(result.status == 1){
                        if(result.data.status == 1){

                        }else{
                            layer.msg(result.data.msg, {
                                time: 2000, //2s后自动关闭
                            },function(){
                                window.location.reload();
                            });
                        }
                    }else{
                        layer.msg(result.msg,function(){
                            return false;
                        },function(){
                            window.location.reload();
                        });
                    }
                });
            });
        }

    }

})

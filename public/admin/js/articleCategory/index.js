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
            $(".j_submit_class").on('click', function () {
                var params = {
                    'url': $(".j_create_category").attr('action'),
                    'type': $(".j_create_category").attr('method'),
                    'formData': $(".j_create_category").serialize()
                };
                window.sendAjax(params, function (data) {
                    if (data.status == 1) {
                        if (data.data.status == 1) {
                            layer.msg(data.data.msg, {time: 2000}, function () {
                                // layer.closeAll();
                                window.location.reload();
                            });
                        } else {
                            var str = '<div class="alert alert-danger"><ul>';
                            $.each(data.data.msg, function (i, v) {
                                str += '<li>' + v + '</li>'
                            });
                            str += '</ul></div>';
                            $(".error-box").html(str);
                        }
                    } else {
                        layer.msg(data.msg, function () {
                            return false;
                        });
                    }
                });
            });
            this.create_category();
            this.edit_category();
            this.destroy_category();
        },

        edit_category: function () {
            $(".j_edit_class").on('click', function () {
                var url = $(this).data('href');
                var data = $(this).data('data');
                var params = {
                    'url': url,
                    'type': 'GET'
                };
                window.sendAjax(params, function (result) {
                    if (result.status == 1) {
                        if (result.data.status == 1) {
                            var data = result.data.data;
                            select2.val(data.parent_id).trigger('change');
                            $('input[name="name"]').val(data.name);
                            $('input[name="description"]').val(data.description);
                            $('select[name="status"]').val(data.status);
                            $('.j_create_category').attr('action', data.url).attr('method', 'PUT');
                        } else {
                            layer.msg(result.data.msg, {
                                time: 2000, //2s后自动关闭
                            }, function () {
                                window.location.reload();
                            });
                        }
                    } else {
                        layer.msg(result.msg, function () {
                            return false;
                        }, function () {
                            window.location.reload();
                        });
                    }
                });
            });
        },
        create_category: function () {
            var self = $(this);
            $(".j_create_class").on('click', function () {
                $('.j_create_category')[0].reset();
                var jsonData = $(this).data('json');
                select2.val(jsonData.data.parent_id).trigger('change');
                $('.j_create_category').attr('action', $('.j_create_category').data('url')).attr('method', 'POST');
            });
        },
        destroy_category:function () {
            $(".j_destroy_class").on('click',function(){
                var that = this;
                layer.confirm('确定删除该分类？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    var url = $(that).data('href');
                    var params = {
                        'url':url,
                        'type' :'DELETE'
                    };

                    window.sendAjax(params,function(result){
                        if(result.status == 1){
                            if(result.data.status == 1){
                                layer.msg(result.data.msg,{time:2000},function(){
                                    window.location.reload();
                                });
                            }else{
                                layer.msg(result.data.msg, {
                                    time: 20000, //20s后自动关闭
                                });
                            }
                        }else{
                            layer.msg(result.msg,function(){
                                return false;
                            });
                        }
                    });
                }, function(){
                    /*layer.msg('也可以这样', {
                        time: 20000, //20s后自动关闭
                        btn: ['明白了', '知道了']
                    });*/
                });
            });
        }

    }

})

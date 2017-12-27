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

            $(".createMenu").on('click',function(){
                var self = $(this);
                select2.val(self.attr('data-pid')).trigger('change')
            });

            $(".editMenu").on('click',function(){
                var index;
                var url = $(this).attr('data-href');
                $.ajax({
                    url:url,
                    dataType : 'json',
                    beforeSend:function(){
                        index = layer.load(2, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    success:function(res){
                        layer.close(index);
                        if(res.status == 1){
                            _self.appendEditData(res.data,res.url);
                        }else{
                            layer.msg("获取菜单数据失败",{icon:2,time:2000},function(){
                                return false;
                            });
                        }
                    }
                });
            });
        },
        appendEditData:function(data,url)
        {
            console.log(data);
            $(".j_create_menu").find("input[name='name']").val(data.name);
            $(".j_create_menu").find("input[name='url']").val(data.url);
            select2.val(data.parent_id).trigger('change');
            $(".j_create_menu").find("input[name='icon']").val(data.icon);
            $(".j_create_menu").find("input[name='sort']").val(data.sort);
            // PUT|PATCH | admin/menu/{menu}        | menu.update   | App\Http\Controllers\Admin\MenuController@update
            $(".j_create_menu").attr('action',url);
            $(".j_create_menu").append('<input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">');
        }
    }

})

define(function (require, exports, module) {
    require('switchery');
    module.exports = {
        init: function () {
            $(".js-switch").each(function(k,v){
                new Switchery(v,{
                    size:"small",
                    color: '#64bd63'
                });
            })

        },
        show_role: function () {
            var url = $(".j_show_role").data('url');
            var formData = $(".j_show_role").serialize();
            var params = {
                "url": url,
                "type": "PUT",
                "dataType": "json",
                "formData" : formData,
                "async": false
            };
            sendAjax(params, function (data) {
                if(data.status == 1){
                    if(data.data.status == 1){
                        layer.msg(data.data.msg,{time:2000},function(){
                            // layer.closeAll();
                            window.location.reload();
                        });
                    }else{
                        layer.msg(data.data.msg,function(){
                            return false;
                        });
                    }
                }else{
                    layer.msg(data.msg,function(){
                        return false;
                    });
                }
            });
        }
    }
});

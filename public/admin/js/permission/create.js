define(function (require, exports, module) {
    module.exports = {
        init: function () {
            console.log('pages');
        },
        createPermission: function () {
            var url = $(".j_create_permission").data('url');
            var formData = $(".j_create_permission").serialize();
            var params = {
                "url": url,
                "type": "POST",
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
        }
    }
});

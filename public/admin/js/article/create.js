define(function (require, exports, module) {
    require('wangEditor');
    module.exports = {
        init:function(url){
            var E = window.wangEditor;
            editor = new E('#editor');
            // 或者 var editor = new E( document.getElementById('editor') )
            editor.customConfig.uploadImgShowBase64 = true;  // 使用 base64 保存图片
            editor.customConfig.uploadImgServer = url;  // 上传图片到服务器
            editor.customConfig.uploadImgHeaders = {
                'X-CSRF-TOKEN': js_csrf_token
            };
            editor.customConfig.uploadFileName = 'article';
            editor.customConfig.uploadImgHooks = {
                before: function (xhr, editor, files) {
                },
                success: function (xhr, editor, result) {
                },
                fail: function (xhr, editor, result) {
                   layer.msg('上传出错');
                   return false;
                },
                error: function (xhr, editor) {
                    layer.msg('上传出错');
                    return false;
                },
                timeout: function (xhr, editor) {
                },

                // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
                // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
                customInsert: function (insertImg, result, editor) {
                    // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
                    // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果

                    // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
                    if(result.status == 0){
                        layer.msg(result.msg);
                        return false;
                    }
                    var url = result.path;
                    insertImg(url)

                    // result 必须是一个 JSON 格式字符串！！！否则报错
                }
            };
            editor.create();
        },
        create_article: function () {
            var url = $(".j_create_article").data('url');
            var content = window.editor.txt.html();
            $("#content").val(content);
            var formData = $(".j_create_article").serialize();
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
                            console.log(v);
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

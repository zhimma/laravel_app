define(function (require, exports, module) {
    var uploadFile = require("asset/js/common/uploadFile");
    module.exports = {
        init: function () {
            var setting = {};
            setting.browse_button = "browse_button";
            setting.url = $('#browse_button').attr('url');
            setting.thumb = {
                width: '100%',
                height: '100%'
            };
            setting.multipart_params = {'X-CSRF-TOKEN': js_csrf_token};
            setting.headers = {'X-CSRF-TOKEN': js_csrf_token};

            uploadFile.uploadFile(setting, function (res, upload, files) {
                try {
                    if (!res.status) {
                        throw res.msg;
                    }
                    str = '<div class="j_' + res.browse_button + '_result"><img class="j_img" layer-src="' + res.path + '" src="' + res.path + '">';
                    str += '<input type="hidden" class="form-control" name="name" value="' + res.path + '">';
                    str += '</div>';
                    $('#' + res.browse_button).parent().next('div').removeClass('hide').html(str);
                } catch (err) {
                    layer.msg(err,{icon:2,time:2000});
                }
            })
        }
    }
});

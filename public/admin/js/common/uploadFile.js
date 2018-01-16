define(function (require, exports, module) {
    require('vendors/plupload/v2.1.2/js/plupload.full.min.js');
    module.exports = {
        getConfig: function (config) {
            console.log(paths.vendors);
            //默认参数
            var set = {
                flash_swf_url: paths.vendors + '/plupload/v2.1.2/js/Moxie.swf',//swf文件，当需要使用swf方式进行上传时需要配置该参数
                silverlight_xap_url: paths.vendors + '/plupload/v2.1.2/js/Moxie.xap',//silverlight文件，当需要使用silverlight方式进行上传时需要配置该参数
                filters: {
                    mime_types: [ //只允许上传图片
                        {title: "Image files", extensions: "jpg,gif,png"}
                    ],
                    //最大尺寸最大只能上传b的文件
                    max_file_size: '2048kb',
                    //不允许选取重复文件
                    prevent_duplicates: false
                },
                /*thumb: {
                    width: 300,
                    height: 300
                },*/
                multipart_params: {
                    //文件类型 Images Zip Excel
                    'fileType': 'Images',
                    //用户自己传递的参数
                },
                //多选多传
                multiple: {
                    //是否允许有多选
                    'multi_selection': false,
                    //一次最多上传个数
                    'max_files': 1
                },
                //压缩
                resize: {
                    crop: false,
                    quality: 100,
                    preserve_headers: false
                }
            };
            return $.extend(set, config);
        },
        //上传文件 调用
        uploadFile: function (config, _callback) {
            console.log(config);
            var _self = this;
            var result = {'status': 0, 'msg': '', 'browse_button': config.browse_button};

            try {
                if ($.isEmptyObject(config)) {
                    throw ('非法数据对象');
                }
                if (config.browse_button == undefined) {
                    throw ('参数不完整，缺少browse_button_id');
                }
                if (config.url == undefined) {
                    throw ('参数不完整，缺少服务器url');
                }
            } catch (err) {
                result.msg = err;
                _callback(result);
                return false;
            }
            //合并处理上传
            var setting = _self.getConfig(config);
            //创建一个实例
            console.log(setting);
            var uploader = new plupload.Uploader(setting);
            //初始化
            uploader.init();
            //绑定文件添加进队列事件
            uploader.bind('FilesAdded',
                function (uploader, files) {
                    if (files.length > setting.multiple.max_files) {
                        uploader.splice(0, 999);
                        try {
                            throw ('上传的文件数量超出限制 ' + setting.multiple.max_files);
                        } catch (err) {
                            result.msg = err;
                            _callback(result);
                            return false;
                        }
                    }
                    //开始上传
                    uploader.start();
                });
            uploader.bind('UploadProgress',
                function (up, file) {
                    // console.log(file.name + '正在上传中！');
                });
            uploader.bind('FileUploaded',
                function (uploader, file, responseObject) {
                    var response = JSON.parse(responseObject.response);
                    response.browse_button = setting.browse_button;
                    _callback(response, uploader, file);
                    return false;
                });
            uploader.bind('UploadComplete',
                function (up, files) {
                    // console.log("您选择的文件已经全部上传，总计共" + files.length + "个文件");
                });
            uploader.bind('error',
                function (uploader, errObject) {
                    try {
                        var msg = '';
                        switch (errObject.code) {
                            case -600:
                                msg = '图片不得大于2M';
                                break;
                            case -601:
                                msg = '上传的文件类型不符合要求';
                                break;
                            case -700:
                                msg = '图片格式错误';
                                break;
                            default:
                                msg = '上传失败！';
                                break;
                        }
                        throw (msg);
                    } catch (err) {
                        result.msg = err;
                        _callback(result);
                        return false;
                    }
                });
        }
    }
});
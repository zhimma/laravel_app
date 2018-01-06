define(function (require, exports, module) {

    $(document).ready(function () {
        require('bootstrap_js');
        require('custom');
        require('nprogress');
        require('fastclick');
        require('layer');
    });
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $("a[js_mark_class='js_mark_class']").unbind('click').on("click", function (e) {
        var jsonData = $(this).data('json');
        console.log(jsonData);
        var href = $(this).attr('href');
        if (jsonData.jump) {
            window.location.href = href;
        } else {
            e.preventDefault();
            $.ajax({
                url: href,
                type: 'get',
                dataType: "html",
                async:true,
                beforeSend: function () {
                    load = layer.load(2);
                },
                success: function (data) {
                    console.log(data);

                    layer.close(load);
                    var index = layer.open({
                        type: 1, //1,2
                        title: jsonData.title,
                        fix: false,
                        skin: 'layui-layer-me', //样式类名
                        area: (jsonData.size == undefined) ? ['600px', '50%'] : jsonData.size,
                        shift: 0,
                        anim:2,
                        fixed:true,
                        scrollbar:false,
                        shade: 0.6,
                        id: 'LAY_layuipro', //设定一个id，防止重复弹出
                        maxmin: true, //开启最大化最小化按钮
                        content: !data ? '暂时没有数据' : data,
                        btn: jsonData.haveBtn != undefined ? jsonData.haveBtn : ['保存', '取消'],
                        yes: function (index, layero) {

                            if (jsonData.hasOwnProperty('callback')) { //　加入回调 @祝海亮
                                var callback = jsonData['callback'];
                                if (callback.length > 0) {
                                    if (typeof window[callback] === 'function') {
                                        window[callback]();
                                        return false;
                                    }
                                    throw new TypeError('未找到或未定义 ' + callback + ' 方法');
                                }
                            } else {
                                if (jsonData.closeLayer == 'true') {
                                    layer.close(index);
                                } else {
                                    $('#layui-layer' + index).find('form').submit();
                                }
                            }

                        },
                        btn2: function (index, layero) {
                            //取消按钮的回调事件，默认关闭弹窗
                        }
                    });
                }
            });
        }
    })
})

define(function (require, exports, module) {
    require('dataTables');
    // require('dataTables_bs3');
    require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');
    var select2 = require('select2');
    module.exports = {
        init: function (btns) {
            var that = this;
            $(document).ready(function () {
                select2 = $('.select2_single').select2({
                    placeholder: '请选择',
                    allowClear: true
                });

                var url = $("#user_dataTables").data('url');

                $('#user_dataTables').DataTable({
                    "order": [[0, "desc"]],
                    "autoWidth": true,
                    "deferRender": false,
                    "searching": true,
                    "stateSave": false,
                    serverSide: true,
                    ajax: {
                        url: url,
                        type: 'get',
                        data: btns
                    },
                    pageLength: 10,
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            orderable: true
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: false
                        },
                        {
                            data: 'nickname',
                            name: 'nickname',
                            orderable: false
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: false
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: false
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            orderable: true
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            orderable: true
                        },
                        {
                            data: 'btn'
                        }
                    ],
                    "oLanguage": {
                        "sLengthMenu": "每页显示 _MENU_ 条记录",
                        "sZeroRecords": "抱歉， 没有找到",
                        "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                        "sInfoEmpty": "没有数据",
                        "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                        "oPaginate": {
                            "sFirst": "首页",
                            "sPrevious": "前一页",
                            "sNext": "后一页",
                            "sLast": "尾页"
                        },
                        "sZeroRecords": "没有检索到数据",
                    },
                    "drawCallback": function () {
                        window.layWindow();
                        that.delete_user()
                    }
                });
            });
        },
        delete_user: function () {
            $("button[js_mark_class='js_mark_class']").on('click', function () {
                var that = this;
                layer.confirm('确定删除该用户？', {
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
});

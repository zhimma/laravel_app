define(function (require, exports, module) {
    require('dataTables');
    require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');
    module.exports = {
        init:function(){
            var that = this;
            $(document).ready(function () {
                var url = $("#navigate_dataTables").data('url');
                $('#navigate_dataTables').DataTable({
                    "order": [[ 3, "desc" ]],
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
                            data: 'url',
                            name: 'url',
                            orderable: false

                        },
                        {
                            data: 'sort',
                            name: 'sort',
                            orderable: false
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            orderable: false
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            orderable: false
                        },
                        {
                            data:'btn',
                            orderable: false

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
                        that.delete_role()
                    }
                });
            });
        }
    }
});

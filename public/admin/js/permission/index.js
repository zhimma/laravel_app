define(function (require, exports, module) {
    module.exports = {
        init: function () {
           require.async('dataTables_bs3',function(){
               require('dataTables');
           });
            $(document).ready(function () {
                var url = $("#permission_dataTables").data('url');
                $('#permission_dataTables').DataTable({
                    "autoWidth": true,
                    "deferRender": false,
                    "searching": true,
                    "stateSave": false,
                    serverSide: true,
                    ajax: {
                        url: url,
                        type: 'get'
                    },
                    pageLength: 10,
                    columns: [
                        {
                            data: 'display_name',
                            name: 'display_name',
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: false

                        },
                        {
                            data: 'description',
                            name: 'description',
                            orderable: false
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
                            data:'id',
                            name:'id',
                            render:function(data,type,row,meta){
                                return "<button class='btn btn-sm btn-primary' href='javascript:;' data-id='"+data+"'>编辑</button>" +
                                    "<button class='btn btn-sm btn-danger' href='javascript:;' data-id='"+data+"'>删除</button>";
                            }
                        }
                    ]
                });
            });
        }
    }
});

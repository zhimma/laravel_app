define(function (require, exports, module) {
    require('dataTables');
    require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');
    module.exports = {
        init: function (edit_btn,delete_btn) {
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
                                var str =  "<div data-id='"+data+"'>"+edit_btn + delete_btn +"</div>";
                                window.layWindow();
                                return str;
                            },
                            orderable: false

                        }
                    ]
                });
            });
        }
    }
});

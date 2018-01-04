define(function (require, exports, module) {
    require('dataTables');
    // require('dataTables_bs3');
    require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');
    module.exports = {
        init:function(){
            $(document).ready( function () {
                var url = $("#user_dataTables").data('url');

                $('#user_dataTables').DataTable({
                    "autoWidth":true,
                    "deferRender":false,
                    "searching":true,
                    "stateSave":false,
                    serverSide : true,
                    ajax : {
                        url : url,
                        type : 'get'
                    },
                    // pageLength: 2,
                    columns:[
                        {
                            data : 'id',
                            name : 'id',
                            orderable:true
                        },
                        {
                            data : 'name',
                            name : 'name'

                        },
                        {
                            data : 'phone',
                            name : 'phone'
                        },
                        {
                            data : 'email',
                            name : 'email'
                        },
                        {
                            data : 'name'
                        },
                        {
                            data : 'name'
                        },
                        {
                            data : 'name'
                        },
                    ]
                });
            } );
        }
    }
});

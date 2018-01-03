define(function (require, exports, module) {
    require('dataTables');
    require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');
    // require('dataTables_bs3');
    module.exports = {
        init:function(){
            $(document).ready( function () {
                var url = $("#user_dataTables").data('url');

                $('#user_dataTables').DataTable({
                    "autoWidth":true,
                    "deferRender":false,
                    "info":true,
                    "jQueryUI":true,
                    "lengthChange":true,
                    "ordering":true,
                    "paging":true,
                    "processing":false,
                    "scrollX":false,
                    "scrollY":false,
                    "searching":true,
                    "stateSave":false,
                    serverSide : true,
                    ajax : {
                        url : url,
                        type : 'get'
                    },
                    pageLength: 2,
                    columns:[
                        {data : 'id'},
                        {data : 'name'},
                        {data : 'phone'},
                        {data : 'email'},
                        {data : 'name'},
                        {data : 'name'},
                        {data : 'name'},
                    ]
                });
            } );
        }
    }
});

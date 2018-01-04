define(function (require, exports, module) {
    module.exports = {
        init: function () {
            require('dataTables');
            // require('dataTables_bs3');
            require('http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js');

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

                        }
                    ]
                });
            });
        }
    }
});

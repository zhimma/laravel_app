;!function(path){
    seajs.config({
        base:path.asset,
        paths:{
            asset:path.asset,
            module_js:path.module_js,
            vendors:path.vendors,
            build:path.build
        },
        alias:{
            jQuery:'vendors/jquery/dist/jquery.min.js',
            bootstrap_js:'vendors/bootstrap/dist/js/bootstrap.min.js',
            fastclick:'vendors/fastclick/lib/fastclick.js',
            nprogress:'vendors/nprogress/nprogress.js',
            custom:'build/js/custom.js',
            nestable:'vendors/nestable/jquery.nestable.js',
            select2:'vendors/select2/dist/js/select2.js',
            layer:"vendors/layer/layer.js",
            dataTables:"vendors/datatables.net/js/jquery.dataTables.js",
            dataTables_bs3:"vendors/datatables.net-bootstrap3/js/dataTables.bootstrap.js",
            switchery:"vendors/switchery/dist/switchery.min.js"


        },
        preload:[
            'jQuery'
        ],
        map: [
            [/^(.*\.(?:css|js))(.*)$/i, '$1?' + (new Date()).valueOf()]
        ],
        debug: true,
        charset: 'utf-8'

    });
}(paths);


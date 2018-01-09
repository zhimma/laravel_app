@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>角色管理 <small></small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>角色列表<small></small></h2>
                        <div class="pull-right">
                            {!! BA([
                            'title'=>'新增角色',
                            'class'=>'btn btn-default',
                            'route' => 'role.create',
                            'slug' => 'admin.role.create',
                            'params'=>[],
                            'mark'=>'js_mark_class',
                            'size' => ['50%','60%'],
                            'jump' => false,
                            'callback'=>'createPermission'
                            ]) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="role_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/role/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>角色名</th>
                                <th>角色标识</th>
                                <th>角色描述</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('js')
    <script>
        seajs.use(['module_js/role/index'],function(index){
            index.init();
        })
    </script>
@endsection
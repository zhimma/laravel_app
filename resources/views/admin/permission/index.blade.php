@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>用户权限管理 <small>用户权限</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>权限列表<small></small></h2>
                        <div class="pull-right">
                            {!! BA([
                            'title'=>'新增权限',
                            'class'=>'btn btn-default',
                            'url' => 'admin/permission/create',
                            'slug' => 'admin.permission.create',
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
                        <table id="permission_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/permission/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>权限名</th>
                                <th>权限标识</th>
                                <th>权限描述</th>
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
        var edit_btn = `{!! BA([
                            'title'=>'编辑',
                            'class'=>'btn btn-sm btn-primary',
                            'url' => 'admin/permission/edit',
                            'slug' => 'admin.permission.edit',
                            'params'=>[],
                            'mark'=>'js_mark_class',
                            'size' => ['50%','60%'],
                            'jump' => false,
                            'callback'=>'edit_permission'
                            ]) !!}`;
        var delete_btn = `{!! BA([
                            'title'=>'删除',
                            'class'=>'btn btn-sm btn-danger',
                            'url' => 'admin/permission/destroy',
                            'slug' => 'admin.permission.destroy',
                            'params'=>[],
                            'mark'=>'js_mark_class',
                            'size' => ['50%','60%'],
                            'jump' => false,
                            'callback'=>'delete_permission'
                            ]) !!}`;

        seajs.use(['module_js/permission/index'],function(index){
            index.init(edit_btn,delete_btn);
        })
    </script>
@endsection
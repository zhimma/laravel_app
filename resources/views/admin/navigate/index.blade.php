@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>导航管理 <small></small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>导航列表<small></small></h2>
                        <div class="pull-right">
                            {!! BA([
                            'title'=>'新增导航',
                            'class'=>'btn btn-default',
                            'route' => 'navigate.create',
                            'slug' => 'admin.navigate.create',
                            'params'=>[],
                            'mark'=>'js_mark_class',
                            'size' => ['50%','60%'],
                            'jump' => false,
                            'callback'=>'create_navigate'
                            ]) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="navigate_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/navigate/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>名称</th>
                                <th>URL</th>
                                <th>顺序</th>
                                <th>状态</th>
                                <th>创建时间</th>
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
        var edit_btn = {
            'title': '编辑',
            'class': 'btn btn-sm btn-primary',
            'route': 'navigate.edit',
            'slug': 'admin.navigate.edit',
            'params': [],
            'mark': 'js_mark_class',
            'size': ['50%', '60%'],
            'jump': 0,
            'callback': 'edit_role'
        };

        var delete_btn = {
            'title': '删除',
            'class': 'btn btn-sm btn-danger',
            'route': 'navigate.destroy',
            'slug': 'admin.navigate.destroy',
            'params': [],
            'mark': 'js_mark_class',
            'jump': 0,
            'type' : 'button',
        };
        var btns = {'btn':{'edit_btn':edit_btn,'delete_btn':delete_btn}};

        seajs.use(['module_js/navigate/index'], function (navigate) {
            navigate.init(btns);
        });
    </script>
@endsection
@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables.net-bootstrap3/css/dataTables.bootstrap.css') }}">
    <link href="{{ asset('admin/vendors/select2/dist/css/select2.min.css')  }}" rel="stylesheet">
@endsection

@section('content')
<!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>用户管理 <small>用户列表</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>用户列表<small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="user_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/user/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>账号</th>
                                <th>昵称</th>
                                <th>手机号</th>
                                <th>邮箱</th>
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
            'route': 'user.edit',
            'slug': 'admin.user.edit',
            'params': [],
            'mark': 'js_mark_class',
            'size': ['50%', '60%'],
            'jump': 0,
            'callback': 'edit_user'
        };

        var delete_btn = {
            'title': '删除',
            'class': 'btn btn-sm btn-danger',
            'route': 'user.destroy',
            'slug': 'admin.user.destroy',
            'params': [],
            'mark': 'js_mark_class',
            'jump': 0,
            'type' : 'button',
        };
        var btns = {'btn':{'edit_btn':edit_btn,'delete_btn':delete_btn}};

        seajs.use(['module_js/user/index'], function (user) {
            user.init(btns);
        });
    </script>
@endsection
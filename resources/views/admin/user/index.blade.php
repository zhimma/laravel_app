@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables.net-bootstrap3/css/dataTables.bootstrap.css') }}">
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
                        <table id="user_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/user/show')}}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>账号</th>
                                <th>昵称</th>
                                <th>手机号</th>
                                <th>邮箱</th>
                                <th>性别</th>
                                <th>状态</th>
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
        seajs.use(['module_js/user/index'], function (user) {
            user.init();
        });
    </script>
@endsection
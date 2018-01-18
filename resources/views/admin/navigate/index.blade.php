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
                <h3>导航管理 <small></small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>导航列表<small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="user_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/user/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>名称</th>
                                <th>URL</th>
                                <th>顺序</th>
                                <th>状态</th>
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
        seajs.use(['module_js/navigate/index'], function (navigate) {
            navigate.init();
        });
    </script>
@endsection
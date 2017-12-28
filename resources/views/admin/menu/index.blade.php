@extends('admin.layout.layout')
@section('css')
    <link href="{{ asset('admin/vendors/nestable/jquery.nestable.css')  }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/select2/dist/css/select2.min.css')  }}" rel="stylesheet">
@endsection
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>菜单管理</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>菜单列表
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content bs-example-popovers">
                        <div class="dd" id="nestable">
                            @inject('menuPresenter','App\Repositories\Presenter\MenuPresenter')
                            {!! $menuPresenter->getMenuList() !!}
                        </div>
                    </div>
                </div>
            </div>
            @permission('admin/menu/create')
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>菜单编辑
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal form-label-left j_create_menu" @if(old('id')) action="{{ url('admin/menu/'.old('id')) }}" @else action="{{ url('admin/menu') }}" @endif  method="POST">
                            {{ csrf_field() }}
                            @if(old('id'))
                                <div class="hidden_area">
                                    <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
                                    <input type="hidden" class="" name="id" value="{{ old('id') }}">
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单名称</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                           placeholder="菜单名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单链接</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                                           placeholder="菜单链接">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">父级菜单</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="select2_single form-control" name="parent_id" tabindex="-1">
                                        @inject('menuPresenter','App\Repositories\Presenter\MenuPresenter')
                                        {!! $menuPresenter->getParentMenu($parentMenus) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单图标</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="icon" value="{{ old('icon') }}" class="form-control"
                                           placeholder="菜单图标">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单排序</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" name="sort" value="{{ old('sort') }}" class="form-control"
                                           placeholder="菜单排序">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="cancel" class="btn btn-default">取消</button>
                                    <button type="submit" class="btn btn-success">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
@endsection
@section('js')
    <script>
        seajs.use(['module_js/menu/index'], function (menu) {
            menu.init();
        });
    </script>
@endsection
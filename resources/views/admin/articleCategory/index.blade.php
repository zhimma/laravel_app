@extends('admin.layout.layout')
@section('css')
    <link href="{{ asset('admin/vendors/nestable/jquery.nestable.css')  }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/select2/dist/css/select2.min.css')  }}" rel="stylesheet">
@endsection
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>文章分类管理</h3>data
            </div>
        </div>
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>分类列表
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content bs-example-popovers">
                        <div class="dd" id="nestable">
                            @inject('articleCategoryPresenter','App\Repositories\Presenter\articleCategoryPresenter')
                            {!! $articleCategoryPresenter->getArticleCategoryList() !!}
                        </div>
                    </div>
                </div>
            </div>
            @permission('admin.articleCategory.create')

            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>分类编辑
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 error-box">
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left j_create_category" action="{{ route('articleCategory.store') }}" method="POST">
                            {{ csrf_field() }}
                            {{--@if(old('id'))
                                <div class="hidden_area">
                                    <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="{{ old('id') }}">
                                </div>
                            @endif--}}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">分类名称</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                           placeholder="分类名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">父级菜单</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="select2_single form-control" name="parent_id" tabindex="-1">
                                        @inject('ArticleCategoryPresenter','App\Repositories\Presenter\ArticleCategoryPresenter')
                                        {!! $ArticleCategoryPresenter->getParentCategory() !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">分类描述</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="description" value="{{ old('url') }}" class="form-control"
                                           placeholder="分类描述">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">状态</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="status" class="form-control">
                                        <option value="1">显示</option>
                                        <option value="0" {{--@if($data['status'] == 0) selected @endif--}}>隐藏</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-default j_cancel_class">取消</button>
                                    <button type="button" class="btn btn-success j_submit_class">保存</button>
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
        seajs.use(['module_js/articleCategory/index'], function (articleCategory) {
            articleCategory.init();
        });
    </script>
@endsection
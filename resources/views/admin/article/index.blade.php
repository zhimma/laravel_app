@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>文章列表 <small></small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>文章列表<small></small></h2>
                        <div class="pull-right">
                            {!! BA([
                            'title'=>'发布文章',
                            'class'=>'btn btn-default',
                            'route' => 'article.create',
                            'slug' => 'admin.article.create',
                            'params'=>[],
                            'mark'=>'js_mark_class',
                            'size' => ['70%','80%'],
                            'jump' => false,
                            'callback'=>'create_article'
                            ]) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="article_dataTables" class="table table-striped table-bordered" data-url="{{url('admin/article/ajaxGetList')}}">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>分类</th>
                                <th>标题</th>
                                <th>内容</th>
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
        window.UEDITOR_HOME_URL = paths.vendors+"/ueditor/";
        var edit_btn = {
            'title': '编辑',
            'class': 'btn btn-sm btn-primary',
            'route': 'article.edit',
            'slug': 'admin.article.edit',
            'params': [],
            'mark': 'js_mark_class',
            'size': ['70%', '80%'],
            'jump': 0,
            'callback': 'edit_article'
        };

        var delete_btn = {
            'title': '删除',
            'class': 'btn btn-sm btn-danger',
            'route': 'article.destroy',
            'slug': 'admin.article.destroy',
            'params': [],
            'mark': 'js_mark_class',
            'jump': 0,
            'type' : 'button',
        };
        var btns = {'btn':{'edit_btn':edit_btn,'delete_btn':delete_btn}};

        seajs.use(['module_js/article/index'], function (article) {
            article.init(btns);
        });
    </script>
@endsection
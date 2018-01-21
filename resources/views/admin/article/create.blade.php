<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_create_article" data-url="{{ route('article.store') }}" action="{{ route('article.store') }}"
          method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">分类</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <select name="category_id" class="form-control">
                    <option value="1">显示</option>
                    <option value="0">隐藏</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">状态</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <select name="status" class="form-control">
                    <option value="1">显示</option>
                    <option value="0">隐藏</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">标题</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                       placeholder="标题">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">内容</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div id="editor">
                </div>
                <input type="hidden" name="content" value="" id="content">
            </div>
        </div>
    </form>
</div>
<script>
    var url = '{{ route('article.upload') }}';
    seajs.use('module_js/article/create', function (article) {
        article.init(url);
        window.create_article = article.create_article;
    })
</script>




<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_create_navigate" data-url="{{ route('article.store') }}" action="{{ route('article.store') }}"
          method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">名称</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                       placeholder="名称">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">URL</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                       placeholder="url">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">顺序</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="sort" value="{{ old('sort') }}" class="form-control"
                       placeholder="顺序">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">状态</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="status" class="form-control">
                    <option value="1">显示</option>
                    <option value="0">隐藏</option>
                </select>
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/navigate/create', function (article) {
        article.init();
        window.create_article = article.create_article;
    })
</script>




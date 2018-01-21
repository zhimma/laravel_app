<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_edit_article" data-url="{{ route('article.update',['id' => $data['id']]) }}" action="{{ route('article.update',['id' => $data['id']]) }}"
          method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <input type="hidden" class="" name="id" value="{{ $data['id'] }}">
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
                <input type="text" name="title" value="{{ $data['title'] }}" class="form-control"
                       placeholder="标题">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">内容</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div id="editor" style="width: 800px">
                    {!! $data['content'] !!}
                </div>
                <input type="hidden" name="content" value="{{ $data['content'] }}" id="content">
            </div>
        </div>
    </form>
</div>
<script>
    var url = '{{ route('article.upload') }}';
    seajs.use('module_js/article/edit', function (article) {
        article.init(url);
        window.edit_article = article.edit_article;
    })
</script>




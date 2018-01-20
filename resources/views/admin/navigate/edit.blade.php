<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_edit_navigate" data-url="{{ route('navigate.update',['id' => $data['id']]) }}" action="{{ route('navigate.update',['id' => $data['id']]) }}"
          method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <input type="hidden" class="" name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">名称</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ $data['name'] }}" class="form-control"
                       placeholder="名称">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">URL</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="url" value="{{ $data['url'] }}" class="form-control"
                       placeholder="url">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">顺序</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="sort" value="{{ $data['sort'] }}" class="form-control"
                       placeholder="顺序">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">状态</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="status" class="form-control">
                    <option value="1" @if($data['status'] == 1) selected @endif>显示</option>
                    <option value="0" @if($data['status'] == 0) selected @endif>隐藏</option>
                </select>
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/navigate/edit', function (navigate) {
        navigate.init();
        window.edit_navigate = navigate.edit_navigate;
    })
</script>




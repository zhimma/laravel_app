<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_edit_role" data-url="{{ route('role.update',['id' => $data['id']]) }}" action="{{ route('role.store',['id' => $data['id']]) }}"
          method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <input type="hidden"  name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色名</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="display_name" value="{{ $data['display_name'] }}" class="form-control"
                       placeholder="角色名">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色标识</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ $data['name'] }}" class="form-control"
                       placeholder="角色标识链接">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色描述</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="description" value="{{ $data['description'] }}" class="form-control"
                       placeholder="角色描述">
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/role/edit', function (edit) {
        edit.init();
        window.edit_role = edit.edit_role;
    })
</script>




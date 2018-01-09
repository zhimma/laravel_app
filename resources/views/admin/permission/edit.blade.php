<div class="col-md-12 col-sm-12 col-xs-12">

    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_edit_permission" data-url="{{ route('permission.update',['id' => $data['id']]) }}" action="{{ route('permission.update',['id' => $data['id']]) }}"
          method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <input type="hidden"  name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限名</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="display_name"  class="form-control" value="{{ $data['display_name'] }}"
                       placeholder="权限名">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限标识</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ $data['name'] }}" class="form-control"
                       placeholder="菜单权限标识链接">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限描述</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="description" value="{{ $data['description'] }}" class="form-control"
                       placeholder="权限描述">
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/permission/edit', function (edit) {
        edit.init();
        window.edit_permission = edit.edit_permission;

    })
</script>




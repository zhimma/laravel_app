<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_create_permission" data-url="{{ route('permission.store') }}" action="{{ route('permission.store') }}"
          method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限名</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control"
                       placeholder="权限名">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限标识</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                       placeholder="菜单权限标识链接">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">权限描述</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                       placeholder="权限描述">
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/permission/create', function (create) {
        create.init();
        window.createPermission = create.createPermission;

    })
</script>




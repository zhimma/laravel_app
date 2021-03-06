<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_create_role" data-url="{{ route('role.store') }}" action="{{ route('role.store') }}"
          method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色名</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control"
                       placeholder="角色名">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色标识</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                       placeholder="角色标识链接">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">角色描述</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                       placeholder="角色描述">
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/role/create', function (create) {
        create.init();
        window.create_role = create.create_role;
    })
</script>




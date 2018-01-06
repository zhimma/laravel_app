<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="col-md-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal form-label-left j_create_menu"
              @if(old('id')) action="{{ url('admin/menu/'.old('id')) }}" @else action="{{ url('admin/menu') }}"
              @endif  method="POST">
            {{ csrf_field() }}
            @if(old('id'))
                <div class="hidden_area">
                    <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
                    <input type="hidden" class="" name="id" value="{{ old('id') }}">
                </div>
            @endif

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单名称</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                           placeholder="菜单名称">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单链接</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                           placeholder="菜单链接">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单权限标识</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                           placeholder="菜单权限标识">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单图标</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="icon" value="{{ old('icon') }}" class="form-control"
                           placeholder="菜单图标">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单排序</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="sort" value="{{ old('sort') }}" class="form-control"
                           placeholder="菜单排序">
                </div>
            </div>
        </form>
    </div>
</div>



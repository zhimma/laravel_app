<div class="col-md-12 col-sm-12 col-xs-12">

    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_edit_user" data-url="{{ route('userInfo.update',['id' => $data['id']]) }}" action="{{ route('userInfo.update',['id' => $data['id']]) }}"
          method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <input type="hidden"  name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">昵称</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nickname"  class="form-control" value="{{ $data['nickname'] }}"
                       placeholder="昵称">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">手机号</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="phone" value="{{ $data['phone'] }}" class="form-control"
                       placeholder="手机号">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">邮箱</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="email" value="{{ $data['email'] }}" class="form-control"
                       placeholder="邮箱">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">图像</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="avatar" value="{{ $data['avatar'] }}" class="form-control"
                       placeholder="头像">
            </div>
        </div>
    </form>
</div>
<script>
    seajs.use('module_js/user/edit', function (edit) {
        edit.init();
        window.edit_user = edit.edit_user;
    })
</script>




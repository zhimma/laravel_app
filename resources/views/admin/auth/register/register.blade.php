@extends('admin.auth.layout.layout')
@section('content')
    <div id="register" class="animate form">
        <section class="login_content">
            <form>
                <h1>Create Account</h1>
                <div>
                    <input type="text" name="name" class="form-control" placeholder="请输入用户名" required="" />
                </div>
                <div>
                    <input type="text" name="phone" class="form-control" placeholder="手机号" required="" />
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="请输入密码" required="" />
                </div>
                <div>
                    <button class="btn btn-default submit">注册</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">已有账号 ?
                        <a href="login" class="to_register"> 登录 </a>
                    </p>
                </div>
            </form>
        </section>
    </div>
@endsection
@extends('admin.auth.layout.layout')
@section('content')
    <div id="register" class="animate form">
        <section class="login_content">
            <form action="/admin/reset" method="POST">
                {{ csrf_field() }}
                <h1>重置密码</h1>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <input type="text" name="phone" class="form-control" placeholder="手机号" required="" />
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="captcha" class="form-control {{ $errors->has('captcha') ? 'parsley-error' : '' }}"  placeholder="请输入验证码" required="" />
                    </div>
                    <div class="col-md-4">
                        <img src="{{ captcha_src() }}" sizes="cursor:pointer" onclick="this.src='{{ captcha_src() }}' + Math.random()">
                    </div>
                </div>

                <div>
                    <button class="btn btn-default submit">确定重置</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">
                        已有账号 ?
                        <a href="/admin/login" class="to_register"> 登录 </a>
                        没有账号 ?
                        <a href="/admin/register" class="to_register"> 注册 </a>
                    </p>
                </div>
            </form>
        </section>
    </div>
@endsection
@extends('admin.auth.layout.layout')
@section('content')
    <div class="animate form login_form">
        <section class="login_content">

            <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                {{ csrf_field() }}
                <h1>后台登录</h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}"  placeholder="Username" required="" />
                </div>
                <div>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" placeholder="Password" required="" />
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="captcha" class="form-control {{ $errors->has('captcha') ? 'parsley-error' : '' }}"  placeholder="captcha" required="" />
                    </div>
                    <div class="col-md-4">
                        <img src="{{ captcha_src() }}" sizes="cursor:pointer" onclick="this.src='{{ captcha_src() }}' + Math.random()">
                    </div>
                </div>
                <div class="checkbox">
                    <label class="pull-left">
                        <input type="checkbox" name="remember"> 记住我
                    </label>
                </div>
                <div class="clearfix"></div>
                <br>
                <br>
                <div>
                    <button type="submit" class="btn btn-default submit">登录</button>
                    <a class="reset_pass" href="password/reset">忘记密码</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">新用户?
                        <a href="register" class="to_register"> 点击注册 </a>
                    </p>
                </div>
            </form>
        </section>
    </div>
@endsection
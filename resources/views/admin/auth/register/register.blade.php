@extends('admin.auth.layout.layout')
@section('content')
    <div id="register" class="animate form">
        <section class="login_content">
            <form action="/admin/register" method="POST">
                {{ csrf_field() }}
                <h1>新建账号</h1>
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
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="请输入用户名" required="" />
                </div>
                <div>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="手机号" required="" />
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="请输入密码" required="" />
                </div>
                <div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请再输入密码" required="" />
                </div>
                <div>
                    <button class="btn btn-default submit">注册</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">已有账号 ?
                        <a href="admin/login" class="to_register"> 登录 </a>
                    </p>
                </div>
            </form>
        </section>
    </div>
@endsection
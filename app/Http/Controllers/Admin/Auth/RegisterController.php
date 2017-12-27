<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin/index';

    /**
     * 重写注册方法
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月18日21:36:54
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register.register');
    }

    /**
     * 自定义guard 看守器
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月18日21:36:20
     */
    public function guard()
    {
        return Auth::guard('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:admins',
            'phone' => 'required|numeric|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * 注册方法
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月18日22:03:10
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        return Admin::create([
                                'name' => $data['name'],
                                'phone' => $data['phone'],
                                'password' => bcrypt($data['password']),
                            ]);
    }

}

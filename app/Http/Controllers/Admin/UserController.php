<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\AdminRepository as Admin;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    public function ajaxGetList(Request $request)
    {
        $return = $this->admin->ajaxGetList($request);

        return response()->json($return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * 展示数据
     *
     * @param Request $request
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2018年01月03日15:36:59
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = $this->admin->find($id);
        return view('admin.user.edit')->with('data',$data->toArray());
    }


    public function update(UserRequest $request, $id)
    {
        $res = $this->admin->updateUserInfoAndRole($request->input(),$id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    public function destroy($id)
    {
        $user = $this->admin->find($id);
        if ($user->hasRole('admin')) {
            return response()->json(['status' => 0, 'msg' => '删除管理员？搞事情？'], 422);
        }
        if ($user->id == \Auth::id()){
            return response()->json(['status' => 0, 'erromsgr' => '不允许删除自己？搞事情？'], 422);
        }
        $user->delete();
        return response()->json(['status' => 1, 'msg' => '删除成功']);
    }
}

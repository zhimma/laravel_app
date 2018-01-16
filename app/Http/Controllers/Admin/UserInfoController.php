<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserInfoRequest;
use App\Models\Admin;
use App\Repositories\Eloquent\AdminRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInfoController extends Controller
{
    protected $admin;

    public function __construct(AdminRepository $admin)
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Admin::findOrFail($id);

        return view('admin.userInfo.edit')->with('data', $data);
    }


    public function update(UserInfoRequest $request, $id)
    {
        $res = $this->admin->update($request->input(),$id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    public function upload(Request $request)
    {

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            $allowExtension = ["png", "jpg", "gif"];
            if (!($extension && in_array($extension, $allowExtension))) {
                return response()->json(['status' => 0, 'msg' => '文件类型不允许']);
            }
            $destinationPath = 'uploads/images/avatar/';
            $fileName = str_random(10) . "_" . Carbon::now()->timestamp . "_" . $request->name;
            $avatar->move($destinationPath, $fileName);

            return response()->json(['status' => 1, 'path' => asset($destinationPath . $fileName)]);
        }

        return response()->json(['status' => 0, 'msg' => '上传错误']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

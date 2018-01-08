<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use App\Repositories\Eloquent\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index');
    }

    public function ajaxGetList(Request $request)
    {
        $return = $this->permission->ajaxGetList($request);

        return response()->json($return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $res = $this->permission->create($request->post());
        if ($res) {
            return ['status' => 1, 'msg' => '新增成功'];
        } else {
            return ['status' => 0, 'msg' => '新增失败'];
        }
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
        dd(111);
        return view('admin.permission.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 权限控制器
 *
 * @package App\Http\Controllers\Admin
 */
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

    /**
     * ajax获取列表
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月10日11:22:21
     */
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

    /**
     * 保存添加
     * @param PermissionRequest $request
     *
     * @return array
     * @throws \App\Repositories\Exceptions\RepositoryException
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月10日11:22:02
     */
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
     *
     * @param $id
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改
     * @param $id
     *
     * @return $this
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月10日11:21:42
     */
    public function edit($id)
    {
        $data = $this->permission->find($id);

        return view('admin.permission.edit')->with('data', $data);
    }

    /**
     * 更新保存
     * @param PermissionRequest $request
     * @param                   $id
     *
     * @return array
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月10日11:21:20
     */
    public function update(PermissionRequest $request, $id)
    {

        $res = $this->permission->update($request->input(), $id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    /**
     *
     * @param $id
     *
     * @return array
     * @throws \Exception
     * @throws \Throwable
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date
     */
    public function destroy($id)
    {
        $this->permission->delete($id);
        return ['status' => 1, 'msg' => '删除成功'];

    }
}

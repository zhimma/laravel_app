<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    public function ajaxGetList(Request $request)
    {
        $return = $this->role->ajaxGetList($request);

        return response()->json($return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $res = $this->role->create($request->post());
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
        $role = $this->role->find($id);
        $roleName = $role->toArray();
        $permission = $role->perms->toArray();
        $permissionIds = array_column($permission, 'id');
        $allPermission = Permission::all()->toArray();
        foreach ($allPermission as $key => &$value) {
            if (in_array($value['id'], $permissionIds)) {
                $value['checked'] = "checked";
            } else {
                $value['checked'] = '';
            }
        }

        $allPermission = $this->groupPermissions($allPermission);
        $data = ['allPermission' => $allPermission['admin'], 'role' => $roleName];

        return view('admin.role.show')->with(['data' => $data]);
    }

    public function groupPermissions($permissions)
    {
        $array = [];
        foreach ($permissions as $permission) {
            array_set($array, $permission['name'], $permission);
        }

        return $array;
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
        $data = $this->role->find($id);

        return view('admin.role.edit')->with('data', $data);
    }

    public function update(RoleRequest $request, $id)
    {
        $res = $this->role->update($request->input(), $id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    public function updateAuth(Request $request, $id)
    {
        $this->role->updateAuth($request,$id);
        return ['status' => 1, 'msg' => '授权成功'];
    }

    public function destroy($id)
    {
        $this->role->delete($id);
        return ['status' => 1, 'msg' => '角色删除成功'];
    }
}

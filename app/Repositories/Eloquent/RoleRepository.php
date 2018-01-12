<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2018/1/4 下午10:05
 */

namespace App\Repositories\Eloquent;

use App\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class RoleRepository extends BaseRepository
{
    public function model()
    {
        return Role::class;
    }

    public function ajaxGetList($request)
    {
        $draw = request('draw', 1);
        $start = request('start', 0);
        $length = request('length', 10);
        //排序
        $order['name'] = $request->input('columns.' . $request->input('order.0.column') . '.data');
        $order['dir'] = $request->input('order.0.dir', 'asc');
        //搜索
        $search['value'] = $request->input('search.value', '');
        $search['regex'] = $request->input('search.regex', false);
        $model = $this->makeModel();
        if ($search['value']) {
            $model = $model->where('display_name', 'like', "%{$search['value']}%");
        }
        $totalRecords = $model::count();
        $data = $model->orderBy($order['name'], $order['dir'])->offset($start)->limit($length)->get()->toArray();

        if ($request->has('btn')) {
            $btn = $request->input('btn');
            foreach ($data as $key => &$value) {
                $btn['edit_btn']['params'] = ['id' => $value['id']];
                $btn['delete_btn']['params'] = ['id' => $value['id']];
                $btn['auth_btn']['params'] = ['id' => $value['id']];
                $value['btn'] = BA($btn['auth_btn']) . BA($btn['edit_btn']) . BA($btn['delete_btn']);
            }
        }

        return [
            //第几页
            'draw'            => $draw,
            //总数量
            'recordsTotal'    => $totalRecords,
            //查询到的总数量
            'recordsFiltered' => $totalRecords,
            'data'            => $data
        ];

    }

    public function updateAuth($request,$id)
    {
        $permissions = $request->input('permission');
        $role = $this->model()::findOrFail($id);
        DB::transaction(function () use ($permissions, $id, $role) {
            //清除以前的权限
            $role->detachPermissions($role->perms);
            $role->perms()->sync($permissions);
        });
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id); // Pull back a given role
        $role->users()->sync([]); // Delete relationship data
        $role->perms()->sync([]); // Delete relationship data
        $role->forceDelete(); // 删除角色

    }
}
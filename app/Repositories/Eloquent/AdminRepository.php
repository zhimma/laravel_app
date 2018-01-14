<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/14 15:13
 */

namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Models\Role;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class AdminRepository extends BaseRepository
{
    public function model()
    {
        return Admin::class;
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
        $model = $model->where('is_del', 0);
        if ($search['value']) {
            $model = $model->where('name', 'like', "%{$search['value']}%");
        }
        $totalRecords = $model->count();

        $data = $model->orderBy($order['name'], $order['dir'])->offset($start)->limit($length)->get();

        if ($request->has('btn') && !empty($data)) {
            $btn = $request->input('btn');
            foreach ($data as $key => &$value) {
                $value['status'] = ($value['status'] == 1) ? '启用' : '禁用';
                $btn['edit_btn']['params'] = ['id' => $value['id']];
                $btn['delete_btn']['params'] = ['id' => $value['id']];
                $value['btn'] = BA($btn['edit_btn']) . BA($btn['delete_btn']);
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

    public function update(array $attributes, $id)
    {
        $user = Admin::find($id);
        foreach ($user->roles as $role) {
            $roles[] = $role->id;
        }
        $old_role = Role::findOrfail($roles[0]);

        $new_role = Role::findOrfail($attributes['role_id']);
        // 删除原用户组
        $user->detachRole($old_role);
        $user->attachRole($new_role);
        if ($user->hasRole($new_role->name)) {
            return true;
        } else {
            return false;
        }
    }
}
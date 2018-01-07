<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2018/1/4 下午10:05
 */

namespace App\Repositories\Eloquent;

use App\Models\Permission;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class PermissionRepository extends BaseRepository
{
    public function model()
    {
        return Permission::class;
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
}
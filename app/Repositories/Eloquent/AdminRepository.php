<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/14 15:13
 */

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Request;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class AdminRepository extends BaseRepository
{
    public function model()
    {
        return "App\Models\Admin";
    }

    public function ajaxGetUsers($request)
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
        $totalRecords = $model::count();
        if ($search['value']) {
            $model = $model->where('name', 'like', "%{$search['value']}%");
        }
        $data = $model->orderBy($order['name'], $order['dir'])->offset($start)->limit($length)->get()->toArray();

        return [
            //第几页
            'draw'            => $draw,
            //总数量
            'recordsTotal'    => $totalRecords,
            //查询到的总数量
            'recordsFiltered' => count($data),
            'data'            => $data
        ];
    }
}
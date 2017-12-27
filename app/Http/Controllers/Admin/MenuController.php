<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Repositories\Eloquent\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenus = $this->menu->findWhere(['parent_id' => 0], ['id', 'name']);
        $allMenus = $this->menu->refreshAndGetAllMenus();

        return view('admin.menu.index')->with(['parentMenus' => $parentMenus, 'allMenus' => $allMenus]);
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
    public function store(MenuRequest $request)
    {
        $res = $this->menu->create($request->all());
        if ($res) {
            $this->menu->refreshAndGetAllMenus(true);
            flash('菜单添加成功', 'success');
        } else {
            flash('菜单添加失败', 'error');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //sd

    }

    /**
     * 获取要编辑菜单的数据
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 马雄飞 <mma5694@gmail.com>
     * @date   2017年12月27日16:53:28
     */
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        if (!empty($menu)) {
            $return = ['status' => 1, 'data' => $menu, 'url' => url('admin/menu/' . $id)];
        } else {
            $return = ['status' => 0, 'data' => []];
        }

        return response()->json($return);
    }

    /**
     * 更新修改后的数据
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月27日22:30:37
     */
    public function update(MenuRequest $request,$id)
    {
        $menu = $this->menu->find($id);
        if (!empty($menu)) {
            $res = $menu->where('id',$id)->update($request->all());
            if ($res) {
                $this->menu->refreshAndGetAllMenus(true);
                flash('修改成功', 'success');
            } else {
                flash('修改失败', 'error');
            }
            return redirect()->back();

        } else {
            abort(404, '菜单数据获取失败');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}

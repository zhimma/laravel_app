<?php

namespace App\Repositories\Presenter;

use App\Repositories\Eloquent\MenuRepository;
use Illuminate\Support\Facades\Cache;

class MenuPresenter
{
    /**
     * 获取主菜单
     *
     * @param $menus
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月25日23:01:11
     */
    public function getParentMenu($menus)
    {
        $option = '<option value="0">一级菜单</option>';
        if (!empty($menus)) {
            foreach ($menus as $menu) {
                $option .= "<option value='{$menu->id}'>{$menu->name}</option>";
            }
        }

        return $option;

    }

    /**
     * 获取菜单列表
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月26日22:24:19
     */
    public function getMenuList()
    {
        $menus = Cache::get('menus');

        $mainStr = '<ol class="dd-list">';
        foreach ($menus as $key => $value) {
            $mainStr .= '<li class="dd-item dd-nodrag" data-id="' . $value['id'] . '">';
            $mainStr .= '<div class="dd-handle">' . $value['name'] . $this->getActionButtons($value) . '</div>';
            $mainStr .= '<ol class="dd-list">';
            if (!empty($value['_child'])) {
                $mainStr .= $this->getSecond($value['_child']);
            }
            $mainStr .= '</ol></li>';
        }


        $mainStr .= '</ol>';

        return $mainStr;


    }

    /**
     * 二级菜单
     *
     * @param $menu
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月26日22:34:57
     */
    public function getSecond($menu)
    {
        $secondMenusStr = '';
        foreach ($menu as $key => $value) {
            $secondMenusStr .= '<li class="dd-item dd-nodrag" data-id="' . $value['id'] . '">';
            $secondMenusStr .= '<div class="dd-handle">' . $value['name'] . $this->getActionButtons($value, false) . '</div>';
            $secondMenusStr .= '</li>';
        }

        return $secondMenusStr;
    }

    public function getActionButtons($menu, $bool = true)
    {
        $buttons = '<div class="pull-right action-buttons">';
        if (auth()->user()->can('admin/menu/create') && $bool) {
            $buttons .= '<a href="javascript:;" data-pid="' . $menu['id'] . '" class="btn-xs createMenu" data-toggle="tooltip" data-original-title="添加"  data-placement="top"> <i class="fa fa-plus"></i></a>';
        }
        if (auth()->user()->can('admin/menu/edit')) {
            $buttons .= '<a href="javascript:;" data-href="' . url("admin/menu/{$menu['id']}/edit") . '" class="btn-xs editMenu" data-toggle="tooltip" data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>';
        }
        if (auth()->user()->can('admin/menu/destory')) {
            $buttons .= '<a href="javascript:;" class="btn-xs destoryMenu" data-id="' . $menu['id'] . '" data-original-title="删除" data-toggle="tooltip" data-placement="top"> <i class="fa fa-trash"></i>
                        <form action="' . url("admin/menu", [$menu['id']]) . '" method="POST" name="delete_item' . '1' . '" style="display:none"><
                        input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="' . csrf_token() . '">
                        </form></a>';
        }
        $buttons .= '</div>';

        return $buttons;
    }
}
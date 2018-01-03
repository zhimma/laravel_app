<?php

namespace App\Repositories\Presenter;

use Illuminate\Support\Facades\Cache;

/**
 * 菜单
 *
 * @package App\Repositories\Presenter
 */
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

    /**
     * 菜单按钮
     *
     * @param      $menu
     * @param bool $bool
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月28日15:54:30
     */
    public function getActionButtons($menu, $bool = true)
    {
        $buttons = '<div class="pull-right action-buttons">';
        if (auth()->user()->can('admin/menu/create') && $bool) {
            $buttons .= '<a href="javascript:;"  data-href="' . url("admin/menu") . '" data-pid="' . $menu['id'] . '" class="btn-xs createMenu" data-toggle="tooltip" data-original-title="添加"  data-placement="top"> <i class="fa fa-plus"></i></a>';
        }
        if (auth()->user()->can('admin/menu/edit')) {
            $buttons .= '<a href="javascript:;" data-href="' . url("admin/menu/{$menu['id']}/edit") . '" class="btn-xs editMenu" data-toggle="tooltip" data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>';
        }
        if (auth()->user()->can('admin/menu/destroy')) {
            if ($menu['parent_id'] == 0) {
                if (empty($menu['_child'])) {
                    $buttons .= '<a href="javascript:;" class="btn-xs destroyMenu" data-id="' . $menu['id'] . '" data-original-title="删除" data-toggle="tooltip" data-placement="top"> <i class="fa fa-trash"></i>
                        <form action="' . url("admin/menu", [$menu['id']]) . '" method="POST" class="j_delete_menu_item' . '" style="display:none">
                        <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">
                        </form>
                        </a>';
                }
            } else {
                $buttons .= '<a href="javascript:;" class="btn-xs destroyMenu" data-id="' . $menu['id'] . '" data-original-title="删除" data-toggle="tooltip" data-placement="top"> <i class="fa fa-trash"></i>
                        <form action="' . url("admin/menu", [$menu['id']]) . '" method="POST" class="j_delete_menu_item' . '" style="display:none">
                        <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">
                        </form>
                        </a>';
            }

        }
        $buttons .= '</div>';

        return $buttons;
    }

    /**
     *
     * @param $menus
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月28日17:09:37
     */
    public function sideBarMenuList($menus)
    {
        $html = '';
        foreach ($menus as $key => $value) {
            if (!empty($value['_child'])) {
                $html .= '<li><a><i class="fa fa-home"></i> ' . $value['name'] . ' <span class="fa fa-chevron-down"></span></a>';
                $html .= '<ul class="nav child_menu">';
                foreach ($value['_child'] as $k => $v) {
                    $html .= '<li><a href="'.url($v['url']).'">'.$v['name'].'</a></li>';
                }
                $html .= '</ul></li>';
            }else{
                $html .= '<li><a href="'.url($value['url']).'"><i class="fa fa-home"></i> ' . $value['name'] . '</a>';
            }
        }
        return $html;
    }
}
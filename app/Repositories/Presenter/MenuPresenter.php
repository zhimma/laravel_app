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

    public function getMenuList()
    {
        $menus = Cache::get('menus');

        $mainStr = '<ol class="dd-list">';
        foreach ($menus as $key => $value) {
            $mainStr .= '<li class="dd-item" data-id="' . $value['id'] . '">';
            $mainStr .= '<div class="dd-handle">' . $value['name'] . '</div>';
            $mainStr .= '<ol class="dd-list">';
            if (!empty($value['_child'])) {
                $mainStr  .= $this->getSecond($value['_child']);
            }
            $mainStr .= '</ol></li>';
        }


        $mainStr .= '</ol>';
        return $mainStr;


    }

    public function getSecond($menu)
    {
        $secondMenusStr = '';
        foreach ($menu as $key => $value) {
            $secondMenusStr .= '<li class="dd-item" data-id="' . $value['parent_id'] . '">';
            $secondMenusStr .= '<div class="dd-handle">' . $value['name'] . '</div>';
            $secondMenusStr .= '</li>';
        }
        return $secondMenusStr;
    }
}
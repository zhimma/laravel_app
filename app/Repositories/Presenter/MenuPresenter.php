<?php
namespace App\Repositories\Presenter;

class MenuPresenter
{
    public function getParentMenu($menus)
    {
        $option = '<option value="0">一级菜单</option>';
        if(!empty($menus)){
            foreach($menus as $menu){
                $option .= "<option value='{$menu->id}'>{$menu->name}</option>";
            }
        }
        return $option;

    }
}
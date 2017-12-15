<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new \App\Models\Menu();
        $menu->parent_id = 0;
        $menu->name = '主页';
        $menu->url = '';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();
        $menu = new \App\Models\Menu();
        $menu->parent_id = 0;
        $menu->name = '系统管理';
        $menu->url = '';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();
        $menu = new \App\Models\Menu();
        $menuData = $menu::where('name','系统管理')->first();
        $menu->parent_id = $menuData->id;
        $menu->name = '用户管理';
        $menu->url = 'admin/user';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();
        $menu = new \App\Models\Menu();
        $menu->parent_id = $menuData->id;
        $menu->name = '角色管理';
        $menu->url = 'admin/role';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu = new \App\Models\Menu();
        $menu->save();
        $menu->parent_id = $menuData->id;
        $menu->name = '菜单管理';
        $menu->url = 'admin/menu';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();
    }
}

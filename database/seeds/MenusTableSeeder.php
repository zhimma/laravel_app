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
        $menu->name = '控制台';
        $menu->url = 'admin/index';
        $menu->slug = 'admin.index';
        $menu->icon = 'icon';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menu->parent_id = 0;
        $menu->name = '权限设置';
        $menu->url = '';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menu->parent_id = 0;
        $menu->name = '菜单设置';
        $menu->url = 'admin/menu';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menuData = $menu::where('name','权限设置')->first();
        $menu->parent_id = $menuData->id;
        $menu->name = '用户管理';
        $menu->url = 'admin/user';
        $menu->slug = 'admin.user';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menuData = $menu::where('name','权限设置')->first();
        $menu->parent_id = $menuData->id;
        $menu->name = '角色管理';
        $menu->url = 'admin/role';
        $menu->slug = 'admin.role';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menuData = $menu::where('name','权限设置')->first();
        $menu->parent_id = $menuData->id;
        $menu->name = '权限管理';
        $menu->url = 'permission/role';
        $menu->slug = 'permission.role';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();

        $menu = new \App\Models\Menu();
        $menuData = $menu::where('name','菜单设置')->first();
        $menu->parent_id = $menuData->id;
        $menu->name = '菜单管理';
        $menu->url = 'admin/menu';
        $menu->slug = 'admin.menu';
        $menu->icon = '';
        $menu->sort = 0;
        $menu->is_show = 1;
        $menu->save();
    }
}

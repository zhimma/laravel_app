<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'admin.user.create','display_name'=>'添加用户','description'=>'添加用户','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.user.edit','display_name'=>'编辑用户','description'=>'编辑用户','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.user.destroy','display_name'=>'删除用户','description'=>'删除用户','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.menu.create','display_name'=>'添加菜单','description'=>'添加菜单','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.menu.edit','display_name'=>'编辑菜单','description'=>'编辑菜单','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.menu.destroy','display_name'=>'删除菜单','description'=>'删除菜单','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.permission.create','display_name'=>'添加权限','description'=>'添加权限','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.permission.edit','display_name'=>'编辑权限','description'=>'编辑权限','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.permission.destroy','display_name'=>'删除权限','description'=>'删除权限','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.role.create','display_name'=>'添加角色','description'=>'添加角色','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.role.edit','display_name'=>'编辑角色','description'=>'编辑角色','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'admin.role.destroy','display_name'=>'删除角色','description'=>'删除角色','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],

        ]);
    }
}

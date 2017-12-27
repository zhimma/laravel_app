<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Roles')->insert([
                                       ['name' => 'admin', 'display_name' => '超级管理员', 'description' => 'super user', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                                       ['name' => 'user', 'display_name' => '普通管理员', 'description' => 'user', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
                                   ]);

        $allPermission = array_column(\App\Models\Permission::all()->toArray(),'id');
        $role = new \App\Models\Role();
        $role->perms()->sync($allPermission);

        $createUser = \App\Models\Permission::where('display_name','创建用户')->first();
        $role = new \App\Models\Role();
        $role->attachPermission($createUser);
    }
}

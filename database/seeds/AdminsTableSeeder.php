<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $userRole = \App\Models\Role::where('name', 'user')->first();

        $admin = factory('App\Models\Admin')
            ->create([
                         'name' => 'mma',
                         'nickname' => 'mma',
                         'email'    => 'mma@laravel.com',
                         'password' => bcrypt('123456')
                     ])->each(function ($u) use ($adminRole) {
                $u->attachRole($adminRole);
            });
        $faker = \Faker\Factory::create();

        $user = factory('App\Models\Admin')
            ->create([
                         'password' => bcrypt('123456'),
                     ])->each(function ($u) use ($userRole) {
                $u->roles()->attach($userRole->id);
            });

        $createUser = \App\Models\Permission::where('display_name', '添加用户')->first();
        $userRole->attachPermission($createUser);

        $allPermission = \App\Models\Permission::get();
        $ids = array_column($allPermission->toArray(), 'id');
        $adminRole->perms()->sync($ids);
    }
}

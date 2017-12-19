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
                         'name'     => 'mma',
                         'email'    => 'mma@laravel.com',
                         'password' => bcrypt('123456')
                     ])->each(function ($u) use ($adminRole) {
                $u->attachRole($adminRole);
            });
        $user = factory('App\Models\Admin', 3)
            ->create([
                         'password' => bcrypt('123456')
                     ])->each(function ($u) use ($userRole) {
                $u->roles()->attach($userRole->id);
            });

    }
}

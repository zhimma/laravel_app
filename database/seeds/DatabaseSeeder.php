<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(NavigateSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
    }
}

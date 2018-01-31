<?php

use Illuminate\Database\Seeder;

class NavigateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navigates')->insert([
                                           'name'   => '主页',
                                           'url'    => env('APP_URL'),
                                           'sort'   => 0,
                                           'status' => 1

                                       ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categorys')->insert([
                                                   'parent_id'   => 0,
                                                   'name'        => 'PHP',
                                                   'description' => 'PHP',
                                                   'status'      => 1
                                               ]);
    }
}

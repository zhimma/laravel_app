<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->default(0);
            $table->string('name')->comment('菜单名称')->default('');
            $table->string('url')->comment('菜单链接')->default('');
            $table->string('slug')->comment('菜单权限标识')->default('');
            $table->string('icon')->comment('菜单图标')->default('');
            $table->integer('sort')->comment('排序')->default(0);
            $table->tinyInteger('is_show')->comment('是否显示')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

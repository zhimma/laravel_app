<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name')->default('')->comment('名称');
            $table->string('description')->default('')->comment('名称');
            $table->tinyInteger('status')->default(1)->comment('状态：1-启用，0-禁用');
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
        Schema::dropIfExists('article_categorys');
    }
}

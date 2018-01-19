<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('导航名称');
            $table->string('url')->default('')->comment('url');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('status')->default(1)->statuscomment('状态：1-显示，0-不显示');
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
        Schema::dropIfExists('navigates');
    }
}

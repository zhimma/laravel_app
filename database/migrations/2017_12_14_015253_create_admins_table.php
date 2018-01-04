<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('账号');
            $table->string('nickname')->default('')->comment('昵称');
            $table->string('phone')->default('')->comment('手机号');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('password');
            $table->string('avatar')->default('')->comment('头像');
            $table->tinyInteger('status')->default(1)->comment('状态 0：禁用');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除 1：删除');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table){
            //display_name 显示名称 比如管理员 编辑 客服
            //name 机读名称  admin editor customer_service
            $table->increments('id');
            $table->string('display_name',10)->unique()->nouNull;
            $table->string('name')->notNull()->unique();
        });
        Schema::create('admin_role_rel', function (Blueprint $table){
            //这个是权限与角色之间的关联表
            $table->string('admin_id')->notNull();
            $table->string('role_id')->notNull();
         });
        Schema::create('permission', function (Blueprint $table){
            //这个是权限表
            $table->increments('id');
            $table->string('display_name',10)->unique()->notNull();
            $table->string('name',10)->notNull()->unique();
        });
        Schema::create('role_permission_rel', function (Blueprint $table){
            $table->integer('role_id')->notNull();
            $table->integer('permission_id')->notNull();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

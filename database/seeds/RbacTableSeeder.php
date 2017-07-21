<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Admin;
use App\Permission;
class RbacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->display_name = '管理员';
        $role->name = 'admin';
        $role->save();

        $role1 = new Role();
        $role1->display_name = '编辑';
        $role1->name = 'editor';
        $role1->save();

        $role2 = new Role();
        $role2->display_name = '客服';
        $role2->name = 'customer_service';
        $role2->save();

        $admin =  Admin::where('name','123')->first();
        $admin->roles()->sync([$role1->id,$role2->id]);
        Admin::where('name','严阳')->first()->roles()->sync([$role2->id]);

        $permission = new Permission();
        $permission->display_name = '添加文章';
        $permission->name = 'add-article';
        $permission->save();

        $permission1 = new Permission();
        $permission1->display_name = '修改文章';
        $permission1->name = 'modify-article';
        $permission1->save();

        $permission2 = new Permission();
        $permission2->display_name = '删除文章';
        $permission2->name = 'deltele-article';
        $permission2->save();

        $permission3 = new Permission();
        $permission3->display_name = '查看文章';
        $permission3->name = '-article';
        $permission3->save();

        $permission4 = new Permission();
        $permission4->display_name = '和客户聊天';
        $permission4->name = 'chat';
        $permission4->save();

        $role1->permissions()->sync([$permission->id,$permission1->id,$permission2->id,$permission3->id]);

        $role2->permissions()->sync([$permission4->id]);
    }
}

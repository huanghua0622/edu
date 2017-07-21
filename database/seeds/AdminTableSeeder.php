<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Faker\Factory;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('zh_CN');//这个 表示生成的假数据是中文的
        //给这个admin表添加1000条不重复的看起来比较真实的管理员
        $usernames = [];//这个空的数组是用来保存这个已经生成的假的用户名
        for($i =0; $i<200; $i++){
            $admin = new Admin();
            $admin->password = bcrypt('111111');
            $admin->name=$faker->name;
            if(in_array($admin->name,$usernames)){
                $i--;
            }else{
                $admin->save();
                $usernames[] = $admin->name;
            }
        }
    }
}

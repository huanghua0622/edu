<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //对应的表
    protected $table = 'role';
    protected $fillable = ['display_name','name'];
    //关闭字段信息
    public $timestamps = false;
    //确定当前模型和权限之间的关系
    public function permissions()
    {
        return $this->belongsToMany('App\Permission','role_permission_rel','role_id','permission_id');

    }
}

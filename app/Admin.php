<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User;
class Admin extends User
{
    protected $table = 'admin';
    protected $fillable = ['name','password','status'];
    public $timestamps = false;
    public function roles()
    {
        return $this->belongsToMany('App\Role','admin_role_rel','admin_id','role_id');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index');
    }
    public function data()
    {
        $admins = Admin::with('roles')->orderBy('id','desc')->offset(0)->limit(10)->get();
        return response()->json([
           'data' => $admins->toArray(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function welcome()
    {
        return view('admin.dashboard.welcome');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

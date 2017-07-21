<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rules\In;
use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Auth;
use Redirect;
class SecurityController extends Controller
{
    // 这个login方法显示这个登陆页面
    public function login()
    {
        return view('admin.security.login');
    }
    public function loginCheck()
    {
        //先接收表单提交上来的数据
        $formData = Input::only(['name','password','captcha','keepLogin']);
        //检验这个数据的合法性
        $validator = Validator::make($formData,[
           'name' => 'required|min:2|max:4',
            'password' => 'required|min:6|max:20',
            'captcha' => 'required|captcha',
        ]);
        if($validator->passes()){
            //表示这个验证通过
            //检查用户名和密码是否正确
            if(Auth::guard('admin')->attempt(['name'=>$formData['name'],'password'=>$formData['password']],$formData['keepLogin']==1)){
                //登录成功 跳转到后台首页
                return redirect('admin/dashboard');
            }else{
                //验证没有通过 跳转到登录界面 携带上这个错误信息
                $errors = $validator->errors();
                return redirect('admin/login')->withErrors($errors);
            }
        }
        else {
            // 验证未通过，跳转到登陆页面，携带上这个错误信息
            $errors = $validator->errors(); // messages()
            return Redirect::to("/admin/login")->withErrors($errors);
        }
    }


}

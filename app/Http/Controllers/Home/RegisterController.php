<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once 'resources/org/code/Code.class.php';

class RegisterController extends CommonController
{
    public function index()
    {
        return view('home.user.register');
    }

    public function register()
    {
        $input = Input::except('_token');
        $rules = [
            'user_name' => 'required|min:3|unique:users,user_name',
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'required|between:6,20|confirmed',
        ];

        $message = [
            'user_name.required' => '用户名不能为空！',
            'user_name.unique' => '该用户名已被注册！',
            'user_email.unique' => '该邮箱已被注册！',
            'user_email.required' => '邮箱不能为空！',
            'user_password.required' => '邮箱不能为空！',
            'user_password.confirmed' => '密码和确认密码不一致！',
            'user_password.between' => '密码应在6-20个字符之间！',
        ];


        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $input['user_password'] = encrypt($input['user_password']);
            $input['user_password_confirmation'] = encrypt($input['user_password_confirmation']);
            $re = Users::create($input);
            if ($re) {
                return redirect('/login');
            } else {
                session(['_error' => '注册失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }
}

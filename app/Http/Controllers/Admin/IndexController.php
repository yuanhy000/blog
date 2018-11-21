<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    //更改管理员密码
    public function pass()
    {
//        session(['_error' => null]);
        if ($input = Input::all()) {

            $rules = [//新密码不为空,在6-20位之间,与确认密码比较
                'password' => 'required|between:6,20|confirmed',
            ];

            $message = [//相应中文错误信息
                'password.required' => '新密码不能为空！',
                'password.between' => '新密码应在6-20位之间！',
                'password.confirmed' => '新密码和确认密码不一致！',
            ];

            $validator = Validator::make($input, $rules, $message);

            if ($validator->passes()) {
                $user = Admin::first(); //读取相应数据库表中的第一条数据
                $_password = Crypt::decrypt($user->admin_pass);
                if ($input['password_o'] == $_password) {
                    $user->admin_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    session(['_right' => '密码修改成功！']);
                    return back();
                } else {
                    session(['_error' => '原密码错误！']);
                    return back();
//                    return back()->with('errors','原密码错误！');
//                    错误（errors）暂存在@foreach($errors->all() as $error)中的errors中
                }
            } else {
                return back()->withErrors($validator);
            }
        } else {
            return view('admin.pass');
        }
    }
}

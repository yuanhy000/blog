<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function index()
    {
        return view('home.user.login');
    }

    public function login()
    {
        if ($input = Input::all()) {
            //判断登录验证码
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '验证码错误！');
            }
            //判断用户名密码
            $user = Users::where('user_email',$input['user_email'])->first();
            if ($user->user_email != $input['user_email'] || decrypt($user->user_password) != $input['user_password']) {
                return back()->with('msg', '邮箱密码错误！');
            }
            session(['user' => $user]);
//            dd(session('user'));
            return redirect(session('url'));
        } else {
            session(['user' => null]);
            return view('user.login');
        }
    }

    public function logout()
    {
        session(['user' => null]);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        //Input::all判断是否有数据传入
        if ($input = Input::all()) {
            //判断登录验证码
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '验证码错误！');
            }
            //判断用户名密码
            $user = Admin::first();
            if ($user->admin_name != $input['user_name'] || Crypt::decrypt($user->admin_pass) != $input['user_pass']) {
                return back()->with('msg', '用户名或密码错误！');
            }
            session(['admin' => $user]);
//            dd(session('user'));
            return redirect('admin');
        } else {
            session(['admin' => null]);
            return view('admin.login');
        }
    }

    public function code()
    {
        ob_clean();
        $code = new \Code;
        $code->make();
    }

    public function quit()
    {
        session(['user' => null]);
        return redirect('admin/login');
    }
}

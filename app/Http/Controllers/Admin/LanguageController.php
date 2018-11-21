<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Language;
use App\Http\Model\Topic;
use App\Http\Model\Word;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LanguageController extends CommonController
{
    //get.admin/language   全部训练列表
    public function index()
    {
        //排序,分页
        $data = Language::orderBy('lan_id', 'desc')->paginate(9);

        return view('admin/language/index', compact('data', 'note'));
    }

    //get.admin/language/create   添加训练
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/language/add', compact('data'));
    }

    //post.admin/language   添加训练提交
    public function store()
    {
        $input = Input::except('_token');
        $input['lan_time'] = time();

        $input['right_id'] = time() % 3;

//        do{
//            $input['error1_id'] = time() % 3;
//        }while($input['right_id']==$input['error1_id']);
//
//        do{
//            $input['error2_id'] = time() % 3;
//        }while($input['right_id']==$input['error2_id']||$input['error1_id']==$input['error2_id']);

        $rules = [
            'lan_right' => 'required',
            'lan_error1' => 'required',
            'lan_error2' => 'required',
        ];

        $message = [
            'lan_right.required' => '正确答案不能为空！',
            'lan_error1.required' => '错误答案1不能为空！',
            'lan_error2.required' => '错误答案2不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $re = Language::create($input);
            if ($re) {
                return redirect('admin/language');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/language/{language}/edit   编辑训练
    public function edit($lan_id)
    {
        $data = (new Topic())->tree();
        $field = Language::find($lan_id);
        return view('admin.language.edit', compact('data', 'field'));
    }

    //put.admin/language/{language}   更新分类
    public function update($lan_id)
    {
        $input = Input::except('_token', '_method');
        $re = Language::where('lan_id', $lan_id)->update($input);
        if ($re) {
            return redirect('admin/language');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/language/{language}   删除单篇训练

    public function destroy($lan_id)
    {
        $re = Language::where('lan_id', $lan_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '训练删除成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '训练删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}

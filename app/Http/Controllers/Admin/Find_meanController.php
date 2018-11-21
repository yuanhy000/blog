<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Find_mean;
use App\Http\Model\Language;
use App\Http\Model\Topic;
use App\Http\Model\Word;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Find_meanController extends CommonController
{
    //get.admin/find_mean   全部训练列表
    public function index()
    {
        //排序,分页
        $data = Find_mean::orderBy('fm_id', 'desc')->paginate(9);

        return view('admin/find_mean/index', compact('data', 'note'));
    }

    //get.admin/find_mean/create   添加训练
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/find_mean/add', compact('data'));
    }

    //post.admin/find_mean   添加训练提交
    public function store()
    {
        $input = Input::except('_token');
        $input['fm_time'] = time();

        $input['right_id'] = time() % 4;

//        do{
//            $input['error1_id'] = time() % 3;
//        }while($input['right_id']==$input['error1_id']);
//
//        do{
//            $input['error2_id'] = time() % 3;
//        }while($input['right_id']==$input['error2_id']||$input['error1_id']==$input['error2_id']);

        $rules = [
            'fm_right' => 'required',
            'fm_error1' => 'required',
            'fm_error2' => 'required',
        ];

        $message = [
            'fm_right.required' => '正确答案不能为空！',
            'fm_error1.required' => '错误答案1不能为空！',
            'fm_error2.required' => '错误答案2不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $re = Find_mean::create($input);
            if ($re) {
                return redirect('admin/find_mean');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/find_mean/{find_mean}/edit   编辑训练
    public function edit($fm_id)
    {
        $data = (new Topic())->tree();
        $field = Find_mean::find($fm_id);
        return view('admin.find_mean.edit', compact('data', 'field'));
    }

    //put.admin/find_mean/{find_mean}   更新分类
    public function update($fm_id)
    {
        $input = Input::except('_token', '_method');
        $re = Find_mean::where('fm_id', $fm_id)->update($input);
        if ($re) {
            return redirect('admin/find_mean');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/find_mean/{find_mean}   删除单篇训练

    public function destroy($fm_id)
    {
        $re = Find_mean::where('fm_id', $fm_id)->delete();
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

    public function show()
    {

    }
}

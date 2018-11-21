<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Find_mean;
use App\Http\Model\Language;
use App\Http\Model\Topic;
use App\Http\Model\Watch_spell;
use App\Http\Model\Word;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Watch_spellController extends CommonController
{
    //get.admin/watch_spell   全部训练列表
    public function index()
    {
        //排序,分页
        $data = Watch_spell::orderBy('ws_id', 'desc')->paginate(9);

        return view('admin/watch_spell/index', compact('data', 'note'));
    }

    //get.admin/watch_spell/create   添加训练
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/watch_spell/add', compact('data'));
    }

    //post.admin/watch_spell   添加训练提交
    public function store()
    {
        $input = Input::except('_token');
        $input['ws_time'] = time();

        $input['right_id'] = time() % 4;

//        do{
//            $input['error1_id'] = time() % 3;
//        }while($input['right_id']==$input['error1_id']);
//
//        do{
//            $input['error2_id'] = time() % 3;
//        }while($input['right_id']==$input['error2_id']||$input['error1_id']==$input['error2_id']);

        $rules = [
            'ws_right' => 'required',
            'ws_error1' => 'required',
            'ws_error2' => 'required',
        ];

        $message = [
            'ws_right.required' => '正确答案不能为空！',
            'ws_error1.required' => '错误答案1不能为空！',
            'ws_error2.required' => '错误答案2不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $re = Watch_spell::create($input);
            if ($re) {
                return redirect('admin/watch_spell');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/watch_spell/{watch_spell}/edit   编辑训练
    public function edit($ws_id)
    {
        $data = (new Topic())->tree();
        $field = Watch_spell::find($ws_id);
        return view('admin.watch_spell.edit', compact('data', 'field'));
    }

    //put.admin/watch_spell/{watch_spell}   更新分类
    public function update($ws_id)
    {
        $input = Input::except('_token', '_method');
        $re = Watch_spell::where('ws_id', $ws_id)->update($input);
        if ($re) {
            return redirect('admin/watch_spell');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/watch_spell/{watch_spell}   删除单篇训练

    public function destroy($ws_id)
    {
        $re = Watch_spell::where('ws_id', $ws_id)->delete();
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

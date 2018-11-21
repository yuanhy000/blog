<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Find_mean;
use App\Http\Model\Language;
use App\Http\Model\Listen_spell;
use App\Http\Model\Topic;
use App\Http\Model\Watch_spell;
use App\Http\Model\Word;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Listen_spellController extends CommonController
{
    //get.admin/listen_spell   全部训练列表
    public function index()
    {
        //排序,分页
        $data = Listen_spell::orderBy('ls_id', 'desc')->paginate(9);

        return view('admin/listen_spell/index', compact('data', 'note'));
    }

    //get.admin/listen_spell/create   添加训练
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/listen_spell/add', compact('data'));
    }

    //post.admin/listen_spell   添加训练提交
    public function store()
    {
        $input = Input::except('_token');
        $input['ls_time'] = time();

//        do{
//            $input['error1_id'] = time() % 3;
//        }while($input['right_id']==$input['error1_id']);
//
//        do{
//            $input['error2_id'] = time() % 3;
//        }while($input['right_id']==$input['error2_id']||$input['error1_id']==$input['error2_id']);

        $rules = [
            'ls_name' => 'required',
        ];

        $message = [
            'ls_right.required' => '目标单词不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $re = Listen_spell::create($input);
            if ($re) {
                return redirect('admin/listen_spell');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/listen_spell/{listen_spell}/edit   编辑训练
    public function edit($ls_id)
    {
        $data = (new Topic())->tree();
        $field = Listen_spell::find($ls_id);
        return view('admin.listen_spell.edit', compact('data', 'field'));
    }

    //put.admin/listen_spell/{listen_spell}   更新分类
    public function update($ls_id)
    {
        $input = Input::except('_token', '_method');
        $re = Listen_spell::where('ls_id', $ls_id)->update($input);
        if ($re) {
            return redirect('admin/listen_spell');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/listen_spell/{listen_spell}   删除单篇训练

    public function destroy($ls_id)
    {
        $re = Watch_spell::where('ls_id', $ls_id)->delete();
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

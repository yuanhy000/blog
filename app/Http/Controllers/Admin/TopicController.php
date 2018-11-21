<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Topic;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TopicController extends CommonController
{
    //get.admin/topic   全部章节列表
    public function index()
    {
        //排序,分页
        $data = Topic::orderBy('top_id', 'desc')->paginate(9);
        return view('admin/topic/index', compact('data'));
    }

    //get.admin/topic/create   添加章节
    public function create()
    {
        $data = (new Textbook)->tree();

        return view('admin/topic/add', compact('data'));
    }

    //post.admin/topic   添加章节提交
    public function store()
    {
        $input = Input::except('_token');
        $input['top_time'] = time();

        $rules = [
            'top_name' => 'required',
        ];

        $message = [
            'top_name.required' => '章节名称不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Topic::create($input);
            if ($re) {
                return redirect('admin/topic');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/topic/{topic}/edit   编辑章节
    public function edit($top_id)
    {
        $data = (new Textbook)->tree();
        $field = Topic::find($top_id);
        return view('admin.topic.edit', compact('data', 'field'));
    }

    //put.admin/topic/{topic}   更新分类
    public function update($top_id)
    {
        $input = Input::except('_token', '_method');
        $re = Topic::where('top_id', $top_id)->update($input);
        if ($re) {
            return redirect('admin/topic');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/topic/{topic}   删除单篇章节

    public function destroy($top_id)
    {
        $re = Topic::where('top_id', $top_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '章节删除成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '章节删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}

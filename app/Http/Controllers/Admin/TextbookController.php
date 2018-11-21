<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Textbook;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TextbookController extends CommonController
{
    //get.admin/textbook   全部课本列表
    public function index()
    {
        //排序,分页
        $data = (new Textbook)->tree();      //自定义顺序  不分页
        //$data = Textbook::orderBy('text_id', 'desc')->paginate(9);    //根据id降序 分页
        return view('admin/textbook/index', compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $text = Textbook::find($input['text_id']);
        $text->text_order = $input['text_order'];
        $re = $text->update();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '分类排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/textbook/create   添加课本
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin/textbook/add', compact('data'));
    }

    //post.admin/textbook   添加课本提交
    public function store()
    {
        $input = Input::except('_token');
        $input['text_time'] = time();

        $rules = [
            'text_name' => 'required',
        ];

        $message = [
            'text_name.required' => '课本名称不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Textbook::create($input);
            if ($re) {
                return redirect('admin/textbook');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/textbook/{textbook}/edit   编辑课本
    public function edit($text_id)
    {
        $data = (new Category)->tree();
        $field = Textbook::find($text_id);
        return view('admin.textbook.edit', compact('data', 'field'));
    }

    //put.admin/textbook/{textbook}   更新分类
    public function update($text_id)
    {
        $input = Input::except('_token', '_method');
        $re = Textbook::where('text_id', $text_id)->update($input);
        if ($re) {
            return redirect('admin/textbook');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/textbook/{textbook}   删除单篇课本

    public function destroy($text_id)
    {
        $re = Textbook::where('text_id', $text_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '课本删除成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '课本删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}

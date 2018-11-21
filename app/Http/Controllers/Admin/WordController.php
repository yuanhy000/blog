<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Topic;
use App\Http\Model\Word;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WordController extends CommonController
{
    //get.admin/word   全部单词列表
    public function index()
    {
        //排序,分页
        $data = Word::orderBy('word_id', 'desc')->paginate(9);

        return view('admin/word/index', compact('data','note'));
    }

    //get.admin/word/create   添加单词
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/word/add', compact('data'));
    }

    //post.admin/word   添加单词提交
    public function store()
    {
        $input = Input::except('_token');
        $input['word_time'] = time();

        $rules = [
            'word_name' => 'required',
        ];

        $message = [
            'word_name.required' => '单词名称不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Word::create($input);
            if ($re) {
                return redirect('admin/word');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/word/{word}/edit   编辑单词
    public function edit($word_id)
    {
        $data = (new Topic())->tree();
        $field = Word::find($word_id);
        return view('admin.word.edit', compact('data', 'field'));
    }

    //put.admin/word/{word}   更新分类
    public function update($word_id)
    {
        $input = Input::except('_token', '_method');
        $re = Word::where('word_id', $word_id)->update($input);
        if ($re) {
            return redirect('admin/word');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/word/{word}   删除单篇单词

    public function destroy($word_id)
    {
        $re = Word::where('word_id', $word_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '单词删除成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '单词删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}

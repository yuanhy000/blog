<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Topic;
use App\Http\Model\Phrase;
use App\Http\Model\Textbook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhraseController extends CommonController
{
    //get.admin/phrase   
    public function index()
    {
        //排序,分页
        $data = Phrase::orderBy('ph_id', 'desc')->paginate(9);

        return view('admin/phrase/index', compact('data','note'));
    }

    //get.admin/phrase/create   
    public function create()
    {
        $data = (new Topic)->tree();
        return view('admin/phrase/add', compact('data'));
    }

    //post.admin/phrase   
    public function store()
    {
        $input = Input::except('_token');
        $input['ph_time'] = time();

        $rules = [
            'ph_name' => 'required',
        ];

        $message = [
            'ph_name.required' => '单词名称不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Phrase::create($input);
            if ($re) {
                return redirect('admin/phrase');
            } else {
                session(['_error' => '数据填充失败，请稍后重试！']);
                return back();
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/phrase/{phrase}/edit   
    public function edit($ph_id)
    {
        $data = (new Topic())->tree();
        $field = Phrase::find($ph_id);
        return view('admin.phrase.edit', compact('data', 'field'));
    }

    //put.admin/phrase/{phrase}   
    public function update($ph_id)
    {
        $input = Input::except('_token', '_method');
        $re = Phrase::where('ph_id', $ph_id)->update($input);
        if ($re) {
            return redirect('admin/phrase');
        } else {
            session(['_error' => '数据更新失败，请稍后重试！']);
            return back();
        }
    }

    //delete.admin/phrase/{phrase}   

    public function destroy($ph_id)
    {
        $re = Phrase::where('ph_id', $ph_id)->delete();
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

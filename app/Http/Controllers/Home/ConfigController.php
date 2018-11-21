<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Category;
use App\Http\Model\Language;
use App\Http\Model\Textbook;
use App\Http\Model\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends CommonController
{
    public function listen_config()
    {

        session(['condition' => 'listen']);

        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function word_config()
    {
        session(['condition' => 'word']);

        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function phrase_config()
    {
        session(['condition' => 'phrase']);

        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function language_config()
    {
        session(['condition' => 'language']);

        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function train_config()
    {
        session(['condition' => 'train']);

        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function config()
    {
        $grade = Category::where('cate_pid', 0)->get();

        $data = Category::where('cate_pid', 1)->get();

        return view('home.conf.conf', compact('grade', 'data'));
    }

    public function cate($cate_id)
    {

        //存儲年級
        session(['grade_id' => $cate_id]);

        $name = Category::where('cate_id', $cate_id)->first();

        session(['grade_name' => $name->cate_name]);


        //当前分类的子分类
        $submenu = Category::where('cate_pid', $cate_id)->get();

        return view('home.conf.conf_cate', compact('submenu'));
    }

    public function text($text_id)
    {

        //存儲冊序
        session(['level_id' => $text_id]);

        $name = Category::where('cate_id', $text_id)->first();

        session(['level_name' => $name->cate_name]);

        //当前分类的教材
        $textbook = Textbook::where('cate_id', $text_id)->get();

        return view('home.conf.conf_text', compact('textbook'));
    }

    public function top_listen($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $top_id)->get();

        //存儲课本
        session(['textbook_id' => $top_id]);

        return view('home.listen.topic_listen', compact('topic'));
    }

    public function top_word($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'explain']);

        return view('home.word.topic_word', compact('topic', 'get_text_id'));
    }

    public function top_self($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'self']);

        return view('home.self.topic_self', compact('topic', 'get_text_id'));
    }

    public function top_phrase($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_topic_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'explain']);

        return view('home.phrase.topic_phrase', compact('topic', 'get_topic_id'));
    }

    public function top_language($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'language']);

        for ($i = 1; $i<20; $i++) {
            $top_lan[$i] = Language::where('top_id', $i)->first();
        }
        return view('home.language.topic_language', compact('topic', 'get_text_id','top_lan'));
    }
}

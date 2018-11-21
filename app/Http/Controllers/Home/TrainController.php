<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Find_mean;
use App\Http\Model\Language;
use App\Http\Model\Listen_spell;
use App\Http\Model\Phrase;
use App\Http\Model\Textbook;
use App\Http\Model\Topic;
use App\Http\Model\Watch_spell;
use App\Http\Model\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Array_;

class TrainController extends Controller
{
    public function train($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        session(['textbook_id' => $top_id]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['condition' => 'train']);

        $topic = Topic::where('text_id', $top_id)->first();

        return view('home.train', compact('topic'));
    }

    public function top_find_mean($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'find_mean']);

        for ($i = 1; $i < 20; $i++) {
            $top_fm[$i] = Find_mean::where('top_id', $i)->first();
        }
        return view('home.find_mean.topic_find_mean', compact('topic', 'get_text_id', 'top_fm'));
    }


    public function find_mean_all($top_id, $fm_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['state' => 'find_mean']);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $find_mean = Find_mean::where([['fm_id', $fm_id], ['top_id', $top_id]])->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();

        $article['pre'] = Find_mean::where([['fm_id', '<', $fm_id], ['top_id', $top_id]])->orderBy('fm_id', 'desc')->first();

        $article['next'] = Find_mean::where([['fm_id', '>', $fm_id], ['top_id', $top_id]])->orderBy('fm_id', 'asc')->first();

        session(['right' => $find_mean->right_id]);

        if ($article['next']) {
            session(['next' => $article['next']->fm_id]);
        } else {
            session(['next' => $fm_id]);
        }

        for ($i = 1; $i < 20; $i++) {
            $top_fm[$i] = Find_mean::where('top_id', $i)->first();
        }

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.find_mean.find_mean_all', compact('topic', 'topic_all', 'find_mean', 'textbook', 'article', 'get_text_id', 'top_fm'));
    }

    public function top_watch_spell($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'watch_spell']);

        for ($i = 1; $i < 20; $i++) {
            $top_ws[$i] = Watch_spell::where('top_id', $i)->first();
        }
        return view('home.watch_spell.topic_watch_spell', compact('topic', 'get_text_id', 'top_ws'));
    }


    public function watch_spell_all($top_id, $ws_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['state' => 'watch_spell']);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $watch_spell = Watch_spell::where([['ws_id', $ws_id], ['top_id', $top_id]])->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();

        $article['pre'] = Watch_spell::where([['ws_id', '<', $ws_id], ['top_id', $top_id]])->orderBy('ws_id', 'desc')->first();

        $article['next'] = Watch_spell::where([['ws_id', '>', $ws_id], ['top_id', $top_id]])->orderBy('ws_id', 'asc')->first();

        session(['right' => $watch_spell->right_id]);

        if ($article['next']) {
            session(['next' => $article['next']->ws_id]);
        } else {
            session(['next' => $ws_id]);
        }

        for ($i = 1; $i < 20; $i++) {
            $top_ws[$i] = Watch_spell::where('top_id', $i)->first();
        }

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.watch_spell.watch_spell_all', compact('topic', 'topic_all', 'watch_spell', 'textbook', 'article', 'get_text_id', 'top_ws'));
    }


    public function top_listen_spell($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        session(['state' => 'listen_spell']);

        for ($i = 1; $i < 20; $i++) {
            $top_ls[$i] = Listen_spell::where('top_id', $i)->first();
        }
        return view('home.listen_spell.topic_listen_spell', compact('topic', 'get_text_id', 'top_ls'));
    }


    public function listen_spell_all($top_id, $ls_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['state' => 'listen_spell']);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $listen_spell = Listen_spell::where([['ls_id', $ls_id], ['top_id', $top_id]])->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();

        $article['pre'] = Listen_spell::where([['ls_id', '<', $ls_id], ['top_id', $top_id]])->orderBy('ls_id', 'desc')->first();

        $article['next'] = Listen_spell::where([['ls_id', '>', $ls_id], ['top_id', $top_id]])->orderBy('ls_id', 'asc')->first();

        if ($article['next']) {
            session(['next' => $article['next']->ls_id]);
        } else {
            session(['next' => $ls_id]);
        }

        for ($i = 1; $i < 20; $i++) {
            $top_ls[$i] = Listen_spell::where('top_id', $i)->first();
        }

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.listen_spell.listen_spell_all', compact('topic', 'topic_all', 'listen_spell', 'textbook', 'article', 'get_text_id', 'top_ls'));
    }


    public function top_total($text_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $text_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['state' => 'total']);

        //当前教材的章节
        $topic = Topic::where('text_id', $text_id)->get();

        $get_text_id = Topic::where('text_id', $text_id)->first();

        //存儲课本
        session(['textbook_id' => $text_id]);

        for ($i = 0; $i < 1000; $i++) {
            session([$i => null]);
        }

        return view('home.total.topic_total', compact('topic', 'get_text_id'));
    }


    public function total_all($top_id, $id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['state' => 'total']);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();

        $fm_max = count(Find_mean::where('top_id', $top_id)->get());

        $ws_max = count(Watch_spell::where('top_id', $top_id)->get());

        $ls_max = count(Listen_spell::where('top_id', $top_id)->get());

        $get_text_id = Topic::where('top_id', $top_id)->first();

//dd($id,session($id));
//        dd(time() % $ls_max + 1);
        if ($id <= 6) {
//            dd(session($id));
            if (session($id) == null) {
                $total[$id] = Find_mean::where([['top_id', $top_id], ['fm_id', rand(10000, 9999999) % $fm_max + 1]])->first();
                session([$id => $total[$id]->fm_id]);
            }

            if (session($id) != null) {
                $total[$id] = Find_mean::where([['top_id', $top_id], ['fm_id', session($id)]])->first();
            }
            session(['right' => $total[$id]->right_id]);

//
//            $article['next'] = Find_mean::where([['top_id', $top_id], ['fm_id', rand(10000, 9999999) % $fm_max + 1]])->first();
//            $article['pre'] = Find_mean::where([['top_id', $top_id], ['fm_id', $find_mean->fm_id]])->first();

            return view('home.total.total_find_mean', compact('topic', 'topic_all', 'find_mean', 'textbook', 'total', 'get_text_id', 'id'));
        } elseif ($id <= 12 && $id > 6) {

            if (session($id) == null) {
                $total[$id] = Watch_spell::where([['top_id', $top_id], ['ws_id', rand(10000, 9999999) % $ws_max + 1]])->first();
                session([$id => $total[$id]->ws_id]);
            }

            if (session($id) != null) {
                $total[$id] = Watch_spell::where([['top_id', $top_id], ['ws_id', session($id)]])->first();
            }
            session(['right' => $total[$id]->right_id]);

            return view('home.total.total_watch_spell', compact('id','topic', 'topic_all','textbook', 'total', 'get_text_id'));

        } elseif ($id <= 18 && $id > 12) {

            if (session($id) == null) {
                $total[$id] = Listen_spell::where([['top_id', $top_id], ['ls_id', rand(10000, 9999999) % $ls_max + 1]])->first();
                session([$id => $total[$id]->ls_id]);
            }

            if (session($id) != null) {
                $total[$id] = Listen_spell::where([['top_id', $top_id], ['ls_id', session($id)]])->first();
            }
            session(['right' => $total[$id]->right_id]);

            return view('home.total.total_listen_spell', compact('id','topic', 'textbook', 'total', 'get_text_id'));

        }


    }
}

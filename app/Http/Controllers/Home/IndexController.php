<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Find_mean;
use App\Http\Model\Language;
use App\Http\Model\Phrase;
use App\Http\Model\Textbook;
use App\Http\Model\Topic;
use App\Http\Model\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        return view('home.index');
    }

    public function listen($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        return view('home.listen.listen', compact('topic', 'topic_all'));
    }

    public function word($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        session(['textbook_id' => $top_id]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        session(['condition' => 'word']);

        $topic = Topic::where('text_id', $top_id)->first();

        return view('home.word', compact('topic'));
    }

    public function word_all($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $word_all = Word::where('top_id', $top_id)->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.word.word_all', compact('topic', 'word_all', 'topic_all','get_text_id'));
    }


    public function word_detail($top_id, $word_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $word = Word::where('word_id', $word_id)->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();


        $article['pre'] = Word::where('word_id', '<', $word_id)->orderBy('word_id', 'desc')->first();

        $article['next'] = Word::where('word_id', '>', $word_id)->orderBy('word_id', 'asc')->first();

        return view('home.word.word_detail', compact('topic', 'topic_all', 'word', 'textbook', 'article'));
    }

    public function phrase_all($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $phrase_all = Phrase::where('top_id', $top_id)->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.phrase.phrase_all', compact('topic', 'phrase_all', 'topic_all','get_text_id'));
    }


    public function phrase_detail($top_id, $ph_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $phrase = Phrase::where('ph_id', $ph_id)->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();


        $article['pre'] = Phrase::where('ph_id', '<', $ph_id)->orderBy('ph_id', 'desc')->first();

        $article['next'] = Phrase::where('ph_id', '>', $ph_id)->orderBy('ph_id', 'asc')->first();

        return view('home.phrase.phrase_detail', compact('topic', 'topic_all', 'phrase', 'textbook', 'article'));
    }

    public function language_all($top_id, $lan_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $language = Language::where([['lan_id', $lan_id], ['top_id', $top_id]])->first();

        $textbook = Textbook::where('text_id', $topic->text_id)->first();

        $article['pre'] = Language::where([['lan_id', '<', $lan_id], ['top_id', $top_id]])->orderBy('lan_id', 'desc')->first();

        $article['next'] = Language::where([['lan_id', '>', $lan_id], ['top_id', $top_id]])->orderBy('lan_id', 'asc')->first();

        session(['right' => $language->right_id]);

        if ($article['next']) {
            session(['next' => $article['next']->lan_id]);
        } else {
            session(['next' => $lan_id]);
        }

        for ($i = 1; $i < 20; $i++) {
            $top_lan[$i] = Language::where('top_id', $i)->first();
        }

        $get_text_id = Topic::where('top_id', $top_id)->first();

        return view('home.language.language_all', compact('topic', 'topic_all', 'language', 'textbook', 'article', 'get_text_id', 'top_lan'));
    }

    public function self_all($top_id)
    {
        session(['url' => $_SERVER['REQUEST_URI']]);

        $name = Textbook::where('text_id', $top_id)->first();

        session(['textbook_name' => $name->text_name]);

        $word_all = Word::where('top_id', $top_id)->get();

        $topic = Topic::where('top_id', $top_id)->first();

        $topic_all = Topic::where('text_id', session('textbook_id'))->get();

        $get_text_id = Topic::where('top_id', $top_id)->first();

        session(['state' => 'self']);

        return view('home.self.self_all', compact('topic', 'word_all', 'topic_all','get_text_id'));
    }


}

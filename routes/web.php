<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'Home\IndexController@index');

    Route::get('/listen_conf', 'Home\ConfigController@listen_config');
    Route::get('/word_conf', 'Home\ConfigController@word_config');
    Route::get('/phrase_conf', 'Home\ConfigController@phrase_config');
    Route::get('/language_conf', 'Home\ConfigController@language_config');
    Route::get('/train_conf', 'Home\ConfigController@train_config');

    Route::get('/conf', 'Home\ConfigController@config');
    Route::get('/cate/{cate_id}', 'Home\ConfigController@cate');
    Route::get('/text/{text_id}', 'Home\ConfigController@text');

    Route::get('/top_listen/{text_id}', 'Home\ConfigController@top_listen');
    Route::get('/listen/{top_id}', 'Home\IndexController@listen');

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');

    Route::get('/register', 'Home\RegisterController@index');
    Route::post('/register', 'Home\RegisterController@register');
    Route::get('/login', 'Home\LoginController@index');
    Route::post('/login', 'Home\LoginController@login');

    Route::get('/word/{text_id}', 'Home\IndexController@word');

    Route::get('/top_word/{text_id}', 'Home\ConfigController@top_word');
    Route::get('/word_all/{top_id}', 'Home\IndexController@word_all');
    Route::get('/word_detail/{top_id}_{word_id}', 'Home\IndexController@word_detail');

    Route::get('/top_phrase/{text_id}', 'Home\ConfigController@top_phrase');
    Route::get('/phrase_all/{top_id}', 'Home\IndexController@phrase_all');
    Route::get('/ph_detail/{top_id}_{phrase_id}', 'Home\IndexController@phrase_detail');

    Route::get('/top_language/{text_id}', 'Home\ConfigController@top_language');
    Route::get('/language_all/{top_id}_{language_id}', 'Home\IndexController@language_all');

    Route::get('/top_self/{text_id}', 'Home\ConfigController@top_self');
    Route::get('/self_all/{top_id}', 'Home\IndexController@self_all');

    Route::get('/train/{text_id}', 'Home\TrainController@train');

    Route::get('/top_find_mean/{text_id}', 'Home\TrainController@top_find_mean');
    Route::get('/find_mean_all/{top_id}_{fm_id}', 'Home\TrainController@find_mean_all');

    Route::get('/top_watch_spell/{text_id}', 'Home\TrainController@top_watch_spell');
    Route::get('/watch_spell_all/{top_id}_{fm_id}', 'Home\TrainController@watch_spell_all');

    Route::get('/top_listen_spell/{text_id}', 'Home\TrainController@top_listen_spell');
    Route::get('/listen_spell_all/{top_id}_{fm_id}', 'Home\TrainController@listen_spell_all');

    Route::get('/top_total/{text_id}', 'Home\TrainController@top_total');
    Route::get('/total_all/{top_id}_{id}', 'Home\TrainController@total_all');



});
Route::group(['middleware' => ['login'], 'namespace' => 'Home'], function () {

    Route::get('/setting', 'UserController@setting');
    Route::get('/logout', 'LoginController@logout');
});


Route::group(['middleware' => ['admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::resource('category', 'CategoryController');
    Route::post('cate/changeorder', 'CategoryController@changeOrder');

    Route::resource('textbook', 'TextbookController');
    Route::post('text/changeorder', 'TextbookController@changeOrder');

    Route::resource('topic', 'TopicController');

    Route::resource('word', 'WordController');

    Route::resource('phrase', 'PhraseController');

    Route::resource('language', 'LanguageController');

    Route::resource('find_mean', 'Find_meanController');

    Route::resource('watch_spell', 'Watch_spellController');

    Route::resource('listen_spell', 'Listen_spellController');

    Route::any('upload', 'CommonController@upload');


});

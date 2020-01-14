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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', function () {
    $posts = \App\Post::all();
    return view('posts')->withPosts($posts);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quiz', 'QuizzesController@index');
Route::get('/quiz/create', 'QuizzesController@create');
Route::get('/quiz/create/translate_words', 'TranslateWordController@create');
Route::get('/quiz/create/translate_sentences', 'TranslateSentencesController@create');
Route::get('/quiz/create/choose_translations', 'ChooseTranslationController@create');
Route::get('/quiz/create/order_sentences', 'OrderSentencesController@create');

Route::post('/translateWord', 'TranslateWordController@store');
Route::post('/translateSentences', 'TranslateSentencesController@store');
Route::post('/orderSentences', 'OrderSentencesController@store');

Route::get('/quiz/{$id}', 'QuizzesController@show');
Route::get('/quiz/{$id}/edit', 'QuizzesControlle@edit');

Route::get('/language', 'LanguageController@create');
Route::post('/language', 'LanguageController@store');

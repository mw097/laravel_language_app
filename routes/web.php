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

Route::resource('/translateWords', "TranslateWordController")->middleware('auth');
Route::resource('/translateSentences', "TranslateSentenceController")->middleware('auth');
Route::resource('/chooseTranslations', "ChooseTranslationController")->middleware('auth');
Route::resource('/orderSentences', "OrderSentencesController")->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quiz', 'QuizzesController@index')->middleware('auth');
Route::get('/quiz/create', 'QuizzesController@create')->middleware('auth');
Route::get('/quiz/create/translate_words', 'TranslateWordController@create');
Route::get('/quiz/create/translate_sentences', 'TranslateSentenceController@create');
Route::get('/quiz/create/choose_translations', 'ChooseTranslationController@create');
Route::get('/quiz/create/order_sentences', 'OrderSentencesController@create');
Route::get('/quiz/create/choose_pictures', 'ChoosePictureController@create');



Route::post('/translateWord/{translateWord}', 'TranslateWordController@verifyAnswer')->name('translateWords.verifyAnswer')->middleware('auth');
Route::post('/translateSentence/{translateSentence}', 'TranslateSentenceController@verifyAnswer')->name('translateSentences.verifyAnswer')->middleware('auth');
Route::post('/chooseTranslation/{chooseTranslation}', 'ChooseTranslationController@verifyAnswer')->name('chooseTranslations.verifyAnswer')->middleware('auth');
Route::post('/orderSentences/{orderSentence}', 'OrderSentencesController@verifyAnswer')->name('orderSentences.verifyAnswer')->middleware('auth');

Route::get('/translateSentence/{translateSentence}/report', 'TranslateSentenceController@report')->name('translateSentences.report')->middleware('auth');
Route::get('/translateWord/{translateWord}/report', 'TranslateWordController@report')->name('translateWords.report')->middleware('auth');
Route::get('/orderSentences/{orderSentence}/report', 'OrderSentencesController@report')->name('orderSentences.report')->middleware('auth');
Route::get('/chooseTranslation/{chooseTranslation}/report', 'ChooseTranslationController@report')->name('chooseTranslations.report')->middleware('auth');
Route::get('/reporteds/{reported}', 'ReportedController@destroy')->name('reporteds.destroy')->middleware('auth');


//Route::post('/translateWord', 'TranslateWordController@store');
//Route::post('/translateSentences', 'TranslateSentencesController@store');
//Route::post('/chooseTranslation', 'ChooseTranslationController@store');
//Route::post('/orderSentences', 'OrderSentencesController@store');
//Route::post('/choosePicture', 'ChoosePictureController@store');


//Route::post('/translateWord/{translateWord}', 'TranslateWordController@verifyAnswer')->name('translateWords.verifyAnswer');
//Route::post('/translateSentence/{translateSentence}', 'TranslateSentenceController@verifyAnswer')->name('translateSentences.verifyAnswer');
//Route::post('/chooseTranslation/{chooseTranslation}', 'ChooseTranslationController@verifyAnswer')->name('chooseTranslations.verifyAnswer');
//Route::post('/orderSentences/{orderSentence}', 'OrderSentencesController@verifyAnswer')->name('orderSentences.verifyAnswer');
//Route::post('/choosePicture/{choosePicture}', 'ChoosePictureController@verifyAnswer')->name('choosePictures.verifyAnswer');

Route::get('/language', 'LanguageController@create')->middleware('auth');
Route::post('/language', 'LanguageController@store')->middleware('auth');


<?php

namespace App\Http\Controllers;

use App\Language;
use App\TranslateWord;
use Illuminate\Http\Request;

class TranslateWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.type.translate_words', [
            'languages' => Language::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TranslateWord::create($this->validateTranslateWord());
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'native' => 'required|max:200',
            'language' => 'required'
        ]);

        $quiz = new TranslateWord();
        $quiz->foreign = $request->foreign;
        $quiz->native = $request->native;
        $quiz->language = $request->language;
        $quiz->save();

        return redirect('/quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateWord $translateWord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateWord $translateWord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateWord $quiz)
    {
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'native' => 'required|max:200',
            'language' => 'required'
        ]);

        $quiz->foreign = $request->foreign;
        $quiz->native = $request->native;
        $quiz->language = $request->language;
        $quiz->save();

        return redirect('/quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateWord $quiz)
    {
        $quiz->delete();

        return redirect('/quiz');
    }

}

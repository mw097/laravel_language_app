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

        $translateWord = new TranslateWord();
        $translateWord->foreign = $request->foreign;
        $translateWord->native = $request->native;
        $translateWord->language = $request->language;
        $translateWord->save();

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
        //return view('quizzes.type.show.translate_words_show')->withTranslateWord($translateWord); tu inny sposob ogarnac
        return view('quizzes.type.show.translate_words_show', [
            'translateWord' => TranslateWord::latest()->get()
        ]);
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
    public function update(Request $request, TranslateWord $translateWord)
    {
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'native' => 'required|max:200',
            'language' => 'required'
        ]);

        $translateWord->foreign = $request->foreign;
        $translateWord->native = $request->native;
        $translateWord->language = $request->language;
        $translateWord->save();

        return redirect('/quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateWord $translateWord)
    {
        $translateWord->delete();

        return redirect('/quiz');
    }

    public function verifyAnswer(Request $request, TranslateWord $translateWord)
    {
        if( !strcmp($request->answer,$translateWord->foreign) ) {
            return redirect('quizzes.type.show.translate_words_show'); //jakos przekazac ze jest poprawne i zaznaczyc w quizie
        } else {
            //tez do tej strony ale z bledem
        }
    }

}

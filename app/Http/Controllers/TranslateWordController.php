<?php

namespace App\Http\Controllers;

use App\Language;
use App\Reported;
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

        if(request('language'))
        {
            return view('quizzes.type.translate_words.index', [
                'languages' => Language::all(),
                'translateWords' => Language::where('language', request('language'))->firstOrFail()->translate_words
            ]);
        }else{
            return view('quizzes.type.translate_words.index', [
                'languages' => Language::all(),
                'translateWords' => TranslateWord::latest()->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.type.translate_words.create', [
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


       // return redirect()->route('translateWords.show', $translateWord); gdybysmy chcieli bezporednio do quizu wchodzic
        return redirect()->route('translateWords.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateWord $translateWord)
    {
        return view('quizzes.type.translate_words.show')->withTranslateWord($translateWord);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslateWord  $translateWord
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateWord $translateWord)
    {
        return view('quizzes.type.translate_words.edit')->withTranslateWord($translateWord);
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

        return redirect()->route('translateWords.index');
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

        return redirect()->route('translateWords.index');
    }


    public function verifyAnswer(Request $request, TranslateWord $translateWord)
    {
        $request->validate(
            ['answer' => "required|regex:/^$translateWord->native$/i"],
            ['answer.regex' => "Wrong answer! Try again."]
        );

        return redirect()->back()->with('alert', 'Correct!');
    }

    public function report(TranslateWord $translateWord)
    {
        $report= new Reported();
        $report->quiz_type = 'translateWord';
        $report->quiz_id = $translateWord->id;
        $report->save();

        return view('quizzes.type.translate_words.report')->withTranslateWord($translateWord);
    }

}

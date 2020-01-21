<?php

namespace App\Http\Controllers;

use App\Reported;
use App\TranslateSentence;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranslateSentenceController extends Controller
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
            return view('quizzes.type.translate_sentences.index', [
                'languages' => Language::all(),
                'translateSentences' => Language::where('language', request('language'))->firstOrFail()->translate_sentences
            ]);
        }else{
            return view('quizzes.type.translate_sentences.index', [
                'languages' => Language::all(),
                'translateSentences' => TranslateSentence::latest()->get(),
            ]);
        }
        //$translateSentences = TranslateSentence::all();
        //$languages = Language::all();

        //return view('quizzes.type.translate_sentences.index')->withTranslateSentences($translateSentences, $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.type.translate_sentences.create', [
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

        $translateSentence = new TranslateSentence();
        $translateSentence->foreign = $request->foreign;
        $translateSentence->native = $request->native;
        $translateSentence->language = $request->language;
        $translateSentence->user_id = Auth::user()->id;
        $translateSentence->save();


        // return redirect()->route('translateWords.show', $translateWord); gdybysmy chcieli bezporednio do quizu wchodzic
        return redirect()->route('translateSentences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateSentence $translateSentence)
    {
        return view('quizzes.type.translate_sentences.show')->withTranslateSentence($translateSentence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateSentence $translateSentence)
    {
        return view('quizzes.type.translate_sentences.edit')->withTranslateSentence($translateSentence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateSentence $translateSentence)
    {
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'native' => 'required|max:200',
            'language' => 'required'
        ]);

        $translateSentence->foreign = $request->foreign;
        $translateSentence->native = $request->native;
        $translateSentence->language = $request->language;
        $translateSentence->save();

        return redirect()->route('translateSentences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateSentence $translateSentence)
    {
        $translateSentence->delete();

        return redirect()->route('translateSentences.index');
    }

    public function verifyAnswer(Request $request, TranslateSentence $translateSentence)
    {
        $request->validate(
            ['answer' => "required|regex:/^$translateSentence->native$/i"],
            ['answer.regex' => "Wrong answer! Try again."]
        );
        return redirect()->route('translateSentences.index');
    }

    public function report(TranslateSentence $translateSentence)
    {
        $report= new Reported();
        $report->quiz_type = 'translateSentence';
        $report->quiz_id = $translateSentence->id;
        $report->save();

        return view('quizzes.type.translate_sentences.report')->withTranslateSentence($translateSentence);
    }
}

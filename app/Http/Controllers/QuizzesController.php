<?php

namespace App\Http\Controllers;

use App\Language;
use App\TranslateSentence;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function index()
    {
        if(request('language'))
        {
            $test = Language::where('language', request('language'))->firstOrFail()->translate_sentences;
            dd($test);
            return view('quizzes.show', [
                'languages' => Language::all(),
                //'translate_sentences' => Language::where('language', request('language'))->firstOrFail()->translate_sentences
                'translate_sentences' => TranslateSentence::latest()->get()
            ]);
        }else{
            return view('quizzes.show', [
                'languages' => Language::all(),
                'translate_sentences' => TranslateSentence::latest()->get()
            ]);
        }
//        return view('quizzes.show',[
//            'languages' => Language::all()
//        ]);
    }

    public function create()
    {
        return view('quizzes.create');
    }

}

<?php

namespace App\Http\Controllers;

use App\Language;
use App\TranslateSentence;
use App\TranslateWord;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function index()
    {
        if(request('language'))
        {
            return view('quizzes.show', [
                'languages' => Language::all(),
                'translate_sentences' => Language::where('language', request('language'))->firstOrFail()->translate_sentences
            ]);
        }else{
            return view('quizzes.show', [
                'languages' => Language::all(),
                'translate_sentences' => TranslateSentence::latest()->get(),
            ]);
        }
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function translate_words()
    {
        return view('quizzes.type.translate_words');
    }
}

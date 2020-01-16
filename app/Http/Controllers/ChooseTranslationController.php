<?php


namespace App\Http\Controllers;


use App\ChooseTranslation;
use App\Language;
use Illuminate\Http\Request;

class ChooseTranslationController
{
    public function create()
    {
        return view('quizzes.type.choose_translations',[
            'languages' => Language::all()
        ]);
    }

    public function store(Request $request)
    {
        ChooseTranslation::create($this->validateChooseTranslation());

        $quiz = new ChooseTranslation();
        $quiz->native = $request->native;
        $quiz->foreign_correct = $request->foreign_correct;
        $quiz->foreign_1 = $request->foreign_1;
        $quiz->foreign_2 = $request->foreign_2;
        $quiz->foreign_3 = $request->foreign_3;
        $quiz->language = $request->language;
        $quiz->save();

        return redirect('/quiz');
    }

    public function validateChooseTranslation()
    {
        return request()->validate([
            'native' => 'required|max:200',
            'foreign_correct' => 'required|max:200',
            'foreign_1' => 'required|max:200',
            'foreign_2' => 'required|max:200',
            'foreign_3' => 'required|max:200',
            'language' => 'required'
        ]);


    }
}

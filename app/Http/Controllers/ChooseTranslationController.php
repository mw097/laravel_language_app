<?php


namespace App\Http\Controllers;


use App\ChooseTranslation;
use App\Language;
use Illuminate\Http\Request;

class ChooseTranslationController extends Controller
{

    public function index()
    {
        $chooseTranslations = ChooseTranslation::all();

        return view('quizzes.type.choose_translations.index')->withChooseTranslations($chooseTranslations);
    }

    public function create()
    {
        return view('quizzes.type.choose_translations.create',[
            'languages' => Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'native' => 'required|max:200',
            'foreign_correct' => 'required|max:200',
            'foreign_1' => 'required|max:200',
            'foreign_2' => 'required|max:200',
            'foreign_3' => 'required|max:200',
            'language' => 'required'
        ]);

        $chooseTranslation = new ChooseTranslation();
        $chooseTranslation->native = $request->native;
        $chooseTranslation->foreign_correct = $request->foreign_correct;
        $chooseTranslation->foreign_1 = $request->foreign_1;
        $chooseTranslation->foreign_2 = $request->foreign_2;
        $chooseTranslation->foreign_3 = $request->foreign_3;
        $chooseTranslation->language = $request->language;
        $chooseTranslation->save();

        return redirect()->route('chooseTranslations.index');
    }

}

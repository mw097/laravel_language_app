<?php


namespace App\Http\Controllers;


use App\ChooseTranslation;
use App\Language;
use App\OrderSentence;
use App\Reported;
use Illuminate\Http\Request;

class ChooseTranslationController extends Controller
{

    public function index()
    {

        if(request('language'))
        {
            return view('quizzes.type.choose_translations.index', [
                'languages' => Language::all(),
                'chooseTranslations' => Language::where('language', request('language'))->firstOrFail()->choose_translations
            ]);
        }else{
            return view('quizzes.type.choose_translations.index', [
                'languages' => Language::all(),
                'chooseTranslations' => ChooseTranslation::latest()->get(),
            ]);
        }
     /*   $chooseTranslations = ChooseTranslation::all();

        return view('quizzes.type.choose_translations.index')->withChooseTranslations($chooseTranslations);*/
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

    public function show(ChooseTranslation $chooseTranslation)
    {
        return view('quizzes.type.choose_translations.show')->withChooseTranslation($chooseTranslation);

    }

    public function edit(ChooseTranslation $chooseTranslation)
    {
        return view('quizzes.type.choose_translations.edit')->withchooseTranslation($chooseTranslation);
    }

    public function update(Request $request, ChooseTranslation $chooseTranslation)
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

    public function verifyAnswer(Request $request, ChooseTranslation $chooseTranslation)
    {
        $request->validate(
            ['answer' => "required|regex:/^$chooseTranslation->foreign_correct$/i"],
            ['answer.regex' => "Wrong answer! Try again."]
        );
        return redirect()->back()->with('alert', 'Correct!');
    }

    public function report(ChooseTranslation $chooseTranslation)
    {
        $report= new Reported();
        $report->quiz_type = 'translateWord';
        $report->quiz_id = $chooseTranslation->id;
        $report->save();

        return view('quizzes.type.choose_translations.report')->withChooseTranslation($chooseTranslation);
    }
}

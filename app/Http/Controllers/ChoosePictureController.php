<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChoosePicture;
use App\Language;
use App\Reported;

class ChoosePictureController extends Controller
{
    public function index()
    {
        if(request('language'))
        {
            return view('quizzes.type.choose_pictures.index', [
                'languages' => Language::all(),
                'choosePictures' => Language::where('language', request('language'))->firstOrFail()->choose_picture
            ]);
        }else{
            return view('quizzes.type.choose_pictures.index', [
                'languages' => Language::all(),
                'choosePictures' => ChoosePicture::latest()->get(),
            ]);
        }
        //return view('quizzes/type/choose_pictures');
    }

    public function create()
    {
        return view('quizzes.type.choose_pictures.create',[
            'languages' => Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'image_correct' => 'required|image',
            'image_1' => 'required|image|dimensions:min_width=100, min_height=200',
            'image_2' => 'required|image|dimensions:min_width=100, min_height=200',
            'image_3' => 'required|image|dimensions:min_width=100, min_height=200',
            'language' => 'required'
        ]);

        //ChoosePicture::create($this->validateChoosePicture());

        $quiz = new ChoosePicture();
        $quiz->foreign= $request->foreign;
        $quiz->language = $request->language;

        $file = $request->image_correct;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_correct = $filename;

        $file = $request->image_1;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_1 = $filename;

        $file = $request->image_2;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_2 = $filename;

        $file = $request->image_3;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_3 = $filename;


        $quiz->save();

        return redirect('/quiz');
    }

    public function show(ChoosePicture $choosePicture)
    {
        return view('quizzes.type.choose_pictures.show')->withChoosePicture($choosePicture);

    }

    public function edit(ChoosePicture $choosePicture)
    {
        return view('quizzes.type.choose_pictures.edit')->withChoosePicture($choosePicture);
    }

    public function update(Request $request, ChoosePicture $chooseTranslation)
    {
        $this->validate($request, [
            'foreign' => 'required|max:200',
            'image_correct' => 'required|image',
            'image_1' => 'required|image|dimensions:min_width=100, min_height=200',
            'image_2' => 'required|image|dimensions:min_width=100, min_height=200',
            'image_3' => 'required|image|dimensions:min_width=100, min_height=200',
            'language' => 'required'
        ]);

        $quiz = new ChoosePicture();
        $quiz->foreign= $request->foreign;
        $quiz->language = $request->language;

        $file = $request->image_correct;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_correct = $filename;

        $file = $request->image_1;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_1 = $filename;

        $file = $request->image_2;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_2 = $filename;

        $file = $request->image_3;
        $filename = $file->getClientOriginalName();
        $file -> move('uploads/images/', $filename);
        $quiz->image_3 = $filename;

        $chooseTranslation->save();

        return redirect()->route('choosePictures.index');
    }

    public function verifyAnswer(Request $request, int $correctImage)
    {
        $request->validate(
            ['answer' => "required|regex:/^$correctImage$/  "],
            ['answer.regex' => "Wrong answer! Try again."]
        );
        return redirect()->back()->with('alert', 'Correct!');
    }

    public function report(ChoosePicture $choosePicture)
    {
        $report= new Reported();
        $report->quiz_type = 'choosePicture';
        $report->quiz_id = $choosePicture->id;
        $report->save();

        return view('quizzes.type.choose_pictures.report')->withChoosePicture($choosePicture);
    }

}

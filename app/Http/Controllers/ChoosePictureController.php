<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChoosePicture;
use App\Language;

class ChoosePictureController extends Controller
{
    public function index()
    {
        return view('quizzes/type/choose_pictures');
    }

    public function create()
    {
        return view('quizzes.type.choose_pictures',[
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
}

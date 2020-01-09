<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    function index()
    {
        return view('quizzes.show');
    }

    function create()
    {
        return view('quizzes.create');
    }
}

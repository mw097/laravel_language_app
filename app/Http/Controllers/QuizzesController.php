<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    function index()
    {

    }

    function create()
    {
        return view('quizzes.create');
    }
}

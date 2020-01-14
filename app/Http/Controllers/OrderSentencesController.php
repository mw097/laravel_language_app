<?php

namespace App\Http\Controllers;

use App\Language;
use App\OrderSentence;
use Illuminate\Http\Request;

class OrderSentencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.type.order_sentences', [
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
            'sentence' => 'required|max:200',
            'language' => 'required'
        ]);

        $quiz = new OrderSentence();
        $quiz->sentence = $request->sentence;
        $quiz->language = $request->language;
        $quiz->save();

        return redirect('/quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function show(OrderSentence $orderSentence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderSentence $orderSentence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderSentence $quiz)
    {
        $this->validate($request, [
            'sentence' => 'required|max:200',
            'language' => 'required'
        ]);

        $quiz->sentence = $request->sentence;
        $quiz->language = $request->language;
        $quiz->save();

        return redirect('/quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderSentence $quiz)
    {
        $quiz->delete();

        return redirect('/quiz');
    }
}

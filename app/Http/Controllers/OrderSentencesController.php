<?php

namespace App\Http\Controllers;

use App\Language;
use App\OrderSentence;
use App\Reported;
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
        if(request('language'))
        {
            return view('quizzes.type.order_sentences.index', [
                'languages' => Language::all(),
                'orderSentences' => Language::where('language', request('language'))->firstOrFail()->order_sentences
            ]);
        }else{
            return view('quizzes.type.order_sentences.index', [
                'languages' => Language::all(),
                'orderSentences' => OrderSentence::latest()->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.type.order_sentences.create', [
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

        $orderSentence = new OrderSentence();
        $orderSentence->sentence = $request->sentence;
        $orderSentence->language = $request->language;
        $orderSentence->save();

        return redirect()->route('orderSentences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function show(OrderSentence $orderSentence)
    {
        return view('quizzes.type.order_sentences.show')->withOrderSentence($orderSentence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderSentence $orderSentence)
    {
        return view('quizzes.type.order_sentences.edit')->withOrderSentence($orderSentence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderSentence $orderSentence)
    {
        $this->validate($request, [
            'sentence' => 'required|max:200',
            'language' => 'required'
        ]);

        $orderSentence->sentence = $request->sentence;
        $orderSentence->language = $request->language;
        $orderSentence->save();

        return redirect()->route('orderSentences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderSentence  $orderSentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderSentence $orderSentence)
    {
        $orderSentence->delete();

        return redirect()->route('orderSentences.index');
    }

    public function verifyAnswer(Request $request, OrderSentence $orderSentence)
    {
        $request->validate(
            ['answer' => "required|regex:/^$orderSentence->sentence$/i"],
            ['answer.regex' => "Wrong answer! Try again."]
        );
        return redirect()->back()->with('alert', 'Correct!');
    }

    public function report(OrderSentence $orderSentence)
    {
        $report= new Reported();
        $report->quiz_type = 'translateWord';
        $report->quiz_id = $orderSentence->id;
        $report->save();

        return view('quizzes.type.order_sentences.report')->withOrderSentence($orderSentence);
    }
}

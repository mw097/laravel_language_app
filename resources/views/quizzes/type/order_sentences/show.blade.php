@extends('layouts.app')


@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="title m-b-md">
                Take the quiz
            </div>
        </div>

        <div>
            <ul>
                <li>Organize the sentence in the correct order:</li>
                @php
                    $words = explode(" ", $orderSentence->sentence);
                    shuffle($words);
                foreach ($words as $word) {
                    echo "$word ";
                }
                @endphp
            </ul>
        </div>

        <div class="container">
            <form method="POST" action='{{ route('orderSentences.verifyAnswer', $orderSentence) }}'>
                @csrf
                <div id="field1">
                    <label>Answer</label>
                    <input type="text" name="answer">
                    @error('answer')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit">OK</button>
            </form>

            @role('admin')
            @else
                <a href="{{ route('orderSentences.report', $orderSentence) }}">Zgłoś</a>
            @endrole
                <a href="{{route('orderSentences.show', $orderSentence->id+1 <= \App\OrderSentence::count() ? $orderSentence->id+1  : $orderSentence->id=1 )}}">Następny</a>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Rozwiąż QUIZ
            </div>
        </div>

        <div>
            @foreach ($translateWord as $tw)
                <ul>
                    <li>Podaj znaczenie: {{$tw->foreign}}</li>
                </ul>
            @endforeach
        </div>

        <div class="container">
            <form method="POST" action='/translateWord/verifyAnswer'>
                @csrf
                <div id="field1">
                    <label>Odpowiedź</label>
                    <input type="text" name="answer">
                    @error('answer')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit">OK</button>
            </form>
        </div>
    </div>
@endsection

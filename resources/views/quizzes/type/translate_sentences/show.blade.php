@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Rozwiąż QUIZ
            </div>
        </div>

        <div>
                <ul>
                    <li>Podaj znaczenie: {{$translateSentence->foreign}}</li>
                </ul>

        </div>

        <div class="container">
            <form method="POST" action='{{ route('translateSentences.verifyAnswer', $translateSentence) }}'>
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

            //Informacja o dobrej odpowiedzi
            //przycisk do kolejengo quizu
            <br>
            @role('admin')
{{--                <a href="#">Zgłoś</a>--}}
                <a href="{{ route('translateSentences.report', $translateSentence) }}">Zgłoś</a>
            @else
                I am not a admin...
            @endrole
        </div>
    </div>
@endsection

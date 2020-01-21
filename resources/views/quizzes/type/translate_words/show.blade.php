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
                The the Quiz
            </div>
        </div>

        <div>
                <ul>
                    <li>Translate: {{$translateWord->foreign}}</li>
                </ul>

        </div>

        <div class="container">
            <form method="POST" action='{{ route('translateWords.verifyAnswer', $translateWord) }}'>
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
                <a href="{{ route('translateWords.report', $translateWord) }}">Zgłoś</a>
            @endrole
                <a href="{{route('translateWords.show', $translateWord->id+1 <= \App\TranslateWord::count() ? $translateWord->id+1  : $translateWord->id=1 )}}">Następny</a>

        </div>
    </div>
@endsection

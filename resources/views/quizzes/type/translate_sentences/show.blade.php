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
                {{ csrf_field() }}
                <div id="field1">
                    <label>Odpowiedź</label>
                    <input type="text" name="answer">
                    @error('answer')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit">OK</button>
            </form>
            <br>
            @role('admin')
            @else
                <a href="{{ route('translateSentences.report', $translateSentence) }}">Zgłoś</a>
            @endrole
                <a href="{{route('translateSentences.show', $translateSentence->id+1 <= \App\TranslateSentence::count() ? $translateSentence->id+1  : $translateSentence->id=1 )}}">Następny</a>
                <div class="comments">
                    <p>Wyślij komentarz</p>
                    <form method="POST" action="{{route('comments.store', $translateSentence)}}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <label>Treść:</label>
                        <textarea type="text" name="comment"></textarea>
                        @error('comment')
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                        <button type="submit">Wyślij</button>
                    </form>
                    @foreach($comments as $comment)
                        <p>Użytkownik: {{$comment->user}}</p>
                        <p>Komentarz: {{$comment->comment}}</p>
                    @endforeach
                </div>
        </div>
    </div>
@endsection

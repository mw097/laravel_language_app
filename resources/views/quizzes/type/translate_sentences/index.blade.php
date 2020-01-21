@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Translate Sentence:</h2>
                <select name="quizType" onchange="if (this.value) window.location.href=this.value">
                    <option>Select language...</option>
                    @foreach($languages as $language)
                        <option value="?language={{$language->language}}"{{Request::segment(2) === $language->language ? 'selected' : ''}}>{{$language->language}}</option>
                    @endforeach
                </select>
                <ul>
                    @foreach($translateSentences  as $translateSentence)
                        <li>
                            <strong>{{ $translateSentence->foreign }}</strong>
                            <a href="{{ route('translateSentences.show', $translateSentence) }}">Take the quiz</a>
                            @role('admin')
                            <a href="{{ route('translateSentences.edit', $translateSentence) }}">Edit</a>
                            @else
                                @if(Auth::id() == $translateSentence->user_id)
                                    <a href="{{ route('translateSentences.edit', $translateSentence) }}">Edit</a>
                                @endif
                            @endrole
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

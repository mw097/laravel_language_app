@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            List Quiz
        </div>
        <form>
            Select language:
            <select name="quizType" onchange="if (this.value) window.location.href='/quiz'+this.value">
                <option>Select language...</option>
                @foreach($languages as $language)
                    <option value="?language={{$language->language}}"{{Request::segment(2) === $language->language ? 'selected' : ''}}>{{$language->language}}</option>
                @endforeach
            </select>
        </form>
    </div>
    <a href="{{ route('translateWords.index') }}">Translate words </a> <br>
    <a href="{{ route('translateSentences.index') }}">Translate sentences </a> <br>
    <a href="{{ route('chooseTranslations.index') }}">chooseTranslations </a> <br>
</div>
@endsection

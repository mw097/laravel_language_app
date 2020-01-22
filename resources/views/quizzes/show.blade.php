@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            List Quiz
        </div>
    </div>
    <a href="{{ route('translateWords.index') }}">Translate words </a> <br>
    <a href="{{ route('translateSentences.index') }}">Translate sentences </a> <br>
    <a href="{{ route('chooseTranslations.index') }}">Choose translations </a> <br>
    <a href="{{ route('orderSentences.index') }}">Order sentences </a> <br>
    <a href="{{ route('choosePictures.index') }}">Choose pictures </a> <br>
</div>
@endsection

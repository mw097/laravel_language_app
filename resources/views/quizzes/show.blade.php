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
                @foreach($languages as $language)
                    <option value="?language={{$language->language}}"{{Request::segment(2) === $language->language ? 'selected' : ''}}>{{$language->language}}</option>
                @endforeach
            </select>
        </form>
    </div>
    @foreach ($translate_sentences as $ts)
       <ul>
           <li>{{$ts->foreign}} : {{$ts->native}}</li>
       </ul>
    @endforeach
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Order sentence:</h2>
                <select name="quizType" onchange="if (this.value) window.location.href=this.value">
                    <option>Select language...</option>
                    @foreach($languages as $language)
                        <option value="?language={{$language->language}}"{{Request::segment(2) === $language->language ? 'selected' : ''}}>{{$language->language}}</option>
                    @endforeach
                </select>
                <ul>
                    @foreach($orderSentences  as $orderSentence)
                        <li>
                            <strong>{{ $orderSentence->id }}</strong>
                            <a href="{{ route('orderSentences.show', $orderSentence) }}">Take the quiz</a>
                            <a href="{{ route('orderSentences.edit', $orderSentence) }}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

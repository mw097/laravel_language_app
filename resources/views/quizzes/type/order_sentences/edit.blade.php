@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('orderSentences.update', $orderSentence) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div id="field">
                <label>Sentence to order</label>
                <input type="text" name="sentence" value="{{ $orderSentence->sentence }}">
                @error('sentence')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="2">
                <label>Language</label>
                <input type="text" name="language" value="{{ $orderSentence->language }}">
                @error('language')
                    <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Edit</button>
        </form>
    </div>
@endsection

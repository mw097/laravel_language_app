@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="/quiz">
            @csrf
            <div id="field">
                <label>Sentence to order</label>
                <input type="text" name="sentence">
                @error('sentence')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field3">
                <label>Language</label>
                <select name="language">
                    @foreach($languages as $language)
                        <option value="{{$language->language}}"}}>{{$language->language}}</option>
                    @endforeach
                </select>
                @error('language')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Submit form</button>
        </form>
    </div>
@endsection

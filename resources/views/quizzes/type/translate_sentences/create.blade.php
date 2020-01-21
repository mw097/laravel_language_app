@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('translateSentences.store') }}">
            {{ csrf_field() }}
            <div id="field">
                <label>Foreign</label>
                <input type="text" name="foreign" value="{{ old("foreign") }}">
                @error('sentence')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field2">
                <label>Native</label>
                <input type="text" name="native" value="{{ old("native") }}">
                @error('native')
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

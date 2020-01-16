@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('translateWords.update', $translateWord) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div id="field">
                <label>Foreign</label>
                <input type="text" name="foreign" value="{{ $translateWord->foreign }}">
                @error('sentence')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field2">
                <label>Native</label>
                <input type="text" name="native" value="{{ $translateWord->native }}">
                @error('native')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field3">
                <label>Language</label>
                <input type="text" name="language" value="{{ $translateWord->language }}">
                @error('language')
                    <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Edit</button>
        </form>
    </div>
@endsection

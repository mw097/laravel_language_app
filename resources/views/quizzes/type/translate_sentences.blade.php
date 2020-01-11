@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="/quiz">
            @csrf
            <div id="field">
                <label>Foreign</label>
                <input type="text" name="foreign">
                @error('foreign')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field2">
                <label>Native</label>
                <input type="text" name="native">
                @error('native')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field3">
                <label>Language</label>
                <textarea name="language"></textarea>
                @error('language')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Submit form</button>
        </form>
    </div>
@endsection

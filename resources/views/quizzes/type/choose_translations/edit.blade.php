@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('chooseTranslations.update', $chooseTranslation) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div id="field">
                <label>Native</label>
                <input type="text" name="native" value="{{ $chooseTranslation->native }}">
                @error('native')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field2">
                <label>Foreign correct</label>
                <input type="text" name="foreign_correct" value="{{ $chooseTranslation->foreign_correct }}">
                @error('foreign_correct')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field3">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_1" value="{{ $chooseTranslation->foreign_1 }}">
                @error('foreign_1')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field4">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_2" value="{{ $chooseTranslation->foreign_2 }}">
                @error('foreign_2')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field5">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_3" value="{{ $chooseTranslation->foreign_3 }}">
                @error('foreign_3')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div id="field6">
                <label>Language</label>
                <input type="text" name="language" value="{{ $chooseTranslation->language }}">
                @error('language')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Submit form</button>
        </form>
    </div>
@endsection

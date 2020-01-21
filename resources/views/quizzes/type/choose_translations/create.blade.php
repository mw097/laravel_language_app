@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('chooseTranslations.store') }}">
            {{ csrf_field() }}
            <div id="field">
                <label>Native</label>
                <input type="text" name="native">
                @error('native')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field2">
                <label>Foreign correct</label>
                <input type="text" name="foreign_correct">
                @error('foreign_correct')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field3">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_1">
                @error('foreign_1')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field4">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_2">
                @error('foreign_2')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>
            <div id="field5">
                <label>Foreign incorrect</label>
                <input type="text" name="foreign_3">
                @error('foreign_3')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div id="field6">
                <label>Language</label>
                <select name="language" class="select">
                    @foreach($languages as $language)
                        <option value="{{$language->language}}"}}>{{$language->language}}</option>
                        {{$language->language}}"}}
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

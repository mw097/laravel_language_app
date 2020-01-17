@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="/choosePicture" enctype="multipart/form-data" >
            @csrf
            <div class="form-group" id="field">
                <label>Foreign</label>
                <input type="text" class="form-control" name="foreign">
                @error('foreign')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="custom-file" id="field2">
                    <label class="custom-file-label">Correct picture</label>
                    <input type="file" class="custom-file-input" name="image_correct">
                    @error('image_correct')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field3">
                    <label class="custom-file-label">Incorrect picture 1</label>
                    <input type="file" class="custom-file-input" name="image_1">
                    @error('image_1')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field4">
                    <label class="custom-file-label">Incorrect picture 2</label>
                    <input type="file" class="custom-file-input" name="image_2">
                    @error('image_2')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field5">
                    <label class="custom-file-label">Incorrect picture 3</label>
                    <input type="file" class="custom-file-input" name="image_3">
                    @error('image_3')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group" id="field6">
                <label>Language</label>
                <input type="text" class="form-control" name="language">
                @error('language')
                <p class="help-in-danger">{{$message}}</p>
                @enderror
            </div>
           {{-- <div id="field6">
                <label>Language</label>
                <select name="language">
                    @foreach($languages as $language)
                        <option value="{{$language->language}}"}}>{{$language->language}}</option>
                    @endforeach
                </select>
                @error('language')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>--}}
            <button type="submit">Submit form</button>
        </form>
    </div>
@endsection

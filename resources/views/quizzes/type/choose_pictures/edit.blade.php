@extends('quizzes.create')

@section ('quizType')
    <div class="container">
        <form method="POST" action="{{ route('choosePictures.update', $choosePicture) }}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group" id="field">
                <label>Foreign</label>
                <input type="text" class="form-control" name="foreign" value="{{ $choosePicture->foreign }}">
                @error('foreign')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="input-group">
                <div class="custom-file" id="field2">
                    <label class="custom-file-label">Correct picture</label>
                    <input type="file" class="custom-file-input" name="image_correct" value="{{ $choosePicture->image_correct }}">
                    @error('image_correct')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field3">
                    <label class="custom-file-label">Incorrect picture 1</label>
                    <input type="file" class="custom-file-input" name="image_1" value="{{ $choosePicture->image_1 }}">
                    @error('image_1')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field4">
                    <label class="custom-file-label">Incorrect picture 2</label>
                    <input type="file" class="custom-file-input" name="image_2" value="{{ $choosePicture->image_2 }}">
                    @error('image_2')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="input-group">
                <div class="custom-file" id="field5">
                    <label class="custom-file-label">Incorrect picture 3</label>
                    <input type="file" class="custom-file-input" name="image_3" value="{{ $choosePicture->image_3 }}">
                    @error('image_3')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div id="field6">
                <label>Language</label>
                <input type="text" class="form-control" name="language" value="{{ $choosePicture->language }}">
                @error('language')
                <p class="help is-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" >Submit form</button>
        </form>
    </div>
@endsection

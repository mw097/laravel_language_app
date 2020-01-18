@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Choose correct picture:</h2>

                <ul>
                    @foreach($choosePictures  as $choosePicture)
                        <li>
                            <strong>{{ $choosePicture->foreign }}</strong>
                            <a href="{{ route('choosePictures.show', $choosePicture) }}">Take the quiz</a>
                            <a href="{{ route('choosePictures.edit', $choosePicture) }}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

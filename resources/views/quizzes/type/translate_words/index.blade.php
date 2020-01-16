@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Translate Word:</h2>

                <ul>
                    @foreach($translateWords  as $translateWord)
                        <li>
                            <strong>{{ $translateWord->foreign }}</strong>
                            <a href="{{ route('translateWords.show', $translateWord) }}">Take the quiz</a>
                            <a href="{{ route('translateWords.edit', $translateWord) }}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

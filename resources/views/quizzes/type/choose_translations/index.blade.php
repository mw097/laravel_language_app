@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Choose correct translation:</h2>

                <ul>
                    @foreach($chooseTranslations  as $chooseTranslation)
                        <li>
                            <strong>{{ $chooseTranslation->foreign }}</strong>
                            <a href="{{ route('chooseTranslations.show', $chooseTranslation) }}">Take the quiz</a>
                            <a href="{{ route('chooseTranslations.edit', $chooseTranslation) }}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

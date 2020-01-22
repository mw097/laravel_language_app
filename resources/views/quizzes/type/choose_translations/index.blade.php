@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Choose correct translation:</h2>
                <select name="quizType" onchange="if (this.value) window.location.href=this.value">
                    <option>Select language...</option>
                    @foreach($languages as $language)
                        <option value="?language={{$language->language}}"{{Request::segment(2) === $language->language ? 'selected' : ''}}>{{$language->language}}</option>
                    @endforeach
                </select>
                <ul>
                    @foreach($chooseTranslations  as $chooseTranslation)
                        <li>
                            <strong>{{ $chooseTranslation->native }}</strong>
                            <a href="{{ route('chooseTranslations.show', $chooseTranslation) }}">Take the quiz</a>
                            @role('admin')
                            <a href="{{ route('chooseTranslations.edit', $chooseTranslation) }}">Edit</a>
                            @else
                                @if(Auth::id() == $chooseTranslation->user_id)
                                    <a href="{{ route('chooseTranslations.edit', $chooseTranslation) }}">Edit</a>
                                @endif
                                @endrole
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

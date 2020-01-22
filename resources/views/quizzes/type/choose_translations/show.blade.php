@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="title m-b-md">
                Rozwiąż QUIZ
            </div>
        </div>

        <div>
            <ul>
                <li>Choose correct answer for: {{$chooseTranslation->native}}
                    <br>
                    <?php
                        $answers=[];
                        array_push($answers,
                            $chooseTranslation->foreign_correct,
                            $chooseTranslation->foreign_1,
                            $chooseTranslation->foreign_2,
                            $chooseTranslation->foreign_3);
                        shuffle($answers);
                        foreach ($answers as $answer)
                            echo $answer . ' ';
                    ?>

                </li>
            </ul>

        </div>

        <div class="container">
            <form method="POST" action='{{ route('chooseTranslations.verifyAnswer', $chooseTranslation) }}'>
                @csrf
                <div id="field1">
                    <label>Odpowiedź</label>
                    <input type="text" name="answer">
                    @error('answer')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit">OK</button>
            </form>
            @role('admin')
            @else
                <a href="{{ route('chooseTranslations.report', $chooseTranslation) }}">Zgłoś</a>
            @endrole
                <a href="{{route('chooseTranslations.show', $chooseTranslation->id+1 <= \App\ChooseTranslation::count() ? $chooseTranslation->id+1  : $chooseTranslation->id=1 )}}">Następny</a>

        </div>
    </div>
@endsection

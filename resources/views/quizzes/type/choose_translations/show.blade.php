@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
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

        </div>
    </div>
@endsection

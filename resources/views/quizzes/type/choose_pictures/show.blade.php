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
                <li>Choose correct answer for: {{$choosePicture->foreign}}
                    <br>
                    @php
                    $answers=[];
                    $counter= 1;
                    $correctImage = 0;
                    array_push($answers,
                        $choosePicture->image_correct,
                        $choosePicture->image_1,
                        $choosePicture->image_2,
                        $choosePicture->image_3);
                    shuffle($answers);
                    @endphp
                    @foreach ($answers as $answer)
                        <div>
                            <b>{{$counter}}
                                <img src="{{asset("uploads/images/" . $answer)}}" width="100px" height="100px" alt="Image">
                                @if($answer == $choosePicture->image_correct)
                                    @php $correctImage = $counter @endphp
                                @endif
                                @php $counter = $counter+1; @endphp
                            </b>
                        </div>
                    @endforeach

                </li>
            </ul>

        </div>

        <div class="container">
            <form method="POST" action='{{ route('choosePictures.verifyAnswer', $correctImage) }}'>
                @csrf
                <div id="field1">
                    <label>Answer</label>
                    <input type="text" name="answer">
                    @error('answer')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit">OK</button>
            </form>

            @role('admin')
            @else
                <a href="{{ route('choosePictures.report', $choosePicture) }}">Zgłoś</a>
            @endrole
                <a href="{{route('choosePictures.show', $choosePicture->id+1 <= \App\OrderSentence::count() ? $choosePicture->id+1  : $choosePicture->id=1 )}}">Następny</a>

        </div>
    </div>
@endsection

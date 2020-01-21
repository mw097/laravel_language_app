@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @role('admin')
                        <h4>Reported:</h4>
                        @foreach($reporteds as $reported)
                            @switch($reported->quiz_type)
                                @case('translateWord')
                                    <br>
                                    <a href="/translateWords/{{$reported->quiz_id}}/edit">{{$reported->quiz_type .': '. $reported->quiz_id}}</a>
                                    <a href="{{route('reporteds.destroy', $reported)}}">Usuń zgłoszenie</a>
                                @break

                                @case('translateSentence')
                                    <br>
                                    <a href="/translateSentences/{{$reported->quiz_id}}/edit">{{$reported->quiz_type .': '. $reported->quiz_id}}</a>
                                    <a href="{{route('reporteds.destroy', $reported)}}">Usuń zgłoszenie</a>
                                @break

                                @case('orderSentence')
                                <br>
                                <a href="/orderSentences/{{$reported->quiz_id}}/edit">{{$reported->quiz_type .': '. $reported->quiz_id}}</a>
                                <a href="{{route('reporteds.destroy', $reported)}}">Usuń zgłoszenie</a>
                                @break

                                @case('chooseTranslation')
                                <br>
                                <a href="/chooseTranslations/{{$reported->quiz_id}}/edit">{{$reported->quiz_type .': '. $reported->quiz_id}}</a>
                                <a href="{{route('reporteds.destroy', $reported)}}">Usuń zgłoszenie</a>
                                @break

                                @default
                                    <br>
                                    <span>Something went wrong, please try again</span>
                                    <br>
                            @endswitch
                        @endforeach
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

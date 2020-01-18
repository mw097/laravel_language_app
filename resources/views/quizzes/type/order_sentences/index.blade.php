@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Order sentence:</h2>

                <ul>
                    @foreach($orderSentences  as $orderSentence)
                        <li>
                            <strong>{{ $orderSentence->id }}</strong>
                            <a href="{{ route('orderSentences.show', $orderSentence) }}">Take the quiz</a>
                            <a href="{{ route('orderSentences.edit', $orderSentence) }}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

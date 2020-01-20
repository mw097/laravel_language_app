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
                        <a href="{{$reported->link}}">TEXT</a>
                        @endforeach
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

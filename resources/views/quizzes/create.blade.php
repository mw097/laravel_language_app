@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Create Quiz

            <div>
                <form>
                    Select Quiz type:
                    <select name="quizType" onchange="if (this.value) window.location.href='/quiz/create/'+this.value">
                        <option>Select Quiz</option>
                        <option value="translate_words" >Translate words</option>
                        <option value="translate_sentences" >Translate sentences</option>
                        <option value="choose_translations">Choose translations</option>
                        <option value="choose_pictures">Choose pictures</option>
                        <option value="order_sentences">Order sentences</option>
                    </select>
                </form>

                <div>
                    @yield('quizType')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                        <option value="">Select option</option>
                        <option value="translate_words" {{Request::segment(3) === 'translate_words' ? 'selected' : ''}}>Translate words</option>
                        <option value="translate_sentences" {{Request::segment(3)=== 'translate_sentences' ? 'selected' : ''}}>Translate sentences</option>
                        <option value="choose_translations" {{Request::segment(3)=== 'choose_translations' ? 'selected' : ''}}>Choose translations</option>
                        <option value="choose_pictures" {{Request::segment(3)=== 'choose_pictures' ? 'selected' : ''}}>Choose pictures</option>
                        <option value="order_sentences" {{Request::segment(3)=== 'order_sentences' ? 'selected' : ''}}>Order sentences</option>
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

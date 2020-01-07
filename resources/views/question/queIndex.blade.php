@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            @foreach ($questions as $question)
            <div class="card promoting-card mb-2 p-3 m-2">
                <div>
                    @foreach ($question->tags as $tag)
                    <a href="{{route('question.tag',$tag->id)}}" class="tags">{{$tag->name}}</a>
                    @endforeach
                    <a href="{{route('question.show',$question->id)}}">
                        <h2 class="card-title font-weight-bold mb-2">{{$question->question}}</h2>
                    </a>
                    <hr>
                    <img src="{{ asset('image/a.png') }}" data-id="{{$question->id}}" class="showhidereply answerbtn" alt="jjj" width="4%" height="4%" style="display: inline-block;"> {{$question->answers()->count()}}
                </div>
                <div id="answer-{{$question->id}}" class="ans">
                    @if(Auth::check())
                    <form action="{{route('answer.store', $question->id)}}" method="post">
                        {{-- <form action="{{route('answer.store', $question->id)}}" method="post"> --}}
                        @csrf
                        <input type="hidden" id="answer">
                        Answer:
                        <div class="form-group">
                            <input id="x" type="hidden" name="answer" required>
                            <trix-editor input="x" placeholder="Enter yout answer here.." required></trix-editor>
                            {{-- <textarea name="answer"  cols="" rows="2" id="answer" class="form-control"></textarea> --}}
                        </div>
                        <input type="submit" value="submit" class="btn btn-success mb-3">
                    </form>
                    @else
                    <a href="{{ route('login')}}">signIn</a> or <a href="{{ route('register')}}">signUp</a> to answer
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        <div class="col-sm-2">
            <h4>Tags</h4>
            @foreach ($tags as $tag)
            <a class="tags" href="{{route('question.tag',$tag->id)}}">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection

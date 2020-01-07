@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3 class="m-3">Question Asked under <b>{{$tag->name}}</b></h3>
            @if($questionsTag->count() > 0)
                @foreach ($questionsTag as $question)
                <div class="card promoting-card p-3 m-2">
                    <div>
                        @foreach ($question->tags as $tag)
                        <a href="{{$tag->id}}" class="tags">{{$tag->name}}</a>
                        @endforeach
                        <a href="{{route('question.show',$question->id)}}">
                            <h2>{{$question->question}}</h2>
                        </a>
                        <hr class="hr">
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
                                <trix-editor input="x" placeholder="Enter yout answer here.."></trix-editor>
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
                @else
                <div>
                    <h2><i>NO POST AVAILABLE UNDER THIS TAG</i></h2>
                </div>
                <div class="mt-5">
                    <h4>Related Questions</h4>
                    @foreach ($questions as $question)
                    <a href="">{{$question->question}}</a><br>
                    @endforeach
                </div>
                @endif
        </div>

        <div class="col-sm-2">
            <h4>Tags</h4>
            @foreach ($tags as $tag)
            <a href="{{$tag->id}}" class="tags">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>

</div>
@endsection

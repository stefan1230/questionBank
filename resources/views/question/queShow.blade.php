@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex">
                @if(Auth::check())
                @if(Auth::user()->id == $question->author_id)
                    <a class="btn btn-primary mr-4" href="{{ route('question.edit', $question->id )}}"
                         data-toggle="modal" data-target="#editModal" 
                         data-question="{{$question->question}}"
                         data-tags[]="{{$question->tags}}">
                        Edit</a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</a>
                    @endif
                    @endif
            </div><br><br>
            <div class="mb-3">
                @foreach ($question->tags as $tag)
                <a href="" class="tags">{{$tag->name}}</a>
                @endforeach
            </div>
            <div>
                <a id="click" class="btn btn-default btn-sm">
                    <img src="{{asset('image/edit.png')}}" height="20px" width="20px" alt="" class="mr-2">
                    Write Answer
                </a>
                <i>asked by : {{$user->name}} </i>
            </div>

            <h2 class="mb-2">{{$question->question}}</h2>

            <div id="form">
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
            <div>
                @if($question->answers->count()==0)
                    <p><i>No answers  available.</i></p>
                @else
                @foreach ($question->answers as $answer)
                {{-- CARD --}}
                <div class="card promoting-card mb-2">
                    <div class="card-body d-flex flex-row">
                        <img src="{{asset('image/'.$answer->user->profile_pic)}}" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
                        <div>
                            <h5 class="card-title font-weight-bold mb-1">{{$answer->user->name}}</h5>
                            <p class="card-text"><i class="far fa-clock pr-2"></i>{{$answer->created_at}}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse-content">
                            <p class="card-text collapse" id="collapseContent">{!! $answer->answer !!}</p>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-6">
        
        </div>
    </div>
</div>








{{-- MODAL to add question --}}
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Question</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('question.update',$question->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="md-form mb-2">
                    <input type="text" value="" style="font-weight: bold;" name="question" id="orangeForm-name" class="question form-control validate" placeholder="Ask Your Question">
                </div>
                <select class="form-control tags_selector3" name="tags[]" id="tags" class="tags" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" @if(isset($question))
                    {{-- pluck will get ids from the collection --}}
                    {{-- toArray converts to an array --}}
                    @if(in_array($tag->id, $question->tags->pluck('id')->toArray()))
                        selected
                        @endif
                        @endif
                        >{{$tag->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary askSubmit">Edit Question</button>
            </div>
        </form>
        </div>
    </div>
</div>  



{{-- Delete  --}}
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this question?
        </div>
        <div class="modal-footer">
            <form action="{{ route('question.destroy', $question->id )}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

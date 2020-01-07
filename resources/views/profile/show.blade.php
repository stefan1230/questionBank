@extends('layouts.app')


@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-8" style="display:inline-block">
                <img src="{{asset('image/'.$user->profile_pic)}}" alt="" height="150px" width="150px" style="border-radius:50%;">
                <div>
                    <b id="username">{{$user->name}}</b>
                    @if(Auth::user())
                        {{-- <a href="" class="usernameEdit">Edit</a> --}}
                    @endif
                </div>
                
                <div>
                @if($user->profession == null)
                    @if(Auth::user())
                    <a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$user->profession}}">Tell others what you do</a>
                    @endif
                @else
                    {{$user->profession}}
                    @if(Auth::user())
                    <a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$user->profession}}">Edit</a>
                    @endif
                @endif
                </div>

                <div>
                @if($user->bio == null)
                    @if(Auth::user())
                        <a class="P-bio">Tell others about yourself</a>
                        <div  class="proBio">
                            <form action="{{route('profile.bioupdate', $user->id)}}" method="post">
                                @csrf
                                Answer:
                                <div class="form-group">
                                        <input id="x" type="hidden" name="bio"> 
                                        <trix-editor input="x" placeholder="Enter yout answer here.."></trix-editor>
                                        {{-- <textarea name="answer"  cols="" rows="2" id="answer" class="form-control"></textarea> --}}
                                </div>
                                <input type="submit" value="submit" class="btn btn-success mb-3">
                            </form>
                        </div>
                    @endif
                @else
                    {!!$user->bio!!}
                    @if(Auth::user())
                        <a class="P-bio">Edit</a>
                        <div  class="proBio">
                            <form action="{{route('profile.bioupdate', $user->id)}}" method="post">
                                @csrf
                                Answer:
                                <div class="form-group">
                                        <input id="x" type="hidden" name="bio" value="{{$user->bio}}"> 
                                        <trix-editor input="x" placeholder="Enter yout answer here.."></trix-editor>
                                        {{-- <textarea name="answer"  cols="" rows="2" id="answer" class="form-control"></textarea> --}}
                                </div>
                                <input type="submit" value="submit" class="btn btn-success mb-3">
                            </form>
                        </div>
                    @endif
                @endif
                </div>
           </div>
           <div class="col-md-4">

           </div>
       </div>

       <div>
           @foreach ($questions as $question)
               {{$question->question}}
           @endforeach
       </div>
   </div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profession</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('profile.professionupdate',$user->id)}}" method="POST">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Profession</label>
            <input type="text" class="form-control profession" name="profession"  placeholder="Student,Teacher,Entreprenuer..">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">add Credential</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
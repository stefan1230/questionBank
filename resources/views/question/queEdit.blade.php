@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('question.update',$question->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <textarea name="question" class="form-control" id="" cols="30" rows="10">{{$question->question}}</textarea>
        </div>
        <div class="form-group">
            <select class="form-control tags_selector" name="tags[]" id="tags" multiple>
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
        <div class="form-group">
            <input type="submit" value="update" class="btn btn-success">
        </div>
    </form>
</div>
@endsection

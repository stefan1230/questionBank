@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('question.store')}}" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="question" id="" cols="30" rows="10"></textarea>
        </div>
        {{-- <select name="tags[]" id="" multiple>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
        </select> --}}
        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control tags_selector" name="tags[]" id="tags" multiple>
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="add">
    </form>



</div>
@endsection

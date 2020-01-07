@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('tag.store')}}" method="post">
        @csrf
        <input type="text" name="tag" id="">
        <input type="submit" value="add">
    </form>
</div>
@endsection
  
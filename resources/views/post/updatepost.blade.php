@extends('layouts.app')
@section('content')
<h1><a href="{{ action('PostController@index') }}">Posts</a></h1><hr>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ url('post/{id}/storeupdatedpost') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="text">Title</label>
        <input type="text" class="form-control" id="text" name="title" value="{{ $post->title }}">
    </div>
    <input type="hidden" name="id" value="{{ $post->id }}">
    <input type="hidden" name="author" value="{{ Auth::id() }}">
    <div class="form-group">
        <label for="contentpost">Change Your Post</label>
        <textarea name="content" class="form-control" id="contentpost" rows="20" >{{ $post->content }}</textarea>
    </div>
    <input type="submit" class="btn btn-primary"value="Save Post">
</form>
@endsection


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
<form action="{{ url('post/storepost') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="text">Title</label>
        <input type="text" class="form-control" id="text" name="title">
    </div>
    <div class="form-group">
        <label for="photo">Upload Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
    </div>
    <div class="form-group">
        <label for="contentpost">Add Your Post</label>
        <textarea name="content" class="form-control" id="contentpost" rows="20"></textarea>
    </div>
    <input type="submit" class="btn btn-primary"value="Add Post">
</form>
@endsection
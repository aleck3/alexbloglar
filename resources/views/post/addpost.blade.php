@extends('layouts.app')
@section('content')
<h1><a href="{{ action('PostController@index') }}">Posts<a></h1><hr>
    <form action="{{ url('post/storepost') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="text">Title</label>
            <input type="text" class="form-control" id="text" name="title">
        </div>
        <input type="hidden" name="author" value="3">
        <div class="form-group">
            <label for="contentpost">Add Your Post</label>
            <textarea name="content" class="form-control" id="contentpost" rows="20"></textarea>
        </div>
        <input type="submit" class="btn btn-primary"value="Add Post">
    </form>
@endsection
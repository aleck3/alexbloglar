@extends('layouts.app')
@section('content')
<h1> <a href="{{ action('PostController@index') }}">Post</a> </h1>
@if ($post->author == Auth::id())
<a href="{{ action('PostController@updatepost', ['id' => $post->id]) }}">Edit Post</a><hr>
@endif
<ul class="list-unstyled">
    <li><h2>{{ $post->title }}</h2></li>
    <li><i><a href="{{ action('UserController@userdetails', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a></i></li>
    @if($post->file)
    <ul class="list-unstyled">
        @foreach($post->file as $file)
        <li><img src="{{ Storage::url($file->name) }}"></li>
        @endforeach
    </ul>
    <br>
    @endif
    <li>{{ $post->content }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
</ul>
<hr>
<H4>Comments</H4>
@if ($post->comment->count()!=0)
<ul>
    @foreach($post->comment as $comment)
    <li><i>{{ $comment->author_email }}</i></li>
    <li>{{ $comment->comment }}</li><br>
    @endforeach
</ul>
@else
<p>No Commens yet</p>
@endif
<hr>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/post/{id}/addcomment" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Your E-mail</label>
        <input type="email" class="form-control" id="email" name="author_email"
               placeholder="Email">
    </div>

    <div class="form-group"
         <label for="commentcomment">Your Comment</label><br>
        <textarea name="comment" id="contentcomment" class="form-control"
                  rows="10"></textarea>
    </div>

    <input type="hidden" name="post_id" value="{{ $post->id }}"><br>
    <input class="btn btn-primary" type="submit" value="Add Comment">
</form>
@endsection

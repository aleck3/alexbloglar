@extends('layouts.app')
@section('content')
<h1> <a href="{{ action('PostController@index') }}">Post</a> </h1>
@if ($post->author == Auth::id())
<a href="{{ action('PostController@updatepost', ['id' => $post->id]) }}">Edit Post</a><hr>
@endif
<li><h2>{{ $post->title }}</h2></li>
<li><i>{{ $post->user->name }}</i></li>
<li>{{ $post->content }}</li>
<li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
<hr>
<H4>Comments</H4>
@if ($comments->count()!=0)
<ul>
    @foreach($comments as $comment)
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

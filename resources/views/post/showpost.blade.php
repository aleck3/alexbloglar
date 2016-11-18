@extends('layouts.app')
@section('content')
<h1> <a href="{{ action('PostController@index') }}">Post</a> </h1>
<li><h2>{{ $post->title }}</h2></li>
<li><i>{{ $post->user->username }}</i></li>
<li>{{ $post->content }}</li>
<li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
<hr>
<H2>Comments</H2>
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
<form action="/post/{id}/addcomment" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Your E-mail</label>
        <input type="email" class="form-control" id="email" name="author_email" placeholder="Email">
    </div>

    <div class="form-group"
         <label for="commentcomment">Your Comment</label><br>
        <textarea name="comment" id="contentcomment" class="form-control" rows="10"></textarea>
    </div>

    <input type="hidden" name="post_id" value="{{ $post->id }}"><br>
    <input class="btn btn-primary" type="submit" value="Add Comment">
</form>
@endsection

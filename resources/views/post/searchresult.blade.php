@extends('layouts.app')
@section('content')
<h1> Search Results </h1>
<a href="{{ action('PostController@index') }}">All Posts</a>
@if ($posts->count()!=0)
<ul class="list-unstyled">
    @foreach ($posts as $post)
    <li><a href="{{ action('PostController@showpost', ['id' => $post->id]) }}"><h2>{{ $post->title }}</h2></a></li>
    <li><i>{{ $post->user->name }}</i></li>
    <li>{{ str_limit($post->content, 200) }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
    @endforeach
</ul>
{{ $posts->appends(Request::only('q'))->links() }}
@else
<div class="alert alert-info" role="alert">No Posts found. Try to search again !</div>
@endif
@endsection


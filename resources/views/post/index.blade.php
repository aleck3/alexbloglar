@extends('layouts.app')
@section('content')
<h1> Posts </h1>
<a href="{{ action('PostController@addpost') }}">Create new Post</a><br>
<a href="{{ action('PostController@contact') }}">Contact Us</a><hr>
<ul class="list-unstyled">
    @foreach ($posts as $post)
    <li><a href="{{ action('PostController@showpost', ['id' => $post->id]) }}"><h2>{{ $post->title }}</h2></a></li>
    <li><i>{{ $post->user->name }}</i></li>
    <li>{{ str_limit($post->content, 200) }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
    @endforeach
</ul>
{{ $posts->links() }}
@endsection

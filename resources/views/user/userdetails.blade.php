@extends('layouts.app')
@section('content')
<h1><a href="{{ action('PostController@index') }}">Posts</a></h1><hr>
<h2>About user: <strong>{{ $userdetails->user->name }}</strong></h2>
<ul class="list-unstyled">
    @if($userdetails->avatar)
    <li><img src="{{ Storage::url($userdetails->avatar) }}"></li>
    <br>
    @endif
    <li><strong>First name: </strong>{{ $userdetails->firstname }}</li>
    <li><strong>Last name: </strong>{{ $userdetails->lastname }}</li>
    <li><strong>Date of Birth: </strong>{{ $userdetails->date_of_birth }}</li>
</ul>
@if ($userdetails->user->id == Auth::id())
<a href="{{ action('UserController@add_mydetails') }}">Edit My details</a><hr>
@endif
@endsection
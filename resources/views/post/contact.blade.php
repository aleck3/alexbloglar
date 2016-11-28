@extends('layouts.app')
@section('content')
<h1>Contact Us</h1>
<a href="{{ action('PostController@index') }}">Back to Posts</a>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-info">
    {{Session::get('message')}}
</div>
@endif
<form action="{{ url('post/sendmail') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="yourname">Your Name</label>
        <input type="text" class="form-control" id="yourname" name="sendername">
    </div>
    <div class="form-group">
        <label for="youremail">Your E-mail</label>
        <input type="email" class="form-control" id="youremail" name="senderemail">
    </div>
    <div class="form-group">
        <label for="yourmessage">Your Message</label>
        <textarea name="sendermessage" class="form-control" id="yourmessage" rows="5"></textarea>
    </div>
    <input type="submit" class="btn btn-primary"value="Contact Us">
</form>
@endsection


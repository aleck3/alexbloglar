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
<form action="{{ url('user/store_mydetails') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="firstname">First name</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last name</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="form-group">
        <label for="avatar">Upload Photo (80x80 px)</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
    </div>
    <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
    </div>
    <input type="submit" class="btn btn-primary"value="Add info">
</form>
@endsection
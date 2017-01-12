@extends('layouts.app')
@section('content')
<ul class="list-unstyled list-inline">
    <li>Posts</li>
    <li><a href="{{ url('admin/users') }}">Users</a></li>
</ul>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                Post Id
            </th>
            <th>
                Author
            </th>
            <th>
                Post Title
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                {{ $post->id }}
            </td>
            <td>
                {{ $post->user->name }}
            </td>
            <td>
                {{ $post->title }}
            </td>
            <td>
                <form action="{{ url('post/'.$post->id.'/delete') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete Post
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $posts->links() }}
@endsection
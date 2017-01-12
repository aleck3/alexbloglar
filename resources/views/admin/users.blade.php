@extends('layouts.app')
@section('content')
<ul class="list-unstyled list-inline">
    <li>Users</li>
    <li><a href="{{ url('admin') }}">Posts</a></li>
</ul>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                User Id
            </th>
            <th>
                User Name
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                <form action="{{ url('user/'.$user->id.'/delete') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete User
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
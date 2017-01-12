<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class AdminpanelController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.index', ['posts' => $posts]);
    }

    public function deletepost($id)
    {
        Post::destroy($id);
        return back();
    }

    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users', ['users' => $users]);
    }

    public function deleteuser($id)
    {
        User::destroy($id);
        return back();
    }

}

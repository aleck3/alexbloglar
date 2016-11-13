<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function showpost($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $post->id)
                ->get();
        return view('post.showpost', ['post' => $post,
            'comments' => $comments]);
    }

}

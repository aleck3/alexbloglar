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
    public function addcomment(Request $request)
    {
      $comment = new Comment();
      $comment->author_email = $request->author_email;
      $comment->comment = $request->comment;
      $comment->post_id = $request->post_id;
      $comment->save();
      return back();
    }

}

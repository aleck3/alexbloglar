<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('date_published')->paginate(2);
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

    public function addpost()
    {
        return view('post.addpost');
    }

    public function addcomment(Request $request)
    {
        $comment = new Comment();
        $comment->author_email = $request->input('author_email');
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        return back();
    }

    public function updatepost($id)
    {
        $post = Post::findOrFail($id);
        return view('post.updatepost', ['post' => $post]);
    }

    public function storepost(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->save();
        return redirect('post');
    }
    
    public function storeupdatedpost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->save();
        return redirect('post');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('date_published', 'desc')->paginate(2);
        return view('post.index', ['posts' => $posts]);
    }

    public function contact()
    {
        return view('post.contact');
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
        $this->validate($request, [
            'author_email' => 'required|email',
            'comment' => 'required'
        ]);

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
        if ($post->author == Auth::id()) {
            return view('post.updatepost', ['post' => $post]);
        } else {
            return redirect()->action(
                            'PostController@showpost', ['id' => $id]
            );
            ;
        }
    }

    public function storepost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->save();
        return redirect('post');
    }

    public function storeupdatedpost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::findOrFail($request->id);
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->save();
        return redirect('post');
    }

    public function sendmail(Request $request)
    {

        $this->validate($request, [
            'sendername' => 'required',
            'senderemail' => 'required|email',
            'sendermessage' => 'required',
        ]);

        Mail::to('aleck3@ukr.net')->send(new Contact($request));

        return redirect('post/contact')
                        ->with('message', 'Thanks for contacting us!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\File;
use App\Comment;
use App\PostHasFiles;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Posts Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for CRUD operations with posts
      | and showing contact page with sending mail function
      |
     */

    //Show all posts
    public function index()
    {
        $posts = Post::orderBy('date_updated', 'desc')->paginate(5);
        return view('post.index', ['posts' => $posts]);
    }

    //Show contact page
    public function contact()
    {
        return view('post.contact');
    }

    //Show one post by its ID
    public function showpost($id)
    {
        $post = Post::findOrFail($id);
        return view('post.showpost', ['post' => $post]);
    }

    //Show the page for adding post
    public function addpost()
    {
        return view('post.addpost');
    }

    //Adding comment to a post
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

    //Updating a post
    public function updatepost($id)
    {
        $post = Post::findOrFail($id);
        if ($post->author == Auth::id()) {
            return view('post.updatepost', ['post' => $post]);
        } else {
            return redirect('post');
        }
    }

    //Storing created post to database
    public function storepost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'photo' => 'mimes:jpeg,bmp,png'
        ]);
        $post = new Post();
        $file = new File();
        $posthasfiles = new PostHasFiles();
        $post->title = $request->input('title');
        $post->author = Auth::id();
        $post->content = $request->input('content');
        $post->save();
        if ($request->file('photo')) {
            $file->user_id = $post->author;
            $file->type = $request->file('photo')->extension();
            $file->name = $request->file('photo')->store('public/images');
            $file->save();
            $posthasfiles->post_id = $post->id;
            $posthasfiles->id = $file->id;
            $posthasfiles->save();
        }
        return redirect('post');
    }

    //Storing updated post to the database
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

    //sending mail from the Contact Page
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

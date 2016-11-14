<div style="width: 700px; margin: auto">
    <h1> Post </h1><hr>

    <li><h2>{{ $post->title }}</h2></li>
    <li><i>{{ $post->user->username }}</i></li>
    <li>{{ $post->content }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
    <hr>
    <H2>Comments</H2>
    @foreach($comments as $comment)
    <li><i>{{ $comment->author_email }}</i></li>
    <li>{{ $comment->comment }}</li><br>
    @endforeach
    <hr>
    <form action="/post/{id}/addcomment" method="post">
        {{ csrf_field() }}
        <label>Your E-mail</label><br>
        <input type="text" name="author_email">
        <br><br>
        <label>Your Comment</label><br>
        <textarea name="comment" rows="10" cols="96"></textarea>
        <input type="hidden" name="post_id" value="{{ $comment->post_id}}"><br>
        <input type="submit" value="Add Comment">
    </form>
</div>

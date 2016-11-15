<div style="width: 700px; margin: auto">
    <h1> <a href="<?php echo action('PostController@index')?>">Post<a> </h1><hr>

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
        <?php echo action('PostController@showpost', ['id' => $post->id]); ?>
    </form>
</div>

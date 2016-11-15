
<div style="width: 700px; margin: auto">
    <h1> Posts </h1><a href="<?php echo action('PostController@addpost') ?>">Create new Post</a><hr>
    @foreach ($posts as $post)
    <li><a href="<?php echo action('PostController@showpost', ['id' => $post->id]); ?>"><h2>{{ $post->title }}</h2></a></li>
    <li><i>{{ $post->user->username }}</i></li>
    <li>{{ str_limit($post->content, 200) }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
    <hr>
    @endforeach
</div>


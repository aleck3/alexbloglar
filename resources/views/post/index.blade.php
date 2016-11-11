
<div style="width: 700px; margin: auto">
    <h1> Posts </h1><hr>
    @foreach ($posts as $post)
    <li><a href="#"><h2>{{ $post->title }}</h2></a></li>
    <li><i>{{ $post->author }}</i></li>   
    <li>{{ str_limit($post->content, 200) }}</li>
    <li><b>{{ date('F d, Y', strtotime($post->date_published)) }}</b></li><br>
    <hr>
    @endforeach
</div>


<form action="/post/addpost" method="post">
    {{ csrf_field() }}
        <label>Title</label><br>
        <input type="text" name="title">
        <br><br>
        <label>Add Your Post</label><br>
        <textarea name="comment" rows="20" cols="96"></textarea>
        <input type="hidden" name="post_id" value="{{ $comment->post_id}}"><br>
        <input type="submit" value="Add Comment">
</form>

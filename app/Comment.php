<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public $table = 'comment';
    public $timestamps = false;
    protected $fillable = ['comment', 'author_email'];
    
    

    public function post()
    {
        return $this->hasOne('App\Post', 'id', 'post_id');
    }

}

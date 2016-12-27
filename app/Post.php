<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $table = 'post';
    public $timestamps = false;
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'author');
    }

    public function file()
    {
        return $this->hasManyThrough('App\File', 'App\PostHasFiles', 'post_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany("App\Comment", 'post_id', 'id');
    }

}

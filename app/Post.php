<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Post extends Model
{
    public $table = 'post';

    public function setDatePublished()
    {
        $this->date_published->format('d.m.Y');
    }
}

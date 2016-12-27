<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    public $table = 'user_details';
    
    public function user()
    {
        return $this->belongsTo('User', 'id', 'user_id');
    }
}

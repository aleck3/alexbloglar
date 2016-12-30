<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{

    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'date_od_birth'];
    public $table = 'user_details';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

}

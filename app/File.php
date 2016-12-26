<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    public $table = 'file';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}

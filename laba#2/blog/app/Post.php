<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function hashtags() {
        return $this->belongsToMany('App\Hashtag');
    }
}

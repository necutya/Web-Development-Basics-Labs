<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    public static function getHashtag($name) {
        return Hashtag::where('name', $name)->get();
    }

    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}

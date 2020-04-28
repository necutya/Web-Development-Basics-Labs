<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function author($id) {
        return User::find($id)->name;
            //(DB::table('users')->find($post->user_id))->name
    }
}

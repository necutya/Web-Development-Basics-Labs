<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $posts = \DB::table('posts')->paginate(3);
        return view('home', compact('posts'));
    }

    public function about() {
        return view('about');
    }

    public function show_post($id) {
        $post = \DB::table('posts')->find($id);
        return view('post', compact('post'));
    }


}

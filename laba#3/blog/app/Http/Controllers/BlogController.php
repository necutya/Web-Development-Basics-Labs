<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Hashtag;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
//        $posts = \DB::table('posts')->paginate(3);
        $posts = Post::paginate(3);

//        dd(Post::find(6)->hashtags);

        return view('home', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function show_post($id)
    {
//        $post = \DB::table('posts')->find($id);
        $post = Post::find($id);
        return view('post', compact('post'));
    }

    public function show_user_posts($id)
    {
        $posts = User::find($id)->posts()->paginate(3);
        return view('user_posts', compact('posts'));
    }

    public function create_post()
    {
        return view('create_post');
    }

    public function check_created_post(Request $req)
    {
        $this->validate($req, [
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        $new_post = array(
            'title' => $req->get('title'),
            'content' => $req->get('content'),
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        );

        $hashtags = array(
            'name' => $req->get('hastags'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        );

        $post_id = Post::insertGetId($new_post);

        if($req->get('hastags') >0) {
            if (count(Hashtag::getHashtag($hashtags['name']))) {
                $hashtag_post = array(
                    'hashtag_id' => Hashtag::getHashtag($hashtags['name'])[0]->id,
                    'post_id' => $post_id
                );
                \DB::table('hashtag_post')->insert($hashtag_post);
            } else {
                Hashtag::insert($hashtags);
                $hashtag_post = array(
                    'hashtag_id' => Hashtag::getHashtag($hashtags['name'])[0]->id,
                    'post_id' => $post_id
                );
                \DB::table('hashtag_post')->insert($hashtag_post);

            }
        }
        return redirect('home')->with('msg', 'Post has been successfully created');
    }

    public function posts_with_hashtag($id)
    {
        $posts = Hashtag::find($id)->posts()->paginate(3);
        return view('post_with_hashtag', compact('posts'));
    }
}

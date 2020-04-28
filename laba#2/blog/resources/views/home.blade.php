@extends('layouts.layout')
@section('title', 'Home Page')
@section('content')
    @foreach($posts as $post)
        <div class="post">
            <a class="name" href="#"></a>
            <div class="content">
                <div class="metadata">
                        <p><a class="name" href="post/{{$post->id}}">{{App\Post::author($post->user_id)}}</a></p>
                        <p class="date">{{$post->updated_at}}</p>
                </div>
                <h2><a href="#">{{$post->title}}</a></h2>
                <p>{{$post->content}}</p>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection


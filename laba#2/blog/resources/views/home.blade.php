@extends('layouts.layout')
@section('title', 'Home Page')
@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="content">
                <div class="metadata">
                        <p><a class="name" href="/user/{{$post->author->id}}">{{$post->author->name}}</a></p>
                        <p class="date">{{date("H:i d/m/y",strtotime($post->updated_at))}}</p>
                        @if($post->hashtags)
                            @foreach($post->hashtags as $hashtag)
                                <a href="/hashtag/{{$hashtag->id}}" class="hashtag">{{$hashtag->name}}</a>
                            @endforeach
                        @endif
                </div>
                <h2><a href="post/{{$post->id}}">{{$post->title}}</a></h2>
                <p>{{$post->content}}</p>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection


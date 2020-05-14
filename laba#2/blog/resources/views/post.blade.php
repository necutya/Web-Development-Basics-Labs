@extends('layouts.layout')
@section('title', $post->title)
@section('content')
    <div class="post">
        <div class="content">
            <div class="metadata" style="justify-content: space-between">
                <div class="flex_row">
                    <p><a class="name" href="/user/{{$post->author->id}}">{{$post->author->name}}</a></p>
                    <p class="date">{{date("H:i d/m/y",strtotime($post->updated_at))}}</p>
                    @if($post->hashtags)
                        @foreach($post->hashtags as $hashtag)
                            <a href="/hashtag/{{$hashtag->id}}" class="hashtag">{{$hashtag->name}}</a>
                        @endforeach
                    @endif
                </div>
{{--                {% if post.author.username == current_user.username%}--}}
{{--                <div class="flex_row">--}}
{{--                    <p><a class="name" href="{{url_for('posts.edit_post', post_id = post.id)}}"><i class="fas fa-edit"></i> Edit</a></p>--}}
{{--                    <p class="name"><a class="name" id="delete" href="{{url_for('posts.delete_post', post_id = post.id)}}"><i class="fas fa-trash-alt"></i> Delete</a></p>--}}
{{--                </div>--}}
{{--                {% endif %}--}}
            </div>
            <h2><a href="#">{{$post->title}}</a></h2>
            <p>{{$post->content}}</p>
        </div>
    </div>

@endsection
@extends('layouts.layout')
@section('title', 'Post')
@section('content')
    <div class="post">
        <a class="name" href="#"></a>
        <div class="content">
            <div class="metadata" style="justify-content: space-between">
                <div class="flex_row">
                    <p><a class="name" href="">{{App\Post::author($post->user_id)}}</a></p>
                    <p class="date">{{$post->updated_at}}</p>
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
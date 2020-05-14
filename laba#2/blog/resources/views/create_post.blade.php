@extends('layouts.layout')
@section('title', 'Create Post')
@section('content')
    <form method="POST" action="{{url('create_post')}}" class="form">
        {{ csrf_field() }}
        <fieldset>
            <legend>Create Post</legend>
            <div class="form_item">
                <label for="title" class="form_item_label">Title</label>
                @if ($errors->has('title'))
                    <input id="title" type="text" class="form_item_input bad_input" name="title" value="" required>
                    <span class="bad_input_text">{{ $errors->first('title')}}</span>
                @else
                    <input id="title" type="text" class="form_item_input" name="title" value="" required>
                @endif
            </div>

            <div class="form_item">
                <label for="content" class="form_item_label">Content</label>
                @if ($errors->has('content'))
                    <textarea id="content" class="text_area bad_input content" name="content" value="" required></textarea>
                    <span class="bad_input_text">{{ $errors->first('content')}}</span>
                @else
                    <textarea id="content" class=" content text_area form_item_input" name="content" value="" required></textarea>
                @endif
            </div>

            <div class="form_item">
                <label for="hastags" class="form_item_label">Hastags</label>
                <input id="hastags" class="form_item_input" name="hastags" value="" placeholder="#first_post">
                <p class="hint">Set hashtags through a comma</p>
            </div>

            <div class="form_item">
                <input type="submit" class="form_item_input submit" value="Create">
            </div>
        </fieldset>
    </form>
@endsection
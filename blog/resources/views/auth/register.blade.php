@extends('layouts.layout')
@section('title', 'Registration')
@section('content')
    <form method="POST" action="{{url('register')}}" class="form">
        {{ csrf_field() }}
        <fieldset>
            <legend>Register</legend>
            <div class="form_item">
                <label for="name" class="form_item_label">Name</label>
                @if ($errors->has('name'))
                    <input id="name" type="text" class="form_item_input bad_input" name="name" value="" required autofocus>
                    <span class="bad_input_text">{{ $errors->first('name')}}</span>
                @else
                    <input id="name" type="text" class="form_item_input" name="name" value="" required autofocus>
                @endif
            </div>

            <div class="form_item">
                <label for="email" class="form_item_label">E-Mail Address</label>
                @if ($errors->has('email'))
                    <input id="email" type="email" class="form_item_input bad_input" name="email" value="" required autofocus>
                    <span class="bad_input_text">{{ $errors->first('email')}}</span>
                @else
                    <input id="email" type="email" class="form_item_input" name="email" value="" required autofocus>
                @endif
            </div>

            <div class="form_item">
                <label for="password" class="form_item_label">Password</label>
                @if ($errors->has('password'))
                    <input id="password" type="password" class="form_item_input bad_input" name="password" required >
                    <span class="bad_input_text">{{ $errors->first('password')}}</span>
                @else
                    <input id="password" type="password" class="form_item_input" name="password" required >
                @endif
            </div>

            <div class="form_item">
                <label for="password-confirm" class="form_item_label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form_item_input" name="password_confirmation" required >
            </div>

            <div class="form_item">
                <input type="submit" class="form_item_input submit" value="Register">
            </div>
        </fieldset>
    </form>
    <a class="hint" href="{{url('login')}}">
        Already has an account? Sign in
    </a>
@endsection

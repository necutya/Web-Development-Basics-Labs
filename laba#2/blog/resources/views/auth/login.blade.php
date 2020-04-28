@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    @if(isset(Auth::user()->email))
        <script>window.location = 'home';</script>
    @endif

    @if ($message = Session::get('error'))
        <div class="flash failed">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form method="post" action="{{url('login')}}" class="form">
        {{ csrf_field() }}
        <fieldset>
            <legend>Log in</legend>
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
                <input type="submit" class="form_item_input submit" value="Login">
        </div>
        </fieldset>
    </form>
    <a class="hint" href="{{url('register')}}">
        Don`t have an account? Sign up
    </a>
@endsection

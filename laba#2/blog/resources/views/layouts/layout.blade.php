<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c2c37fab8.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div id="logo"><a href="{{url('home')}}">Flask blog</a></div>
    <div class="header nav">
        <a href="{{url('home')}}">Home</a>
        <a href="{{url('about')}}">About</a>
        @if(isset(Auth::user()->email))
            <a href="{{url('create_post')}}">New post</a>
            <a href="">Account</a>
            <a href="{{url('logout')}}">Log out</a>
        @else
            <a href="{{url('register')}}">Register</a>
            <a href="{{url('login')}}">Log in</a>
        @endif
    </div>
</header>
<main>
    <div class="container">

        @if ($message = Session::get('msg'))
            <div class="flash success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @yield('content')
    </div>
    <div class="sidebar">
        <h3>Our Sidebar</h3>
        <ul><p>Choose needed option</p>
            <li><a href="">Latest Posts</a></li>
            <li><a href="">Announcements</a></li>
            <li><a href="">Calendars</a></li>
            <li><a href="">...</a></li>
        </ul>
    </div>
</main>
<footer>
    <a href="{{url('/')}}">Home</a>
    <a href="{{url('about')}}">About</a>
    @if(isset(Auth::user()->email))
        <a href="">New post</a>
        <a href="">Account</a>
        <a href="{{url('logout')}}">Log out</a>
    @else
        <a href="{{url('register')}}">Register</a>
        <a href="{{url('login')}}">Log in</a>
    @endif
</footer>
</body>
</html>
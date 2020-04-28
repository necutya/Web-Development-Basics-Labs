<?php
require_once('config.php');
?>
<head>
    <meta charset="UTF-8">
    <title>PHP blog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c2c37fab8.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div id="logo"><a href="home.php">PHP blog</a></div>
    <div class="header nav">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
    </div>
    <div class="header auth">
        <?php if (isset($_SESSION['logged_user'])):?>
            <a href="new_post.php">New post</a>
            <a href="account.php">Account</a>
            <a href="logout.php">Log out</a>
        <?php else:?>
            <a href="register.php">Register</a>
            <a href="login.php">Log in</a>
        <?php endif;?>
    </div>
</header>
<main>
    <div class="container">
        <?php if(isset($_GET['message_'])):?>
            <div class = "flash success"> <?php echo $_GET['message_']?></div>
        <?php endif;?>

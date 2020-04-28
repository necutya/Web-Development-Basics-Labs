
<footer>
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <?php if (isset($_SESSION['logged_user'])):?>
        <a href="new_post.php">New post</a>
        <a href="account.php">Account</a>
        <a href="logout.php">Log out</a>
     <?php else:?>
        <a href="register.php">Register</a>
        <a href="login.php">Log in</a>
    <?php endif;?>
</footer>
</body>
</html>
<?php
    include_once("header.php");
    unset($_SESSION['logged_user']);
    header('Location: '.'home.php?message = You have been logged out');
    ?>
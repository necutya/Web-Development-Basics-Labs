<?php
    include_once("header.php");
    $errors = array();
    $data = $_POST;

    $email = trim($data["email"]);


    if(isset($data['do_login'])) {
        if($email == '') {
            $errors['email'] = 'Enter an email';
        }
        else if($data['password'] == '') {
            $errors['password'] = 'Enter a password';
        }
        if (empty($errors)) {
            $check_user = "SELECT * FROM user WHERE email = '$email'";
            $user = $mysql->query($check_user, PDO::FETCH_ASSOC)->fetch();
            if ($user && password_verify($data['password'], $user['password'])) {
                $_SESSION['logged_user'] = $user;
                header('Location: '.'home.php?message = You have been logged in');
            } else {
                echo '<div class = "flash failed">Incorrect login or password</div>';
            }
        }
    }

?>

<form method="POST" action="" class="form">
    <fieldset>
        <legend>Log in</legend>
        <div class="form_item">
            <label for="email">Email</label>
            <?php if (!isset($errors['email'])): ?>
                <input type="email" name="email" class="form_item_input" id = "email">
            <?php else: ?>
                <input type="email" name="email" class="form_item_input bad_input" id = "email">
                <span class="bad_input_text"><?php echo array_shift($errors)?></span>
            <?php endif;?>
        </div>
        <div class="form_item">
            <label for="password">Password</label>
            <?php if (!isset($errors['password'])): ?>
                <input type="password" name="password" class="form_item_input" id = "password">
            <?php else: ?>
                <input type="password" name="password" class="form_item_input bad_input" id = "password">
                <span class="bad_input_text"><?php echo array_shift($errors)?></span>
            <?php endif;?>
        </div>

        <div class="form_item">
            <button type="submit" class="form_item_input submit" name="do_login">Log in</button>
        </div>
    </fieldset>
</form>
    <div class="hint">
        <span>Don`t have an account?</span>
        <a href="register.php"> Sign up </a>
    </div>

<?php
    include_once("navigation.php");
    include_once("footer.php");
?>
<?php
    include_once("header.php");

    $errors = array();
    $data = $_POST;

    $username = trim($data["username"]);
    $email = trim($data["email"]);

    $check_username = "SELECT * FROM user WHERE username = '$username'";
    $check_mail = "SELECT * FROM user WHERE email = '$email'";

    if(isset($data['do_signup'])) {
        if($username == '') {
            $errors['username'] = 'Enter an username';
        }
        else if ($mysql-> query($check_username)->rowCount() > 0) {
            $errors['username'] = 'This username has been used';
        }

        if($email == '') {
            $errors['email'] = 'Enter an email';
        }
        else if ($mysql-> query($check_mail)->rowCount() > 0) {
            $errors['email'] = 'This email has been used';
        }

        if(trim($data['password']) == '') {
            $errors['password'] = 'Enter a password';
        }

        if((trim($data['password_confirm']) != $data['password']) || trim($data['password_confirm']) == '') {
            $errors['confirm_password'] = 'Passwords don`t match';
        }
    }

    if (empty($errors) && $data) {
        try {
            $password = password_hash($data["password"], PASSWORD_DEFAULT);

            $stmt = $mysql->prepare( "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            header('Location: '.'login.php?message = You have been signed up');
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

?>

<form method="POST" action="" class="form">
    <fieldset>
        <legend>Sign up</legend>
        <div class="form_item">
            <label for="username">Username</label>
            <?php if (!isset($errors['username'])): ?>
                <input type="text" name="username" class="form_item_input" id = "username">
            <?php else: ?>
                <input type="text" name="username" class="form_item_input bad_input" id = "username">
                <span class="bad_input_text"><?php echo array_shift($errors)?></span>
            <?php endif;?>
        </div>
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
            <label for="password_confirm">Confirm password</label>
            <?php if (!isset($errors['confirm_password'])): ?>
                <input type="password" name="password_confirm" class="form_item_input" id = "password_confirm">
            <?php else: ?>
                <input type="password" name="password_confirm" class="form_item_input bad_input" id = "password_confirm">
                <span class="bad_input_text"><?php echo array_shift($errors)?></span>
            <?php endif;?>
        </div>
        <div class="form_item">
            <button type="submit" class="form_item_input submit" name="do_signup">Sign up</button>
        </div>
    </fieldset>
</form>
<div class="hint">
    <span>Already have an account?</span>
    <a href="login.php"> Sign in </a>
</div>

<?php
    include_once("navigation.php");
    include_once("footer.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    Login to your account:<br><br>
    <form method="post" action="">
        Username: <input type="text" name="username" placeholder="Username">
        <span><?php
                require 'connect.php';
                if (isset($_POST['login'])) {
                    if ($_POST['username'] == "") {
                        echo "*Please enter a username!";
                    } else {
                        $check_username = $_POST['username'];
                        $get_username = "select * from users where user_name = '$check_username'";
                        $result_username = $conn->query($get_username);
                        if ($result_username->num_rows == 0) {
                            echo "*Username not found!";
                        }
                    }
                }
                ?></span><br><br>
        Password: <input type="password" name="password" placeholder="Password">
        <span><?php
                require 'connect.php';
                if (isset($_POST['login'])) {
                    if ($_POST['password'] == "") {
                        echo "*Please enter a password!";
                    } else {
                        $check_password = $_POST['password'];
                        $row = $result_username->fetch_assoc();
                        if ($row == FALSE) {
                            echo "";
                        } else {
                            if ($check_password != $row['password']) {
                                echo "*Password is incorrect!";
                            }
                        }
                    }
                }
                ?></span><br><br>
        <p>New member? Click <a href='register.php'>here</a> to register.</p>
        <input type="submit" name="login" value="Login">
    </form><br>
    <?php
    require 'connect.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = "select * from users where user_name='$username'";
        if ($conn->query($login) == TRUE) {
            session_start();
            $_SESSION['username'] = $username;
            echo "You have successfully Login click <a href='music_page.php'>here</a> to return to home page.";
        }
    }
    ?>
</body>

</html>
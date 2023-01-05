<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Register your new account!</h1><br><br>
    <form method="post" action="">
        Username: <input type="text" name="username" placeholder="Username"><span><?php if (isset($_POST['register'])) {
                                                                                        if ($_POST['username'] == "") {
                                                                                            echo "*This field cannot be left blank!";
                                                                                        }
                                                                                    } ?></span><br><br>
        Password: <input type="password" name="password" placeholder="Password"><span><?php if (isset($_POST['register'])) {
                                                                                            if ($_POST['password'] == "") {
                                                                                                echo "*This field cannot be left blank!";
                                                                                            }
                                                                                        } ?></span><br><br>
        Re-password: <input type="password" name="repassword" placeholder="Re-password"><span><?php if (isset($_POST['register'])) {
                                                                                                    if ($_POST['repassword'] == "") {
                                                                                                        echo "*This field cannot be left blank!";
                                                                                                    } elseif ($_POST['repassword'] != $_POST['password']) {
                                                                                                        echo "*Re-password doesn't match!";
                                                                                                    }
                                                                                                } ?></span><br><br>
        Account Type: <select name="type">
            <?php
            require 'connect.php';
            $account_type = "select * from account_types where id!=1";
            $result = $conn->query($account_type);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['type'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>
        <p>Already have account? <a href='login.php'>Login!</a></p><br>
        <input type="submit" name="register" value="Register!">
    </form><br>
    <?php
    require 'connect.php';
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['repassword'];
        $type = $_REQUEST['type'];
        $create_new_account = "insert into users(user_name, password, account_type) values('$username','$password','$type')";
        if ($password2 == $password and $username == TRUE) {
            if ($conn->query($create_new_account) == FALSE) {
                echo "Username have been registered!";
            } else {
                echo "Your account have been created! <a href='login.php'>Login</a> now!";
            }
        }
        $conn->close();
    }
    ?>
</body>

</html>
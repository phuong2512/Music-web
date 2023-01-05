<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
    ?>
    <a href="manga_page.php">Manga page</a><br>
    <a href="music_page.php">Music page</a><br>
    <a href="movie_page.php">Movie page</a><br>
    <a href="login.php">LOGIN</a>
</body>

</html>
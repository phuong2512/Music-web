<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/Update_Delete_song.css" rel="stylesheet">
    <link href="CSS/Menu.css" rel="stylesheet">
    <link href="CSS/Footer.css " rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <title>Delete Song</title>
</head>

<body>
    <nav class="nav">
        <div class="nav-menu">
            <div class="icon">
                <a href="#" class="name-group">MKD Team</a>
            </div>
            <div>
                <ul class="menu-items">
                    <?php
                    session_start();
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        echo "<li class='menu-link'><a class='menu-option'>" . $_SESSION['username'] . "</a></li>";
                    }
                    ?>
                    <li class="menu-link"><a href="music_page.php" class="menu-option">Nghe nhạc</a></li>
                    <li class="menu-link"><a href="manga_page.html" class="menu-option">Đọc truyện</a></li>
                    <li class="menu-link"><a href="search.php" class="menu-option">Tìm kiếm</a></li>
                    <?php
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        $check_account = "SELECT * FROM users WHERE user_name = '" . $_SESSION['username'] . "'";
                        $check_account_type = $conn->query($check_account);
                        if ($check_account_type->num_rows > 0) {
                            while ($row = $check_account_type->fetch_assoc()) {
                                if ($row['account_type'] == 1 or $row['account_type'] == 3) {
                                    echo "<li class='menu-link'><a href='song_manage.php' class='menu-option'>Quản lý nhạc</a></li>";
                                    echo "<li class='menu-link'><a href='logout.php' class='menu-option'>Đăng xuất</a></li>";
                                } else {
                                    echo "<li class='menu-link'><a href='logout.php' class='menu-option'>Đăng xuất</a></li>";
                                }
                            }
                        }
                    } else {
                        echo "<li class='menu-link'><a href='login.php' class='menu-option'>Đăng nhập</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="social">
                <a href="#" class="fa fa-facebook icon-social"></a>
                <a href="#" class="fa fa-youtube icon-social"></a>
                <a href="#" class="fa fa-github icon-social"></a>
            </div>
        </div>
    </nav>
    <div class="delete-song">
        <h1 style='text-align: center'>Delete Song</h1>
        <hr style='border: 2px solid #3c2d57'>
        <h2>Are you sure want to delete the song below?</h2>
        <hr style='border: 1px solid #3c2d57'>
        <?php
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM songs WHERE id = '$id'";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
        ?>
                <form method="post">
                    <p id='input-form'><input type="hidden" name="id" readonly value='<?php echo $id; ?>'></p>
                    <p id='input-form'>Title: <?php echo $row['title']; ?></p>
                    <p id='input-form'>Artist: <?php echo $row['artist']; ?></p>
                    <p id='input-form'>Genre: <?php
                                                $genre_sql = "SELECT * FROM genres WHERE id = '" . $row['genre_id'] . "'";
                                                $genre_query = $conn->query($genre_sql);
                                                while ($genre_row = $genre_query->fetch_assoc()) {
                                                    echo $genre_row['genre'];
                                                }
                                                ?>
                    </p>
                    <p id='input-form'>National: <?php
                                                    $national_sql = "SELECT * FROM nationals WHERE id = '" . $row['national_id'] . "'";
                                                    $national_query = $conn->query($national_sql);
                                                    while ($national_row = $national_query->fetch_assoc()) {
                                                        echo $national_row['national'];
                                                    }
                                                    ?>
                    </p>
                    <p id='input-form'>Image: <?php echo "<img src='Images/song/" . $row['image'] . "' width='250px' height='250px'>"; ?></p>
                    <hr style='border: 2px solid #3c2d57'>
                    <p id="button"><input type="submit" name="delete" value="Delete"><button style='margin-left:10px'><a href='song_manage.php' style='color:black'>Cancel</a></button></p>
                </form>
        <?php
            }
        }
        $conn->close();
        ?>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="about-us">
                <h2>Về Nhóm</h2>
                <p class="content-abu"><b>Các thành viên tham gia dự án gồm:</b>
                    <br>Nguyễn Hoài Nam - 2121050849<br>
                    Trần Văn Phương - 2121050295
                </p>
                <hr>
                <ul class="social-icon">
                    <li><a href="" class="social ft"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="" class="social ft"><i class="fa fa-github"></i></a></li>
                    <li><a href="" class="social ft"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="links">
                <h2>Đường dẫn</h2>
                <ul class="link">
                    <li><a href="music_page.html" class="link-ft">Nghe nhạc</a></li><br>
                    <li><a href="" class="link-ft">Xem phim</a></li><br>
                    <li><a href="manga_page.html" class="link-ft">Đọc truyện</a></li><br>
                    <li><a href="" class="link-ft">Dịch vụ</a></li><br>
                </ul>
            </div>
            <div class="contact">
                <h2>Thông tin liên hệ</h2>
                <ul class="info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <p>Số 18 Phố Viên<br>
                            Đông Ngạc, Bắc Từ Liêm, Hà Nội<br>
                            Việt Nam</p>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <p><a href="#" class="contact-info">+84 962 382 512</a>
                            <br>
                            <a href="#" class="contact-info">+84 987 654 321</a>
                        </p>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <p><a href="#" class="contact-info">2121050295@student.humg.edu.vn</a><br>
                            <a href="#" class="contact-info">2121050849@student.humg.edu.vn</a><br>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="subscribe">
                <h2>Đăng ký email liên hệ</h2>
                <p>Vui lòng nhập email để nhận thông tin<br> cập nhật mới nhất:</p>
                <hr>
                <ul>
                    <li>
                        <form class="form">
                            <input type="email" class="form__field" placeholder="Subscribe Email" />
                            <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>
<?php
if (isset($_POST['delete'])) {
    require 'connect.php';
    $id = $_POST['id'];
    $delete_sql = "DELETE FROM songs WHERE id = '$id'";
    if ($conn->query($delete_sql) == TRUE) {
        header("location: song_manage.php");
    }
    $conn->close();
}
?>

</html>
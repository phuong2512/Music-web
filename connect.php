<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "music";

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
?>
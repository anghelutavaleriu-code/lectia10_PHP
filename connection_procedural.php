<?php
    require_once 'config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($conn, 'utf8mb4');

    if(mysqli_connect_errno()){
        die("Conexiunea a esuat: " . mysqli_connect_errno());
    }
?>
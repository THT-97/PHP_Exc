<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('DB', 'qlbansua');
    $conn= mysqli_connect(HOST, USER, '', DB);
    mysqli_set_charset($conn,  'UTF8');
?>


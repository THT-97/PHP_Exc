<?php
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    if($username=='abc' && $pass=='123') echo "Welcome $username";
    else echo "Incorrect username or password";
?>


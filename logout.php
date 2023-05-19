<?php 
    require "connection.php";
    session_start();

    $_SESSION['status'] = 'invalid';
    unset($_SESSION['username']);
    unset($_SESSION['access']);
    header("Location: index.html");

    mysqli_close($connection);
    session_destroy();
?>
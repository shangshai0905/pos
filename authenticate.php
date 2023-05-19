<?php 
    include "connection.php"; //to connect the database
    include "session.php";
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM employees WHERE e_user='$username'";

    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_array($result);  
    $count = mysqli_num_rows($result);  

    $_SESSION['username'] = $username;
    $_SESSION['user_role'] = $row['e_role'];
    $_SESSION['status'] = "valid";

          
        echo $count;
        header("Location: home.php");
    

?>
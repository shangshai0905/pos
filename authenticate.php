<?php 
    include "connection.php"; //to connect the database
    include "session.php";

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $sql = "SELECT * FROM employees WHERE e_user = '$username'";

        $result = mysqli_query($connection, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if ($count == 1) {
            $hashedPassword = $row['e_pass'];
    
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_role'] = $row['e_role'];
                $_SESSION['status'] = "valid";
    
                echo "<script> 
                        window.location.href='home.php'
                    </script>";
            } else {
                echo "<script> 
                        alert('Login Failed');
                        window.location.href='index.html'
                    </script>";
            }
        } else {
            echo "<script> 
                    alert('Login Failed');
                    window.location.href='index.html'
                </script>";
        }
    
    

?>
<?php 
    include "connection.php"; //to connect the database
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM employees WHERE e_pass='$password'";

    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<script> 
                    window.location.href='home.php'
                </script>"; 
        }  
        else{  
            echo "<script> 
                    alert('Login Failed');
                    window.location.href='index.html'
                </script>";
        }     

?>
<?php 
include "connection.php";
$name = $_POST['name'];
$user = $_POST['username'];
$pass = $_POST['password'];
      $sql = "INSERT into employees (e_name , e_user , e_pass  ) VALUES ( '$name' , '$user' , '$pass'  )";
      $result = mysqli_query($connection , $sql);
      if ($result == "TRUE")
      {
        echo  
        header("location:register.html");
    }
      else
      {
        echo "insert error";
      }
    
          
        
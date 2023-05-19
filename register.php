<?php 
include "connection.php";
  if(isset($_POST['submit']))
    {
      $name = trim(ucwords($_POST['name']));
      $username = trim(ucwords($_POST['username']));
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $user_role = $_POST['user_role'];
      

      $sql = "INSERT INTO employees SET e_name = '$name', e_user = '$username', e_pass = '$password', e_role = '$user_role'";

      //mysqli_query is procedural running the mysql statement
      $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);

      echo "<script> alert('Successfully Created') </script>";
      echo "<script> window.location.href = 'listofemployee.php' </script>";
    }
    else {
      echo "<script> window.location.href = 'listofemployee.php' </script>";
    }

?>

    
          
        
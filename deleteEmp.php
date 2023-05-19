<?php 
    require "connection.php" ;
    if (isset($_POST['delete']))
        {
            $id = $_POST['e_id'];
            $name = $_POST['name'];
            $sql = "DELETE FROM employees WHERE e_id = '$id'";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            echo "<script> 
            alert('$name is successfully deleted.');
            window.location.href='listofemployee.php'
                </script>";
        }
?>
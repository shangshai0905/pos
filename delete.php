<?php 
    require "connection.php" ;
    if (isset($_POST['delete']))
        {
            $name = $_POST['o_name'];
            $sql = "DELETE FROM orders WHERE (o_name = '$name')";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            echo "<script> 
                    window.location.href='home.php'
                </script>";
        }
?>

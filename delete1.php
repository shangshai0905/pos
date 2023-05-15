<?php 
    require "connection.php" ;
    
            $p_id = $_POST['prodid'];
            $i_id = $_POST['inventid'];
            $sql = "DELETE FROM inventory WHERE (i_id = '$i_id')";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            $sql1 = "DELETE FROM product WHERE (p_id = '$p_id')";
            $result1 = mysqli_query($connection, $sql1) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            echo "<script> 
                    window.location.href='deletemenu.php'
                </script>";
        
?>

<?php 
    require "connection.php" ;
    if (isset($_POST['delete']))
        {
            $id = $_POST['prodid'];
            $name = $_POST['name'];
            $sql = "DELETE product, inventory FROM product JOIN inventory ON product.p_id = inventory.p_id WHERE product.p_id = '$id'";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            echo "<script> 
            alert('$name is successfully deleted.');
            window.location.href='listofmenus.php'
                </script>";
        }
?>

<?php
include "connection.php";

if(isset($_GET['p_id']) && isset($_GET['quantity'])) {
    $p_id = $_GET['p_id'];
    $quantity = $_GET['quantity'];
    $sql = "UPDATE orders SET o_quantity='$quantity' WHERE p_id='$p_id'";
    $result = mysqli_query($connection, $sql);
}
?>

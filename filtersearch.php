<?php 
    require "connection.php";
    $column = "p_category";
    $sort = "ASC";


    if(isset($_GET['column']) && isset($_GET['sort'])){
        $column = $_GET['column'];
        $sort = $_GET['sort'];
        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }
    
    $sql = "SELECT product.p_name, product.p_category,inventory.* FROM product RIGHT JOIN inventory 
    ON product.p_id = inventory.p_id ORDER BY $column $sort";

    // $newsql = $sql . "ORDER BY" . $column . $sort;
    $result = mysqli_query($connection,$sql) or 
    trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

?>
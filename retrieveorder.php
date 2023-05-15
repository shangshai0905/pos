<?php 
    require "connection.php";
    $column = "o_id";
    $sort = "ASC";
    $date_from = date('Y-m-d');
    $date_to = date('Y-m-d'); 

    if(isset($_GET['column']) && isset($_GET['sort'])){
        $column = $_GET['column'];
        $sort = $_GET['sort'];
        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }
    // $sql = "SELECT * FROM orders ORDER BY $column $sort";
    $sql = "SELECT * FROM orders WHERE date_created BETWEEN $date_from AND $date_to ORDER BY $column $sort";
    // $newsql = $sql . "ORDER BY" . $column . $sort;
    $result = mysqli_query($connection,$sql) or 
    trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

    
?>
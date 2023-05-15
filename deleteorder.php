<?php 
    require "connection.php";
    // echo "Result: " . $_POST['email'];
    if(isset($_POST['delete'])){
        $o_id = $_POST['o_id'];
        $sql = "SELECT * FROM orders WHERE o_id = '$o_id'";
        $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL:" . mysqli_error($connection),E_USER_ERROR);
        $row = mysqli_fetch_array($result);
    }
    // var_dump( $row);
    if(isset($_POST['delete'])){
      
        $o_id = $_POST['o_id'];

        $sql = "DELETE FROM orders WHERE o_id = '$o_id'";
        $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL:" . mysqli_error($connection),E_USER_ERROR);
        echo "<script>
        alert('Deleted Successfully ');
        window.location.href = 'reports.php';
        </script>";


    }
?>

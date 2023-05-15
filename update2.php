<?php
 include "connection.php";
    // include "retrieveorder.php";
    error_reporting(0);  // for no report on undifined array or variable\
     $date = date("Y/m/d");
    $p_id = $_POST['pid'];
     $p_name =$_POST['name'];
     $price = $_POST['price'];
     $categ = $_POST['category'];
     $quant = $_POST['quantity'];

$sql = "SELECT * FROM inventory WHERE p_id = '$p_id'";
$result = mysqli_query($connection,$sql);
if ($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
     $row['quantity'];
   $totalquant = $row['quantity'] + $quant;
  $sql1 ="UPDATE inventory SET quantity = '$totalquant' , date_updated = '$date' WHERE p_id = '$p_id'";
  $result1 = mysqli_query($connection, $sql1);
   if ($result1 == "TRUE")
   {
    
    echo "
        <script>
            Swal.fire({
                title: 'Hello!',
                text: 'This is a Sweet Alert message!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
        ";
        echo header("location:updatemenu.php");

   }
   else
   {
     echo "Error";
  }
}
else
{
    echo "error selecting inventory";
}
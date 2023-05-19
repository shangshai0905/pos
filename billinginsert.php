<?php 
include "connection.php";
$name = $_POST['p_name'];
$price = $_POST['p_price'];
$p_id = $_POST['p_id'];
$o_quant = $_POST['quantity'];

  $sql4 = "SELECT * FROM inventory WHERE p_id = '$p_id'";
  $result4 = mysqli_query($connection , $sql4);
  if ($result4-> num_rows > 0)
  { 
    $row4 = $result4->fetch_assoc();
    if ($o_quant > $row4['quantity'])
      {
        ?>
          <script> 
            alert('Not Enough Inventory for <?php echo $name ;?>, The Available Quantity is <?php echo $row4['quantity']?>');
            window.location.href= "home.php";
          </script>
        <?php
      } 
    else
    {
      $sql = "SELECT * FROM orders where p_id = '$p_id'";
    
        $result = mysqli_query($connection, $sql);
        if ($result -> num_rows >0)
        {
          while ($row = $result ->fetch_assoc())
          {
            if($row['p_id'] == $p_id)
              {
                $row ['o_quantity'];
                $updatequant = $o_quant + $row['o_quantity'];
                $sql2 ="UPDATE orders SET o_quantity = '$updatequant'";
                $result2 = mysqli_query($connection, $sql2);
                if ($result2 == "TRUE")
                  {
                    ?>
                    <script> 
                  alert('Successfully added <?php echo $name ;?> in the billing.');
                      window.location.href= "home.php";
                    </script>
                      <?php
                      }
                else
                  {
                    echo "error update";
                  }
              }
            else
              {
                echo "error";
              }
          }
        }
        else
          {
            $sql1 = "INSERT into orders (o_name , p_id , o_price, o_quantity  ) VALUES ( '$name' , '$p_id' , '$price' , '$o_quant' )";
            $result1 = mysqli_query($connection , $sql1);
            if ($result1 == "TRUE")
              {
                ?>
                <script> 
                  alert('Successfully added <?php echo $name ;?> in the billing.');
                  window.location.href= "home.php";
                </script>
                  <?php
          }
            else
              {
                echo "insert error";
              }
          }
    }
  }
else
  {
    echo "error Selecting inventory";
  }
          
        
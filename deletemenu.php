<?php
include "connection.php";
// include "retrieveorder.php";
include "filtersearch.php";
error_reporting(0);  // for no report on undifined array or variable
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/delete.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Delete Menu</title>
</head>

<body>

    <div class="home">
        <a href="home.php">Home</a>
    </div>
    <main class="table">
        <section class="table__header">
            <h1 class="text-center">Delete Menu</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    
                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($connection, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['p_id'];
                            $sql1 = "SELECT * FROM inventory WHERE p_id = '$id'";
                            $result1 = mysqli_query($connection, $sql1);
                            if ($result1->num_rows > 0) {
                                $row1 = $result1->fetch_assoc();
                    ?>
                                <tr>
                                    <form action="delete1.php" method="post">
    
    
                                        <td >
                                            <?php echo $row['p_name']; ?>
                                            <input type="text" name="inventid" value="<?php echo $row1['i_id']; ?>" hidden >
                                            <input type="text" name="prodid" value="<?php echo $row['p_id']; ?>" hidden>
                                        </td>
                                        <td><?php echo $row1['quantity']; ?></td>
                                        <td><?php echo "P" . $row['p_price']; ?></td>
                                        <td><button class="btn btn-danger" onclick="return confirm('DELETE?')">Delete Menu</button></td>

                                </tr>
                                </form>
    
                    <?php
    
                            } else {
                                echo "error selecting inventory";
                            }
                        }
                    } else {
                        echo "error Selecting Products";
                    }
    
                    ?>
                </tbody>
            </table>
        </section>
    </main>


<!-- <div class="table-responsive col-lg-12">

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>

        <?php 
     
            $sql = "SELECT * FROM product";
            $result = mysqli_query($connection,$sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc())
                { 
                    $id = $row['p_id'];
                    $sql1 = "SELECT * FROM inventory WHERE p_id = '$id'";
                     $result1 = mysqli_query($connection , $sql1);
                     if($result1->num_rows > 0){
                         $row1 = $result1->fetch_assoc();
                         ?>
                         <tr><form action="delete1.php" method="post">
                        
                         
                         <td><?php echo $row['p_name'];?> <input type="text" name="inventid" value="<?php echo $row1['i_id'];?>" hidden><input type="text" name="prodid" value="<?php echo $row['p_id'];?>" hidden></td>
                             <td><?php echo $row1['quantity'];?></td>
                             <td><?php echo "P". $row['p_price'];?></td>
                             <td><button>Delete Menu</button>
                            
                         </tr></form>
                        
                     <?php 

                 }
                 else
                 {
                 echo "error selecting inventory";
                 }
            }
        }
        else
        {
             echo "error Selecting Products";   
        }
   
    ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-start"> 
            </td>
        </tr>
        </tbody>
    </table> -->

</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
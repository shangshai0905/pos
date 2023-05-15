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
    <link rel="stylesheet" href="css/wallet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Reports</title>
</head>
<body>

    <div class="home">
        <a href="home.php" >Home</a>
    </div>
    
    
    <main class="table">
        <section class="table__header">
            <h1 class="text-center">Wallet</h1>
        </section>
        <div class="card-body">
            <form action="" method="GET" class="mx-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input type="date" name="from_date" class="form-control" value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date'];}?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input type="date" name="to_date" class="form-control" value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date'];}?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Click to filter</label><br>
                            <button type="submit" class="submit">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sales Date</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
            $date = date('Y/m/d');
            if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];

                $sql = "SELECT * FROM sales WHERE salesdate BETWEEN '$from_date' AND '$to_date' ";
                $result = mysqli_query($connection,$sql) or 
                trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                if(mysqli_num_rows($result) > 0){
                    foreach($result as $row){
                        $id = $row['p_id'];
                        $sql1 = "SELECT p_name FROM product WHERE p_id = '$id'";
                        $result1 = mysqli_query($connection , $sql1);
                        if($result1->num_rows > 0){
                            $row1 = $result1->fetch_assoc();
                            ?>
                            
                            <tr>    
                            <td><?php echo $row1['p_name'];?></td>
                                <td><?php echo $row['quantity'];?></td>
                                <td><?php echo "P". $row['price'];?></td>
                                <td><?php echo $row['salesdate'];?></td>
                                <td class="center"><?php echo $total = $row['quantity'] * $row['price'];?></td>
                            </tr>
                            
                        <?php 
                    
                    } $totalprice = $totalprice + $total;
                }
            }
            }
            else
            {
                $sql = "SELECT * FROM sales WHERE salesdate = '$date' ";
                $result = mysqli_query($connection,$sql) or 
                trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                if(mysqli_num_rows($result) > 0){
                    foreach($result as $row1){
                    $id = $row1['p_id'];
                        $sql1 = "SELECT p_name FROM product WHERE p_id = '$id'";
                        $result1 = mysqli_query($connection , $sql1);
                        if($result1->num_rows > 0){
                            $row1 = $result1->fetch_assoc();
                            ?>
                            <tr>    
                                <td><?php echo $row1['p_name'];?></td>
                                <td><?php echo $row['quantity'];?></td>
                                <td><?php echo "P". $row['price'];?></td>
                                <td><?php echo $row['salesdate'];?></td>
                                <td class="text-end"><?php echo $total = $row['quantity'] * $row['price'];?></td>
                            </tr>
                            
                        <?php 
                        
                    }
                    $totalprice = $totalprice + $total;
                    }
                }
                }
                ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> 
                            <?php 
                                echo "The total is "."P".$totalprice."<br>";
                             ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </body>
        </html>
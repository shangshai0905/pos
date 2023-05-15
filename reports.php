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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Reports</title>
</head>
<body>

    <div class="container">
        <a href="home.php" class="btn btn-dark mt-2" >Back</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header" style="background-color: rgb(245, 118, 118);">
                        <div style="color:white; font-weight:bold;">Filter Data From</div>
                    </div>
                    <div class="card-body">
                        <form action="reports.php" method="GET">
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
                                        <button type="submit" style="background-color: rgb(245, 118, 118);color:white;border:none; border-radius:3px;" class="py-1 px-2">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 

    <div class="table-responsive col-lg-12">

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Order Name</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $date = date('Y/m/d');
            if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];

                $sql = "SELECT * FROM orders WHERE date_created BETWEEN '$from_date' AND '$to_date' ";
                $result = mysqli_query($connection,$sql) or 
                trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                if(mysqli_num_rows($result) > 0){
                    foreach($result as $row){
                        // echo $row('o_name');
                            ?>
                            <tr>    
                                <td><?php echo $row['o_name']?></td>
                                <td><?php echo $row['p_id']?></td>
                                <td><?php echo "P". $row['o_price']?></td>
                                <td><?php echo $row['o_quantity']?></td>
                                <td><?php echo $row['date_created']?></td>
                                <td><?php echo $row['date_updated']?></td>
                                <td>
                                    <?php 
                                       $sql = "SELECT o_quantity ,o_price FROM orders";
                                       $data = array();
                                       $totalprice = 0;
                                       $quantity = $row['o_quantity'];
                                       $price = $row['o_price'];
                                       $result = mysqli_query($connection,$sql) or 
                                       trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);
                                        while($row = $result->fetch_assoc()) {
                                            $totalprice = $quantity * $price;
                                        }
                                        echo "P" . $totalprice;
                                    ?>
                                </td>
                            </tr>
                            
                        <?php 
                    }
                }else{
                    echo "<p style='color:red;'>" . "No Record Found" . "</p>";
                }
            }
            else
            {
                $sql = "SELECT * FROM orders WHERE date_created BETWEEN '$from_date' AND '$to_date' ";
                $result = mysqli_query($connection,$sql) or 
                trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);

                if(mysqli_num_rows($result) > 0){
                    foreach($result as $row){
                        // echo $row('o_name');
                            ?>
                            <tr>    
                                <td><?php echo $row['o_name']?></td>
                                <td><?php echo $row['p_id']?></td>
                                <td><?php echo "P". $row['o_price']?></td>
                                <td><?php echo $row['o_quantity']?></td>
                                <td><?php echo $row['date_created']?></td>
                                <td><?php echo $row['date_updated']?></td>
                                <td>
                                    <?php 
                                       $sql = "SELECT o_quantity ,o_price FROM orders";
                                       $data = array();
                                       $totalprice = 0;
                                       $quantity = $row['o_quantity'];
                                       $price = $row['o_price'];
                                       $result = mysqli_query($connection,$sql) or 
                                       trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);
                                        while($row = $result->fetch_assoc()) {
                                            $totalprice = $quantity * $price;
                                        }
                                        echo "P" . $totalprice;
                                    ?>
                                </td>
                            </tr>
                            
                        <?php 
                    }
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
                    <?php 
                        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                            $from_date = $_GET['from_date'];
                            $to_date = $_GET['to_date'];
                            $sql = "SELECT o_quantity, o_price FROM orders WHERE date_created 
                            BETWEEN '$from_date' AND '$to_date'";
                    
                            $result = mysqli_query($connection,$sql) or 
                            trigger_error("Failed SQL". mysqli_error($connection),E_USER_ERROR);
                            $data = array();
                            while ($row = mysqli_fetch_array($result)){
                                $data[] = $row;
                            }
                            $total = 0;
                            foreach($data as $row){
                                $total +=  $row['o_quantity'] * $row['o_price'];
                            }
                            echo "The total is " ."P".$total;   
                        }
                    }?>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
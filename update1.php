<?php 
    include "connection.php";   
    
    if (isset($_POST['update']))
        {
            $p_id = $_POST['p_id'];
            $sql = "SELECT * FROM product WHERE p_id = '$p_id'";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            $row = mysqli_fetch_assoc($result);

        }
    if(isset($_POST['updatebtn']))
        {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $p_id = $_POST['pid'];

            $sql = "SELECT * FROM inventory WHERE p_id = '$p_id'";
            $result = mysqli_query($connection,$sql);
            if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $row['quantity'];
                    $totalquant = $row['quantity'] + $quantity;
                    $sql1 ="UPDATE product INNER JOIN inventory ON product.p_id = inventory.p_id
                    SET product.p_category = '$category', product.p_price= '$price', inventory.quantity = '$totalquant'
                    WHERE inventory.i_id = $p_id;";
                    $result1 = mysqli_query($connection, $sql1);

                    echo "<script> 
                    alert('$name is successfully updated!')
                    </script>";
                    echo "<script> 
                            window.location.href='listofmenus.php'
                        </script>";

                }                            


        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addmenu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="settings">
        <a href="listofmenus.php" >List of Menus</a>
    </div>

    <div class="body" >
        <div class="wrapper">
            <div class="form-wrapper sign-in">
                <form action="update1.php" method="post">
                    <h2>Update Menu</h2>
                    <div class="sm-3 mb-3">
                      <label for="" class="form-label">Menu Name</label>
                      <input type="text" name="pid" value="<?php echo $row['p_id'];?>" hidden>
                      <input type="text" name="name" class="form-control" value="<?php echo  $row['p_name'];?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Category</label>
                      <select name="category" id="category" class="form-select">
                            <option value="A.S.A Best" <?php echo $row['p_category'] == "A.S.A Best" ? "selected": "" ?>>A.S.A Best</option>
                            <option value="Seafood" <?php echo $row['p_category'] == "Seafood" ? "selected": "" ?>>Seafood</option>
                            <option value="Chicken" <?php echo $row['p_category'] == "Chicken" ? "selected": "" ?>>Chicken</option>
                            <option value="Merienda" <?php echo $row['p_category'] == "Merienda" ? "selected": "" ?>>Merienda</option>
                            <option value="Silog" <?php echo $row['p_category'] == "Silog" ? "selected": "" ?>>Silog</option>
                            <option value="Beef" <?php echo $row['p_category'] == "Beef" ? "selected": "" ?>>Beef</option>
                            <option value="Drinks" <?php echo $row['p_category'] == "Drinks" ? "selected": "" ?>>Drinks</option>
                            <option value="Rice" <?php echo $row['p_category'] == "Rice" ? "selected": "" ?>>Rice</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Enter additional quantity.">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo  $row['p_price'];?>">
                    </div>

                    <button type="submit" name="updatebtn" id="updatebtn">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
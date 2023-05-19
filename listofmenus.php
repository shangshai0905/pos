<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Menus</title>
    <link rel="stylesheet" href="css/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="home">
        <a href="home.php">Home</a>
    </div>
    <main class="table">
        <section class="table__header">
            <h1 class="text-center">List of Menus</h1>
        </section>
                <form action="uploadmenu.html" method="post" class="d-flex justify-content-center">
                    <button class="btn btn-dark mb-2">Add Menu</button>
                    <input type="text" name="p_id" value ="<?php echo $id ?>" hidden>
                </form>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'connection.php'; 
                    $sql = "SELECT product.p_id, inventory.i_id, product.p_name, product.p_category, product.p_price, inventory.quantity FROM product 
                    RIGHT JOIN inventory ON product.p_id = inventory.p_id ORDER BY product.p_category ASC;
                    ";
                    $result = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_array($result))   
                    {                        
                            ?>          
                               
                                <tr>
                                    <td>
                                        <?php echo $row['p_name']; ?> <input type="text" name="i_id" value ="<?php echo $row['i_id']?>" hidden>
                                        <input type="text" name="p_id" value ="<?php echo $id ?>" hidden>
                                    </td>
                                    <td>
                                        <?php echo $row['p_category']; ?> 
                                    </td>

                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo "P" . $row['p_price']; ?>
                                    </td>
                                    <td class="d-flex gap-3 justify-content-center">
                                        <form action="update1.php" method="post">
                                            <button class="btn btn-dark" name="update" id="update" type="submit">Update</button>
                                            <input type="hidden" name="p_id" id="p_id" value ="<?php echo $row['p_id']?>">
                                        </form>
                                        <form action="delete.php" method="post">
                                            <button class="btn btn-dark" name="delete" onclick="return confirm('Are you sure you want to delete <?php echo $row['p_name']; ?>?')">Delete</button>
                                            <input type="text" name="name" value="<?php echo $row['p_name']; ?>" hidden >
                                            <input type="text" name="prodid" value="<?php echo $row['p_id']; ?>" hidden>

                                        </form>

                                    </td>
                                    
                                </tr>
                                <?php
                    }
            ?>
                </tbody>
            </table>
        </section>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
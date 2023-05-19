<?php 
    include "connection.php";
    include "filtersearch.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventory.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Reports</title>
</head>

<body>
    <div class="inventory">
        <a href="home.php">Home</a>
    </div>
    <main class="table">
        <section class="table__header">
            <h1 class="text-center">Inventory</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>
                            <a href="?column=p_name&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" data-toggle="tooltip" title="Click to ASC/DESC">
                                Product Name
                            </a>
                        </th>
                        <th>
                            <a href="?column=p_category&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" class="sort" data-toggle="tooltip" title="Click to ASC/DESC">
                            Category Name
                            </a>
                        </th>
                        <th>
                            <a href="?column=quantity&sort=<?php echo $sort ?>" style="text-decoration:none; color:black; font-size:large" class="sort" data-toggle="tooltip" title="Click to ASC/DESC">
                            Quantity
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php   while ($row = mysqli_fetch_array($result)) 
                    {?>
                    <tr>    
                        <td><?php echo $row['p_name']?></td>
                        <td><?php echo $row['p_category']?></td>
                        <td><?php echo $row['quantity']?></td>
                    </tr>  
                        <?php };?>
                </tbody>
              
            </table>
        </section>
    </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
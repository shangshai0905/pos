<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees</title>
    <link rel="stylesheet" href="css/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="home">
        <a href="home.php">Home</a>
    </div>
    <main class="table">
        <section class="table__header">
            <h1 class="text-center">List of Employees</h1>
        </section>
                <form action="register.html" method="post" class="d-flex justify-content-center">
                    <button class="btn btn-dark mb-2">Add Employee</button>
                </form>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'connection.php'; 
                    $sql = "SELECT * FROM employees ORDER BY e_id ASC;
                    ";
                    $result = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_array($result))   
                    {                        
                            ?>          
                               
                                <tr>
                                    <td>
                                        <?php echo $row['e_name']; ?> <input type="text" name="e_id" value ="<?php echo $row['e_id']?>" hidden>
                                        <input type="text" name="e_id" value ="<?php echo $row['e_id'] ?>" hidden>
                                    </td>
                                    <td>
                                        <?php echo $row['e_user']; ?> 
                                    </td>

                                    <td style="word-break: break-all;">
                                        <?php echo $row['e_pass']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['e_role']; ?>
                                    </td>
                                    <td class="d-flex gap-3 justify-content-center">
                                        <form action="updateEmp.php" method="post">
                                            <button class="btn btn-dark" name="update" id="update" type="submit">Update</button>
                                            <input type="hidden" name="e_id" id="e_id" value ="<?php echo $row['e_id']?>">
                                        </form>
                                        <form action="deleteEmp.php" method="post">
                                            <button class="btn btn-dark" name="delete" onclick="return confirm('Are you sure you want to delete <?php echo $row['e_name']; ?>?')">Delete</button>
                                            <input type="text" name="name" value="<?php echo $row['e_name']; ?>" hidden >
                                            <input type="text" name="e_id" value="<?php echo $row['e_id']; ?>" hidden>

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
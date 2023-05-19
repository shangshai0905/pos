<?php 
    include "connection.php";   
    
    if (isset($_POST['update']))
        {
            $e_id = $_POST['e_id'];
            $sql = "SELECT * FROM employees WHERE e_id = '$e_id'";
            $result = mysqli_query($connection, $sql) OR trigger_error("Field sql" .mysqli_error($connection), E_USER_ERROR);
            $row = mysqli_fetch_assoc($result);

        }
    if(isset($_POST['updatebtn']))
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_role = $_POST['user_role'];
            $e_id = $_POST['e_id'];

            $sql1 ="UPDATE employees SET e_pass = '$password', e_role = '$user_role' WHERE e_id = $e_id;";
                $result1 = mysqli_query($connection, $sql1);

                echo "<script> 
                    alert('$name is successfully updated!')
                    </script>";
                echo "<script> 
                    window.location.href='listofemployee.php'
                    </script>";

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
    <title>Update Employee</title>
</head>
<body>
    <div class="settings">
        <a href="listofemployee.php" >List of Employees</a>
    </div>

    <div class="body" >
        <div class="wrapper">
                <div class="form-wrapper sign-in">
                    <form action="updateEmp.php" method="post" enctype="multipart/form-data">
                        <h2>Update</h2>
                        <div class="sm-3 mb-2">
                            <label for="" class="form-label">Employee Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['e_name'] ?>" readonly>
                            <input type="hidden" name="e_id" class="form-control" value="<?php echo $row['e_id'] ?>">

                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $row['e_user'] ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $row['e_pass'] ?>">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Employee Role</label>
                            <select class="form-control mt-3" name="user_role" id="user_role">
                                <option value="Cashier" <?php echo $row['e_role'] == "Cashier" ? "selected": "" ?>>Cashier</option>
                                <option value="Admin" <?php echo $row['e_role'] == "Admin" ? "selected": "" ?>>Admin</option>
                            </select>
                        </div>
                
                        <button class="mt-3" type="submit" name="updatebtn">Update</button>
                    </form>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
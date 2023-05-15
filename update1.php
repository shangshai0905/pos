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
<?php 
    include "connection.php";
    // include "retrieveorder.php";
    include "filtersearch.php";
    error_reporting(0);  // for no report on undifined array or variable
    $i_id = $_POST['i_id'];
    $p_id = $_POST['p_id'];
   
    
    $sql = "SELECT * FROM product WHERE p_id = '$p_id'";
    $result = mysqli_query($connection , $sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
       

?>

    <div class="settings">
        <a href="home.php" >Home</a>
    </div>

    <div class="body" >
        <div class="wrapper">
            <div class="form-wrapper sign-in">
                <form action="update2.php" method="post" enctype="multipart/form-data">
                    <h2>Update Menu</h2>
                    <div class="sm-3">
                      <label for="" class="form-label">Menu Name</label>
                      <input type="text" name="pid" value="<?php echo $row['p_id'];?>" hidden>
                      <input type="text" name="name" class="form-control" value="<?php echo  $row['p_name'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control">
                    </div>
                    <button type="submit" >Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php 
} ?>
    <!-- <div class="body">
        <div class="wrapper">
            <div class="form-wrapper sign-in">
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <div class="input-group">
                        <input type="text" name="name" >
                        <label for="">Employee Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="username" >
                        <label for="">Username</label>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" >
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="submit">Register</button>
                    <div class="signUp-link">
                        <p>Try your account here <a href="index.html" class="signUpBtn-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
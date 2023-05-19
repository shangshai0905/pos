<?php 
// Include the database configuration file  
include 'connection.php'; 
 
// If file upload form is submitted 
$date = date("Y/m/d");
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sql = "INSERT into product (p_name , p_photo, p_category , p_price  ) VALUES ( '$name' , '$imgContent' , '$category' ,'$price' )"; 
 
            $insert = mysqli_query($connection, $sql);
             
            if($insert){
                $sql1 = "SELECT * FROM product ORDER BY p_id DESC LIMIT 1";
                $result = mysqli_query($connection , $sql1);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    { 
                            $p_id = $row['p_id'];
                            $sql2 = "INSERT into inventory (p_id , quantity , date_entered , date_updated) VALUES ('$p_id' , '$quantity' , '$date' , '$date')";
                            $result1 = mysqli_query($connection , $sql2);
                    }
                }
               $status = 'success'; 
               echo "<script> 
               alert('$name is successfully added.');
               window.location.href='listofmenus.php'
                   </script>";
   
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 ?>
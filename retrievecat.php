 <?php 
                // Include the database configuration file  
                include 'connection.php'; 
 
                // Get image data from database 
                $sql = "SELECT c_name,c_photo FROM category"; 
                $result = mysqli_query($connection, $sql);
                ?>

                <?php if($result->num_rows > 0){ ?> 
          
                      <?php while($row = $result->fetch_assoc()){ ?> 
                 <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['c_photo']); ?>" /> 
                        <?php } ?> 
                <?php }else{ ?> 
                  <p class="status error">Image(s) not found...</p> 
                <?php } ?>
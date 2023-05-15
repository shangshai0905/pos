<?php 
                // Include the database configuration file  
                include 'connection.php'; 
 
                // Get image data from database 
                $sql = "SELECT * FROM product"; 
                $result = mysqli_query($connection, $sql);
                ?>

                <?php if($result->num_rows > 0){ ?> 
          
                      <?php while($row = $result->fetch_assoc()){ ?> 
                    <input type="text" value='<?php echo $row['p_id'] ?>'><br/>    
                 <img width="150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['p_photo']); ?>" /> <br/>
                    <input type="text" value='<?php echo $row['p_price'] ?>'>
                        <?php } ?> 
                <?php }else{ ?> 
                  <p class="status error">Image(s) not found...</p> 
                <?php } ?>
<?php include 'inc/header.php'; ?>
<?php 
    if (!isset($_GET['mealid'])) {
        echo "<script>window.location='index.php';</script>";
        //header("Location:catlist.php");
    }else{
        $mealid = $_GET['mealid'];
    }

 ?>

<div class="grid_10">
		
            <div class="box round first grid">
              
               <div class="block copyblock"> 

               <?php 
         if ($_SERVER['REQUEST_METHOD']=='POST') {  
            $meal = $_POST['meal'];      
            $meal =  mysqli_real_escape_string($db->link,$meal);
         
           if($meal>=0 && $meal <= 1){
            
             $query = "UPDATE meal_hesab
                SET
                meal_count = '$meal'
                WHERE id = '$mealid'";
                $updated_row = $db->update($query);
                if($updated_row){
                    echo "<script>window.location='index.php';</script>";
                }   else {
                    echo "<center><span style='color:red;font-size:40px;'>Field not Updated !!.</span></center>";
                }
           } else{
               echo "<center><span style='color:red;font-size:40px;'>Please Enter 0 or 1 !!.</span></center>";
           }
        }
            ?>

            <?php 
            $query = "select * from meal_hesab where id='$mealid'";
            $category = $db->select($query);
            if($category){
            while ($result = $category->fetch_assoc()) {
        ?>





<div class="container">
  <h2>Update your meal</h2>
  <form action="" method="post">
    <div class="form-group">
       <input type="text" name="time" class="form-control" value="<?php  echo $result['time']; ?>" class="medium" />
    </div>
    <div class="form-group">
      <input type="number" name="meal" class="form-control" value="<?php  echo $result['meal_count']; ?>" class="medium" />
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

        		<!--
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="time" value="<?php  echo $result['time']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="number" name="meal" value="<?php  echo $result['meal_count']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
			-->


                <?php } } ?>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php'; ?>
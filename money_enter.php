<?php include 'inc/header.php';?>



<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {  
              
            $money =  mysqli_real_escape_string($db->link,$_POST['money']);
    
    if ($money == "") {
               echo "<center><span style='color:red;font-size:40px;'>Field must not be empty !!.</span></center>";
    } else{
    $sess=Session::get('userId');
    $query = "INSERT INTO money_given(user_money_id,money) VALUES('$sess','$money')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<center><span style='color:red;font-size:40px;'>Data Inserted !!.</span></center>";
     header("location:index.php");
    }else {
     echo "<center><span style='color:red;font-size:40px;'>Data not Inserted !!.</span></center>";
    }
}
}
 ?>

<div class="container">
  <h2>Please enter the amount of money you spent today</h2>
  <form action="" method="post">
    <div class="form-group">
      <input name="money" type="number" class="form-control" id="email" placeholder="Enter the money amount here" style="width:400px">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<?php include 'inc/footer.php';?>
<?php include 'inc/header.php'; ?>


 <div class="container">
  


  <center><h1>Members meal calculation</h1></center>
  <table class="table table-bordered">
    <thead>
      <tr>

<?php 
			$eshat = 0;
			$majhar = 0;
			$rumman = 0;
			$jahid = 0;
			$shohon = 0;
			$faisal = 0;
			$meal_rate = 0;
			$total_taka = 0;
			$sess=Session::get('userId');
			$j=0;
			$x=0;
			$y=0;
			$z=0;
			$w=0;
			$f=0;
			$sum=0;
			$money_eshat=array();
			$money_majhar=array();
			$money_rumman=array();
			$money_jahid=array();
			$money_shohon=array();
			$money_faisal=array();
			$query = "SELECT * FROM meal_hesab";
			$post = $db->select($query); 
			if ($post) {
			$i=1;
			while ($result = $post->fetch_assoc()) {
			
		 ?>
		
		 <?php if($i==1) { ?>
				

		  <tr>
        <th>Date</th>
        <th>Eshat</th>
        <th></th>
        <th>Majhar</th>
        <th></th>
        <th>Rumman</th>
        <th></th>
        <th>Jahid</th>
        <th></th>
        <th>Shohon</th>
        <th></th>
        <th>Faisal</th>

       

      </tr>

		  <?php  } ?>

		<?php 
			if($result['userid']==1 && $result['meal_count']!=0){
				$eshat++;
			}
			elseif($result['userid']==2 && $result['meal_count']!=0){
				$majhar++;
			}
			elseif($result['userid']==3 && $result['meal_count']!=0){
				$rumman++;
			}
			elseif($result['userid']==4 && $result['meal_count']!=0){
				$jahid++;
			}
			elseif($result['userid']==5 && $result['meal_count']!=0){
				$shohon++;
			}
			elseif($result['userid']==6 && $result['meal_count']!=0){
				$faisal++;
			}
		 ?>
	
	<?php if($i<=275){ ?>
	
        <td><?php if(($i%5==1)){ echo $fm->formatDate($result['time']);echo " ";}  ; ?></td>
        <td><?php echo $result['meal_count']; ?> <?php if($sess==($result['userid'])){ ?> &nbsp;&nbsp;&nbsp;&nbsp; <a href="meal_enter.php?mealid=<?php echo $result['id']; ?>">(Edit)</a> <?php }  ; ?> </td>
        
      	



<?php $i++; if(($i%5==1)){echo "</tr>"; } 

}else{ ?>

 <td><?php if(($i%6==0)){ echo $fm->formatDate($result['time']);echo " ";}  ; ?></td>
        <td><?php echo $result['meal_count']; ?> <?php if($sess==($result['userid'])){ ?> &nbsp;&nbsp;&nbsp;&nbsp; <a href="meal_enter.php?mealid=<?php echo $result['id']; ?>">(Edit)</a> <?php }  ; ?> </td>
        
      	



<?php $i++; if(($i%6==0)){echo "</tr>"; } 

 }

 }?>
 

	<tr>
        <th>Total</th>
        <th><?php echo $eshat; ?></th>
        <th></th>
        <th><?php echo $majhar; ?></th>
        <th></th>
        <th><?php echo $rumman; ?></th>
        <th></th>
        <th><?php echo $jahid; ?></th>
        <th></th>
        <th><?php echo $shohon; ?></th>
        <th></th>
        <th><?php echo $faisal = $faisal+5; ?></th>
       

      </tr>

 <?php }; ?>


    </thead>
  </table>




</div> 

  <center><h1>Money spent by the members</h1></center>
  <center><h4><a href="money_enter.php">CLICK HERE </a>to add the amount of money you spent today</h4></center>


<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Members</th>
        <th>Money</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

    	<?php 
			$query = "SELECT * FROM money_given";
			$post = $db->select($query); 
			$post2 = $db->select($query); 
			if($post2)
			{
					while ($result = $post2->fetch_assoc()) {
						if($result['user_money_id']==1){
        		
        		
        		$money_eshat[$x]=$result['money'];
        		$x++;
        	}
						elseif($result['user_money_id']==2){
        		
        		
        		$money_majhar[$y]=$result['money'];
        		$y++;
        	}
						elseif($result['user_money_id']==3){
        		
        		
        		$money_rumman[$z]=$result['money'];
        		$z++;
        	}
						elseif($result['user_money_id']==4){
        		
        		
        		$money_jahid[$j]=$result['money'];
        		$j++;
        	}elseif($result['user_money_id']==5){
        		$money_shohon[$w]=$result['money'];
        		$w++;
        	}elseif($result['user_money_id']==6){
        		$money_faisal[$f]=$result['money'];
        		$money_faisal[$f];
        		$f++;
        	}
        	
					}
			}
			if ($post) {
			$i=1;

			while ($result = $post->fetch_assoc()) {
			$i++;
			if($i==8){
				break;
			}
		 ?>

      <tr>
      <?php
      	if($i==2){ 
        echo "<td>Eshat</td>";
	}elseif($i==3){ 
        echo "<td>Majhar</td>";
	}if($i==4){ 
        echo "<td>Rumman</td>";
	}if($i==5){ 
        echo "<td>Jahid</td>";
	}if($i==6){ 
        echo "<td>Shohon</td>";
	}if($i==7){ 
        echo "<td>Faisal</td>";
	}
	
        ?>

        <td><?php 
        if($result['user_money_id']==1 && $result['Name']=='Eshat'){
        	$sum = 0;
        	foreach ($money_eshat as $value) {
        	$x--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($x>0 ){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }
        else if($result['user_money_id']==2 && $result['Name']=='Majhar'){
        	$sum = 0;
        	foreach ($money_majhar as $value) {
        	$y--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($y>0 ){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }
        elseif($result['user_money_id']==3 && $result['Name']=='Rumman'){
        	$sum = 0;
        	foreach ($money_rumman as $value) {
        	$z--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($z>0 ){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }
        elseif($result['user_money_id']==4 && $result['Name']=='Jahid'){
        	$sum = 0;
        	foreach ($money_jahid as $value) {
        	$j--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($j>0 ){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }else if($result['user_money_id']==5 && $result['Name']=='Shohon'){
			$sum = 0;
        	foreach ($money_shohon as $value) {
        	$w--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($w>0){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }else{
			$sum = 0;
        	foreach ($money_faisal as $value) {
        	$f--;
        	$sum = $sum + $value;
        	if($value !=0){
        	if($f>0){
  			echo "$value + ";
  		}else{
  			echo "$value TK";
  		}
  	}
} }

         ?></td>
        <td><?php  $total_taka=$total_taka+$sum; echo $sum.' TK';
        if($result['user_money_id']==1 && $result['Name']=='Eshat'){
          $eshat_sum = $sum;
        }
        else if($result['user_money_id']==2 && $result['Name']=='Majhar'){
          $majhar_sum = $sum;
        }
        else if($result['user_money_id']==3 && $result['Name']=='Rumman'){
          $rumman_sum = $sum;
        }
        else if($result['user_money_id']==4 && $result['Name']=='Jahid'){
          $jahid_sum = $sum;
        }
        else if($result['user_money_id']==5 && $result['Name']=='Shohon'){
          $shohon_sum = $sum;
        }
        else{
          $faisal_sum = $sum;
         // echo $faisal;
        }



        ?></td>
      </tr>

      <?php } }; ?>

    </tbody>
  </table>
</div>
<center><h3 style="color:blue">Meal rate : <?php echo $total_taka/($eshat+$majhar+$rumman+$jahid+$shohon+$faisal); ?>  TK</h3></center>
<?php
$meal_rate = $total_taka/($eshat+$majhar+$rumman+$jahid+$shohon+$faisal);
//echo $meal_rate;
$eshat = $eshat_sum-($eshat * $meal_rate);
$majhar = $majhar_sum-($majhar * $meal_rate);
$rumman = $rumman_sum-($rumman * $meal_rate);
$jahid = $jahid_sum-($jahid * $meal_rate);
$shohon = $shohon_sum-($shohon * $meal_rate);
$faisal= $faisal_sum-($faisal* $meal_rate);


if($eshat<0){ ?>
  <center><h3 style="color:red">Eshat will have to give <?php echo abs($eshat); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Eshat will get <?php echo abs($eshat); ?> TK</h3></center>
<?php }


if($majhar<0){ ?>
  <center><h3 style="color:red">Majhar will have to give <?php echo abs($majhar); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Majhar will get <?php echo abs($majhar); ?> TK</h3></center>
<?php }


if($rumman<0){ ?>
  <center><h3 style="color:red">Rumman will have to give <?php echo abs($rumman); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Rumman will get <?php echo abs($rumman); ?> TK</h3></center>
<?php }


if($jahid<0){ ?>
  <center><h3 style="color:red">Jahid will have to give <?php echo abs($jahid); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Jahid will get <?php echo abs($jahid); ?> TK</h3></center>
<?php }


if($shohon<0){ ?>
  <center><h3 style="color:red">Shohon will have to give <?php echo abs($shohon); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Shohon will get <?php echo abs($shohon); ?> TK</h3></center>
<?php }

if($faisal<0){ ?>
  <center><h3 style="color:red">Faisal will have to give <?php echo abs($faisal); ?> TK</h3></center>
<?php }else{ ?>
  <center><h3 style="color:green">Faisal will get <?php echo abs($faisal); ?> TK</h3></center>
<?php }

?>
<?php include 'inc/footer.php';?>
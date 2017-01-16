<?php include 'inc/header.php';?>
<?php 
    	$i=1;
    	while($i!=7){

    	$query = "INSERT INTO meal_hesab(userid,meal_count) VALUES('$i','1')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
   	$msg = "Message Sent Successfully.";
    }else {
     $error = "Message not sent!";
    }
    $i++;
}

    	; ?>
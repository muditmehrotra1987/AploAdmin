<?php

	 // connect to the database
	include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_REQUEST['user_id']) && is_numeric($_REQUEST['user_id']))
 {

	 $user_id = $_REQUEST['user_id'];
	 $result = mysql_query("DELETE FROM user WHERE user_id='$user_id'")
	 or die(mysql_error()); 
	 
	 echo "<script>window.location.href = 'review_customer.php'</script>";
 }
 else
 {
	  echo "<script>window.location.href = 'review_customer.php'</script>";
 }
 
?>
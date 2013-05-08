<?php

	 // connect to the database
	include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_REQUEST['user_id']) && is_numeric($_REQUEST['user_id']) && isset($_REQUEST['service_id']) && is_numeric($_REQUEST['service_id']))
 {

	 $user_id = $_REQUEST['user_id'];
	 $service_id = $_REQUEST['service_id'];
	 $result = mysql_query("DELETE FROM service_order_details WHERE service_order_details.user_id='$user_id' and service_order_details.service_id='$service_id'")
	 or die(mysql_error()); 
	 
	 echo "<script>window.location.href = 'dashboard.php'</script>";
 }
 else
 {
	  echo "<script>window.location.href = 'dashboard.php'</script>";
 }
 
?>
<?php
	include 'connect-db.php';
	
	$user_id = $_REQUEST['user_id'];
	$service_id = $_REQUEST['service_id'];
	$user_name = $_REQUEST['user_name'];
	$service_name = $_REQUEST['service_name'];
	$service_date = $_REQUEST['service_date'];
	$service_schedule = $_REQUEST['service_schedule'];
	$service_cost = $_REQUEST['service_cost'];
	$user_address = $_REQUEST['user_address'];		
	
	 mysql_query("UPDATE user SET user_name='$user_name', user_address='$user_address' WHERE user_id='$user_id'") or die(mysql_error()); 
	 mysql_query("UPDATE service_order_details SET service_name='$service_name', ") or die(mysql_error());
?>
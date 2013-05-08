<?php 

	/* 
	 connect-db.PHP
	 Allows PHP to connect to your database
	*/
	
	// Database Variables (edit with your own server information)
	$server = 	'timufmysql.jfl-realty.com';
	$username = 'apollo_admin';
	$password = 'apollo@123';
	$database = 'timufmysql_apollo_db';
	
	// Connect to Database
	$link = @mysql_connect($server, $username, $password) or die ("Could not connect to server ... \n" . mysql_error ());	
	$db = @mysql_select_db($database, $link) or die ("Could not connect to database ... \n" . mysql_error ());
	
?>
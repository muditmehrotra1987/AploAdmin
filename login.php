<?php 
						/********************************
							check login details
						*******************************/						
							include 'connect-db.php';
							@session_start();
							$username = $_REQUEST['username'];
							$password = $_REQUEST['password'];								
							
							$query = "SELECT * FROM admin";	
							$result = mysql_query($query, $link) or die(mysql_error());
						
							
							while($row = mysql_fetch_array($result))
							{
								
								if($row['admin_username'] == (string)$username && $row['admin_password'] == (string)$password)
								{	
									
									/*$_SESSION['text'] = $row['admin_username'];*/
									echo "<script>window.location.href = 'dashboard.php'</script>";
									break;
								}	
								else
								{	
									echo "<script>alert('wrong username and password');</script>";
									echo "<script>window.location.href = 'index.php'</script>";									
									break;
								}	
							}
							
						
						
								
?>  
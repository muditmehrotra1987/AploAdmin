<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
    <title>Admin | Edit Orders</title>
    </head>
    <body>
    	<div id="wrap">        	
                
				<?php   
					//connect to DB                 
                    include 'connect-db.php';
                    $user_id = $_REQUEST['user_id']; 
					$service_id = $_REQUEST['service_id'];                   
					//getting service order details 
                    $query = "select user.user_id, service_order_details.service_id, service_order_details.service_name, service_order_details.service_date, service_order_details.service_schedule, service_order_details.service_cost, service_order_details.service_location, user.user_firstname, user.user_lastname, user.user_address from service_order_details, user where service_order_details.user_id = '$user_id' and user.user_id='$user_id' and service_order_details.service_id='$service_id' LIMIT 0, 30 ";
                    $result = mysql_query($query);
                    $row = mysql_fetch_assoc($result);                    
                    $service_id = $row['service_id'];                   
                ?>
                <?php
						//check POST request is set or not
                        if(isset($_POST) && array_key_exists('user_firstname',$_POST))
                        {
                            $user_firstname = $_POST['user_firstname'];
							$user_lastname = $_POST['user_lastname'];
                            $service_name = $_POST['service_name'];
                            $service_date = $_POST['service_date'];
                            $service_schedule = $_POST['service_schedule'];
                            $service_cost = $_POST['service_cost'];
							$service_location = $_POST['service_location'];
                            $user_address = $_POST['user_address'];
                            
							//update user details
                            $query = "Update user Set user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_address = '$user_address'  where user_id ='$user_id'";
                            mysql_query($query, $link) or die(mysql_error());
                            
							//update service details
                            $query = "Update service_order_details Set service_name='$service_name', service_date='$service_date', service_schedule='$service_schedule', service_cost='$service_cost', service_location='$service_location' where service_order_details.service_id = '$service_id' and service_order_details.user_id='$user_id'";
                            mysql_query($query, $link) or die(mysql_error());                            
                            echo "<script>window.location.href = 'dashboard.php'</script>";
                        }
                        else
                        {
                ?>
                <div id="login-banner">
                     <div style="float:right;">
                        <?php 
							//start session
                            @session_start();
                            if(isset($_SESSION['text']))
                            {						
                            $username = "Welcome, " . $_SESSION['text'] . " !!";
                            echo "<font color='#805422'><b>$username</b></font>";
                            echo " <font color='#805422'>|</font> ";
                            echo "<a href='logout.php' style='color:#805422;'><b>Logout</b></a>";
                            }
                            else
                            {
                                echo "<script>window.location.href = 'index.php'</script>";
                            }
                        ?> 
                    </div>
            	<img src="images/logoAdmin copy.png" width="1024px" />
                <div style="float:left;"><a href="dashboard.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to DashBoard </a></div>
                <div id="edit-form-container">   
                <div id="edit-form">              
                    <form id="frm1" name="edit_records" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">                    
                        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />
                        <input type="hidden" value="<?php echo $row['service_id']; ?>" name="service_id" />
                  		<table>
                            <tr><td><span>user id </span></td><td> <?php echo "<span>".$user_id."</span>"; ?></td></tr>
                            <tr><td><span>service id  </span></td><td><?php echo "<span>".$row['service_id']."</span>"; ?></td></tr>
                            <tr><td><span>First name  </span></td><td> <input type="text" value="<?php echo $row['user_firstname']; ?>" name="user_firstname" /></td></tr>
                            <tr><td><span>Last name  </span></td><td> <input type="text" value="<?php echo $row['user_lastname']; ?>" name="user_lastname" /></td></tr>
                            <tr><td><span>service name  </span></td><td> <input type="text" value="<?php echo $row['service_name']; ?>" name="service_name" /></td></tr>
                            <tr><td><span>service placed  </span></td><td> <input type="text" value="<?php echo $row['service_date']; ?>" name="service_date" /></td></tr>
                            <tr><td><span>service schedule  </span></td><td><input type="text" value="<?php echo $row['service_schedule']; ?>" name="service_schedule" /></td></tr>
                            <tr><td><span>service cost  </span></td><td><input type="text" value="<?php echo $row['service_cost']; ?>" name="service_cost" /></td></tr>
                            <tr><td><span>user address  </span></td><td><input type="text" value="<?php echo $row['user_address']; ?>" name="user_address" /></td></tr>
                            <tr><td><span>service location  </span></td><td><input type="text" value="<?php echo $row['service_location']; ?>" name="service_location" /></td></tr>
                            <tr><td></td><td><br /><input type="submit" name="submit" value="Update!" class="button orange" style="margin:0 0 0 140px;" />  </td><td></td></tr>
                        </table>          
                    </form>                    
                  </div>
                    <div id="login-footer">
                        <p style="margin:25px 0 0 0;">&copy; All rights reserved.</p>
                    </div> 
                   </div>
                  </div>
                <?php 
                        }		
                ?>
       
		</div><br />
</body>
</html>
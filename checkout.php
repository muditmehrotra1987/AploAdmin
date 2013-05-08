
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apollo | CheckOut</title>
<link rel="stylesheet" href="styles/apollo.css" type="text/css" />

</head>

<body>
	<div id="wrap">
		<?php include('header.php'); ?>
        <div id="container">
        	     
        	<?php
				include('connect-db.php');
				$user_id = $_REQUEST['user_id'];
				$service_id = $_REQUEST['service_id'];
				$query = "select user.user_id, user.user_firstname, user.user_lastname, user.user_address, user.user_city, user.user_state, user.user_zip, user.user_country, user.user_email, user.user_phone_number, service_order_details.service_id, service_order_details.service_name, service_order_details.service_date, service_order_details.service_schedule, service_order_details.service_cost, service_order_details.service_location, service_order_details.card_number, service_order_details.card_expiry_date from service_order_details, user where service_order_details.user_id = '$user_id' and user.user_id='$user_id' and service_order_details.service_id='$service_id'";	
                $result = mysql_query($query, $link) or die(mysql_error());
				$row = mysql_fetch_assoc($result) or die(mysql_error());
          		echo "<h1 style='font-size:24px; color:#805422;'>CheckOut</h1><br />";				
			?>
            <div id="edit-form-container" style="margin:-8em 0 0 -8em;">   
                <div id="edit-form">              
                    <form id="frm1" name="edit_records" method="post" action="confirm_checkout.php">                    
                       <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />
                  		<table>
                            <tr><td><br /><h1 style='font-size:16px; color:#805422;'>Service Details</h1><hr /></td></tr>
                            <tr><td><span>service id  </span></td><td><?php echo "<span>".$service_id."</span>"; ?></td></tr>   
                            <tr><td><span>service name  </span></td><td> <input type="text" value="<?php echo $row['service_name']; ?>" name="service_name" /></td></tr>                         	
                            <tr><td><span>service schedule  </span></td><td><input type="text" value="<?php echo $row['service_schedule']; ?>" name="service_schedule" /></td></tr>
                            <tr><td><span>service cost  </span></td><td><input type="text" value="<?php echo $row['service_cost']; ?>" name="service_cost" /></td></tr>
                            <tr><td><span>service location  </span></td><td><input type="text" value="<?php echo $row['service_location']; ?>" name="service_location" /></td></tr>
                          	<tr><td><br /><h1 style='font-size:16px; color:#805422;'>Customer Details</h1><hr /></td></tr>
                            <tr><td><span>user id </span></td><td><?php echo "<span>".$user_id."</span>"; ?></td></tr>
                            <tr><td><span>First name  </span></td><td> <input type="text" value="<?php echo $row['user_firstname']; ?>" name="user_firstname" /></td></tr>
                            <tr><td><span>Last name  </span></td><td> <input type="text" value="<?php echo $row['user_lastname']; ?>" name="user_lastname" /></td></tr>
                            <tr><td><span>Card number  </span></td><td> <input type="text" value="<?php echo $row['card_number']; ?>" name="card_number" /></td></tr>
                            <tr><td><span>Card expiry date  </span></td><td> <input type="text" value="<?php echo $row['card_expiry_date']; ?>" name="card_expiry_date" /></td></tr>
                            <tr><td><span>Email</span></td><td><input type="text" value="<?php echo $row['user_email']; ?>" name="user_email" /></td></tr>
                            <tr><td><span>user address  </span></td><td><input type="text" value="<?php echo $row['user_address']; ?>" name="user_address" /></td></tr>
                            <tr><td><span>City</span></td><td><input type="text" value="<?php echo $row['user_city']; ?>" name="user_city" /></td></tr>
                            <tr><td><span>State</span></td><td><input type="text" value="<?php echo $row['user_state']; ?>" name="user_state" /></td></tr>
                            <tr><td><span>Zip/Postal</span></td><td><input type="text" value="<?php echo $row['user_zip']; ?>" name="user_zip" /></td></tr>
                            <tr><td><span>Country</span></td><td><input type="text" value="<?php echo $row['user_country']; ?>" name="user_country" /></td></tr>
                            <tr><td><span>Phone Number</span></td><td><input type="text" value="<?php echo $row['user_phone_number']; ?>" name="user_phone_number" /></td></tr>
                           
                            <tr><td></td><td><br /><input type="submit" name="submit" value="CheckOut" class="button orange" style="margin:0 0 0 140px; width:100px;" />  </td><td></td></tr>
                        </table> 
                      
                    </form>   
                    
                                     
                  </div>
        </div>
      
        <br /><br />
        <?php include('footer.php'); ?>
    </div>
</body>
</html>
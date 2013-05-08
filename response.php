<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apollo | Payment Response</title>
<link rel="stylesheet" href="styles/apollo.css" type="text/css" />
</head>

<body>
	<div id="wrap">
    	<div class="container">
			<?php 
                
                include('header.php');
				
                $transaction_id = $_REQUEST['x_trans_id'];
                $service_cost = $_REQUEST['x_amount'];
                $cust_id = $_REQUEST['x_cust_id'];
                
				echo "<h1 style='font-size:24px; color:#805422;'>Last Transaction Details</h1><br />";
				echo "<table>";
					echo "<tr>";
                		echo "<td><span>Transaction id : </span></td>";
						echo "<td style='text-indent:20px; text-align:left;'><span style='font-weight:lighter;'>".$transaction_id."</span></td>";
					echo "</tr>";
					echo "<tr>";
                		echo "<td><span>Customer id : </span></td>";
						echo "<td style='text-indent:20px; text-align:left;'><span style='font-weight:lighter;'>".$cust_id."</span></td>";
					echo "</tr>";
					
					echo "<tr>";
                		echo "<td><span>Service Cost : </span></td>";
						echo "<td style='text-indent:20px; text-align:left;'><span style='font-weight:lighter;'>US $ ".$service_cost."</span></td>";
					echo "</tr>";
				echo "</table>";
				
				include('connect-db.php');
				$query = "INSERT INTO `transaction_details`(`customer_id`, `last_trans_id`) VALUES ('$cust_id','$transaction_id')";	
				mysql_query($query, $link); 
				$query = "Update service_order_details Set status = 'Payment Submitted' where service_order_details.user_id ='$cust_id'";
                mysql_query($query, $link) or die(mysql_error());
				echo "<br />";
				echo "<h1 style='font-size:20px; color:#805422;'><a href='dashboard.php' style='font-size:18px; color:#805422;'>Click here to continue more payments</a></h1><br />";
            ?>
            
    	</div>
        <?php include('footer.php'); ?>
	</div>
   
</body>
</html>

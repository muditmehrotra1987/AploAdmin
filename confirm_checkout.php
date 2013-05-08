<?php
	require_once 'anet_php_sdk/AuthorizeNet.php'; // Include the SDK
	$api_login_id = '57m6vS9eUZ';
	$transaction_key = '6jGpw5R5B9zBy87K';
	$service_cost = $_REQUEST['service_cost'];
	$service_name = $_REQUEST['service_name'];
	$user_email = $_REQUEST['user_email'];
	$user_firstname = $_REQUEST['user_firstname'];
	$user_lastname = $_REQUEST['user_lastname'];
	$user_address = $_REQUEST['user_address'];
	$user_city = $_REQUEST['user_city'];
	$user_state = $_REQUEST['user_state'];
	$user_zip = $_REQUEST['user_zip'];
	$user_country = $_REQUEST['user_country'];
	$user_phone_number = $_REQUEST['user_phone_number'];
	$card_number = $_REQUEST['card_number'];
	$card_expiry_date = $_REQUEST['card_expiry_date'];
	$cust_id = $_REQUEST['user_id'];
	$fp_timestamp = time();
	$fp_sequence = "123" . time(); // Enter an invoice or other unique number.
	$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id,
	$transaction_key, $service_cost, $fp_sequence, $fp_timestamp);
?>

<html>
<head>
<title>Checkout Confirmation</title>

</head>
<body style="background-color:#E1DED5; text-align:center;">

<br /><br /><br />

    <div id="wraper" style="margin:0 auto; width:860px; background-color:#F2ECE1; color:#998777; border-left-style:dashed; border-top-style:dashed; border-right:dashed; border-bottom-style:dashed; text-align:left;">
    
    <div style="float:right;">
                 	<?php 
						//session start
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
							echo "<script>alert('You are in unauthorised area')</script>";
                            echo "<script>window.location.href = 'index.php'</script>";
							
                        }
                 	?> 
                </div>
                <div style="float:left;">
                	<a href="dashboard.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to DashBoard </a>                    
                </div>
                   <a href="dashboard.php"><img src="images/logoAdmin copy.png" width="860px" /></a>
    
    
    <marquee behavior="scroll" direction="right" loop="-1" scrolldelay="10" onMouseOver="color:#ffffff">
    <h2 style="text-align:center; text-transform:capitalize; color:#BE6145; text-decoration:underline;">Checkout Confirmation!</h2>
    </marquee>
    	<div id="form" style="margin:0 0 0 3em;">

    <h3 style="text-decoration:underline;">Review your order</h3>
    
    <label>Name of the service : </label><label style="font-weight:bold;"><?php echo $service_name ?></label><br />
    <label>Service Cost : </label><label style="font-weight:bold;"><?php echo "US $".$service_cost ?></label><br />
    <label>Card number : </label><label style="font-weight:bold;"><?php echo $card_number ?></label><br />
    <label>Card expiry date : </label><label style="font-weight:bold;"><?php echo $card_expiry_date ?></label><br /><br /><hr />
    
    <h3 style="text-decoration:underline;">Personal info</h3>
    <label>Customer id : </label><label><?php echo $cust_id; ?></label><br />
    <label>First Name : </label><label><?php echo $user_firstname ?></label><br />
    <label>Last Name : </label><label><?php echo $user_lastname ?></label><br />
    <label>Address : </label><label><?php echo $user_address ?></label><br />
    <label>City : </label><label><?php echo $user_city ?></label><br />
    <label>State : </label><label><?php echo $user_state ?></label><br />
    <label>Postal/Zip Code : </label><label><?php echo $user_zip ?></label><br />
    <label>Country : </label><label><?php echo $user_country ?></label><br />
    <label>Phone Number : </label><label><?php echo $user_phone_number ?></label><br />

<form method='post' action="https://secure.authorize.net/gateway/transact.dll" target="_blank">
	<!--API related details-->
	<input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
	<input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />	
	<input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
	<input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
    
    <!--Customers related details-->
    <input type='hidden' name="x_amount" value="<?php echo $service_cost?>" />
    <input type="hidden" name="x_cust_id" value="<?php echo $cust_id ?>" />
    <input type="hidden" name="x_first_name" value="<?php echo $user_firstname ?>" />
    <input type="hidden" name="x_last_name" value="<?php echo $user_lastname ?>" />
    <input type="hidden" name="x_address" value="<?php echo $user_address ?>" />
    <input type="hidden" name="x_city" value="<?php echo $user_city ?>" />
    <input type="hidden" name="x_state" value="<?php echo $user_state ?>" />
    <input type="hidden" name="x_zip" value="<?php echo $user_zip ?>" />
    <input type="hidden" name="x_country" value="<?php echo $user_country ?>" />
    <input type="hidden" name="x_phone" value="<?php echo $user_phone_number ?>" />
    <input type="hidden" name="x_email" value="<?php echo $user_email ?>" />
    
    <!--Additional fields-->
    <input type="hidden" name="x_cancel_url" value="http://apollo.10summer.com/dashboard.php" />
    <input type="hidden" name="x_cancel_url_text" value="Payment Cancel" />
	<input type='hidden' name="x_version" value="3.1" />
	<input type='hidden' name="x_show_form" value="payment_form" />
	<input type='hidden' name="x_test_request" value="true" />
	<input type='hidden' name="x_method" value="cc" />

	<!--recipet related details-->	
  <!-- <input type='hidden' name="x_receipt_link_method" value="LINK" />
	<input type="hidden" name="x_receipt_link_text" value="Back to our website" />
	<input type="hidden" name="x_receipt_link_url" value="http://localhost/apollo_admin/dashboard.php" />-->
	
	<!--Customer Email related details-->
    <input type="hidden" name="x_email_customer" value="TRUE" />
    <input type="hidden" name="x_header_email_receipt" value="Thanks for using our services, your purchase receipt as follows :" />
    <input type="hidden" name="x_footer_email_receipt" value="Regards, Team Apollo" />
    <input type="hidden" name="x_description" value="Payment for the <?php echo $service_name ?> service." />
    <!--<input type="hidden" name="x_relay_response" value="TRUE" />-->
        
<input type='submit' value="Pay Now!"  style="width:7em; margin:0 0 0 25em; color:#984E4E; background-color:#C59A94; border:2px solid #763E2E; font-weight:bold; text-indent:1px;" />

</form>
				
</div>
</div>
</body>
</html>
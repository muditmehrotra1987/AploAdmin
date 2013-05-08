<?php

require_once 'anet_php_sdk/AuthorizeNet.php'; // Include the SDK
$api_login_id = '7uD75xg5ykRm';
$transaction_key = '5rJXZ73asBQ288vt';
$amount = $_REQUEST['amount'];
$product_name = $_REQUEST['pro_name'];
$quantity = $_REQUEST['quan'];
$email = $_REQUEST['email'];
$fname = $_REQUEST['first_name'];
$lname = $_REQUEST['last_name'];
$company = $_REQUEST['company'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zip_code = $_REQUEST['zip_code'];
$country = $_REQUEST['country'];
$phone = $_REQUEST['phone'];
$fax = $_REQUEST['fax'];
$fp_timestamp = time();
$fp_sequence = "123" . time(); // Enter an invoice or other unique number.
$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id,
$transaction_key, $amount, $fp_sequence, $fp_timestamp)

?>

<html>
<head>
<title>Review Order</title>

</head>
<body style="background-color:#E1DED5">
<br /><br /><br />
    <div id="wraper" style="margin:0 auto; width:860px; background-color:#F2ECE1; color:#998777; border-left-style:dashed; border-top-style:dashed; border-right:dashed; border-bottom-style:dashed;">
    <marquee behavior="scroll" direction="right" loop="-1" scrolldelay="10" onMouseOver="color:#ffffff"><h2 style="text-align:center; text-transform:capitalize; color:#BE6145; text-decoration:underline;">Review your Order!</h2></marquee>
    	<div id="form" style="margin:0 0 0 3em;">

<h3 style="text-decoration:underline;">Review your order</h3>
<label>Email : </label><label style="font-weight:bold;"><?php echo $email ?></label><br />
<label>Name of the Product : </label><label style="font-weight:bold;"><?php echo $product_name ?></label><br />
<label>Product Quantity : </label><label style="font-weight:bold;"><?php echo $quantity ?></label><br />
<label>Product Price : </label><label style="font-weight:bold;"><?php echo "US $".$amount ?></label><br /><br /><hr />
<h3 style="text-decoration:underline;">Personal info</h3>
<label>First Name : </label><label><?php echo $fname ?></label><br />
<label>Last Name : </label><label><?php echo $lname ?></label><br />
<label>Company : </label><label><?php echo $company ?></label><br />
<label>Address : </label><label><?php echo $address ?></label><br />
<label>City : </label><label><?php echo $city ?></label><br />
<label>State : </label><label><?php echo $state ?></label><br />
<label>Postal/Zip Code : </label><label><?php echo $zip_code ?></label><br />
<label>Country : </label><label><?php echo $country ?></label><br />
<label>Phone Number : </label><label><?php echo $phone ?></label><br />
<label>Fax : </label><label><?php echo $fax ?></label><br /><br />

<form method='post' action="https://test.authorize.net/gateway/transact.dll">

	<input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
	<input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />
	<input type='hidden' name="x_amount" value="<?php echo $amount?>" />
	<input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
	<input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
    <input type="hidden" name="x_first_name" value="<?php echo $fname ?>" />
    <input type="hidden" name="x_last_name" value="<?php echo $lname ?>" />
    <input type="hidden" name="x_company" value="<?php echo $company ?>" />
    <input type="hidden" name="x_address" value="<?php echo $address ?>" />
    <input type="hidden" name="x_city" value="<?php echo $city ?>" />
    <input type="hidden" name="x_state" value="<?php echo $state ?>" />
    <input type="hidden" name="x_zip" value="<?php echo $zip_code ?>" />
    <input type="hidden" name="x_country" value="<?php echo $country ?>" />
    <input type="hidden" name="x_phone" value="<?php echo $phone ?>" />
    <input type="hidden" name="x_fax" value="<?php echo $fax ?>" />
    <input type="hidden" name="x_url" value="http://localhost/pay/responce.php" />
	<input type='hidden' name="x_version" value="3.1" />
	<input type='hidden' name="x_show_form" value="payment_form" />
	<input type='hidden' name="x_test_request" value="false" />
	<input type='hidden' name="x_method" value="cc" />
	<input type='hidden' name="x_receipt_link_method" value="LINK" />
	<input type="hidden" name="x_receipt_link_text" value="Back to our website" />
	<input type="hidden" name="x_receipt_link_url" value="http://localhost/pay/cart.php" />
	<input type="hidden" name="x_color_background" value="#EBE2DA" />
    <input type="hidden" name="x_email" value="<?php echo $email ?>" />
    <input type="hidden" name="x_email_customer" value="TRUE" />
    <input type="hidden" name="x_header_email_receipt" value="Thanks for using our services, your purchase receipt as follows :" />
    <input type="hidden" name="x_footer_email_receipt" value="Regards, Team Apollo" />
    <input type="hidden" name="x_description" value="Payment for the purchase of <?php echo $quantity ?> <?php echo $product_name ?>." />
    <input type="hidden" name="x_relay_response" value="TRUE" />
    <input type="hidden" name="x_invoice_num" value="200012354215" />    
<input type='submit' value="Pay Now!"  style="width:7em; margin:0 0 0 25em; color:#984E4E; background-color:#C59A94; border:2px solid #763E2E; font-weight:bold; text-indent:1px;" />

</form>

</div>
</div>
</body>
</html>
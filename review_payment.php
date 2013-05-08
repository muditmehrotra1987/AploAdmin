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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apollo | Payment Review</title>
 <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
</head>

<body>
	 <div id="wrap">
			<?php include('header.php') 
			
		
$user_id = $_REQUEST['user_id'];
$service_id $_REQUEST['service_id'];

echo $user_id;
echo $service_id;

			?>
    		<div id="container">
            	
            </div>
            <?php include('footer.php')?>
    </div>
</body>
</html>

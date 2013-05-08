<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

 <script>
 	function formValidation()
	{	
		
		var x = document.forms["myform"]["pro_name"].value;		
		if(x==null || x=="")
		{
			alert("Please enter product name");
			return false;
		}
		
		var x = document.forms["myform"]["quan"].value;		
		if(x==null || x=="")
		{
			alert("Please enter product quantity");
			return false;
		}
		
		var x = document.forms["myform"]["amount"].value;		
		if(x==null || x=="")
		{
			alert("Please enter product amount");
			return false;
		}
		
		var x = document.forms["myform"]["first_name"].value;		
		if(x==null || x=="")
		{
			alert("Please enter first name");
			return false;
		}
		
		var x = document.forms["myform"]["last_name"].value;		
		if(x==null || x=="")
		{
			alert("Please enter last name");
			return false;
		}
		
		var x = document.forms["myform"]["address"].value;		
		if(x==null || x=="")
		{
			alert("Please enter address");
			return false;
		}
		
		var x = document.forms["myform"]["city"].value;		
		if(x==null || x=="")
		{
			alert("Please enter city");
			return false;
		}
		
		var x = document.forms["myform"]["state"].value;		
		if(x==null || x=="")
		{
			alert("Please enter state");
			return false;
		}
		
		var x = document.forms["myform"]["zip_code"].value;		
		if(x==null || x=="")
		{
			alert("Please enter postal/zip code");
			return false;
		}
		
		var x = document.forms["myform"]["country"].value;		
		if(x==null || x=="")
		{
			alert("Please enter country");
			return false;
		}
		
		var x = document.forms["myform"]["phone"].value;		
		if(x==null || x=="")
		{
			alert("Please enter phone number");
			return false;
		}
		
		var x = document.forms["myform"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if(atpos < 1 || dotpost < atpos + 2 || dotpos + 2 > x.length)
		{
			alert("Please enter valid email address.");
			return false;
		}
	}
 </script>
 <style>
  input{
 	width:20em; 
	margin: 0 0 0 5em;
	text-indent:10px;
	height:1.5em;
	font-size:medium;
	color:#D1CFC5;
	border: 1px solid #A7382C;
  }    
 </style>
</head>
<body style="background-color:#E1DED5">
<br /><br /><br />
    <div id="wraper" style="margin:0 auto; width:860px; background-color:#F2ECE1; color:#998777; border-left-style:dashed; border-top-style:dashed; border-right:dashed; border-bottom-style:dashed;">
    <marquee behavior="scroll" direction="right" loop="-1" scrolldelay="10" onmouseover="color:#ffffff"><h2 style="text-align:center; text-transform:capitalize; color:#BE6145; text-decoration:underline;">product purchase form</h2></marquee>
    	<div id="form" style="margin:0 0 0 3em;">
    <form id="frm1" name="myform" method="post" action="sim.php" onsubmit="return formValidation()">   
    <br />  	
    	<h3>Product Info</h3><hr />
    	<input type="text" name="email" placeholder="Email*" /><br /><br />
    	<input type="text" name="pro_name" placeholder="Product*" /><br /><br />
        <input type="text" name="quan" placeholder="Quantity*" /><br /><br />
        <input type="text" name="amount" placeholder="amount*" /><br /><br />
        <hr />
        <h3>Personal Info for payment</h3>
        <input type="text" name="first_name" placeholder="First Name*" /><br /><br />
        <input type="text" name="last_name" placeholder="Last Name*" /><br /><br />
        <input type="text" name="company" placeholder="Company*" /><br /><br />
        <input type="text" name="address" placeholder="Address*" /><br /><br />
        <input type="text" name="city" placeholder="City*" /><br /><br />
        <input type="text" name="state" placeholder="State*" /><br /><br />
        <input type="text" name="zip_code" placeholder="Zip/Postal code*" /><br /><br />
        <input type="text" name="country" placeholder="Country*" /><br /><br />
        <input type="text" name="phone" placeholder="Phone*" /><br /><br />
        <input type="text" name="fax" placeholder="Fax" /><br /><br />
        
        <input type="submit" value="Checkout" style="width:7em; margin:0 0 0 18em; color:#984E4E; background-color:#C59A94; border:2px solid #763E2E; font-weight:bold; text-indent:1px;" />
        <br /><br />
    </form>
    </div>
</div>

</body>
</html>
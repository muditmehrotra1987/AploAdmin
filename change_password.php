<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
    <title>Admin | Change Password</title>
     <script>	 
		function formValidation()
		{			
			var x = document.forms["myform"]["prev_password"].value;		
			if(x==null || x=="")
			{
				alert("Please enter old password");
				return false;
			}			
		}
		
		function pwdCompare()
		{
			var p1 = document.myform.new_password.value;
			p1 = p1.replace(/^\s+/g, "");  // strip leading spaces
			var p2 = document.myform.password_confirmation.value;
			p2 = p2.replace(/^\s+/g, "");  // strip leading spaces		
			if ((p1.length < 6) || (p1 != p2))
			{  // minimum 6 characters
				alert ("The two passwords do not match or have too few characters!  Try again!");
				document.myform.new_password.value = "";
				document.myform.password_confirmation.value = "";
				document.myform.new_password.focus();
				return false;
			}
			else 
			{
				return true;
			}
		}		
    </script>     
    </head>
    
    <body>
              <div id="wrap">
                    <div id="login-banner">  
                    	<div style="float:right;">
                        <?php 
                            @session_start();//start session
							//find session is set or not
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
                        <img src="images/logoAdmin copy.png" width="1024px"   />
                        <div style="float:left;"><a href="dashboard.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to DashBoard </a></div>
                        <?php 
						//check POST is set or not
						if(isset($_POST)&& array_key_exists('prev_password', $_POST))
						{
							include 'connect-db.php';
							
							$prev_password = $_POST['prev_password'];
							$new_password = $_POST['new_password'];	
							$password_confirmation = $_POST['password_confirmation'];
							
							//getting old admin password 
							$query = "SELECT `admin_password` FROM `admin` WHERE `admin_password` = '$prev_password' LIMIT 0, 30 ";	
							$result = @mysql_query($query, $link) or die(mysql_error());
						
							$IsExists = false;
							while($row = @mysql_fetch_array($result))
							{
								if($row['admin_password'] == $prev_password)
								{	
									$IsExists = true;
									//update new password
									$query = "UPDATE admin SET admin_password = '$new_password' where `admin_password` = '$prev_password'";	
									mysql_query($query, $link);
									echo "<script>alert('password updated successfully!')</script>";
									echo "<script>window.location.href = 'logout.php'</script>";
									break;	
								}	
							}
							if($IsExists == false)
							{	
								echo "<script>alert('You have entered an incorrect password. Please enter your correct password.');</script>";
								echo "<script>window.location.href = 'change_password.php'</script>";
								exit();									
							}	
						}
						else
						{								
						?>       
                        
                        <div class="formholder">
                                <div id="login-form">
                                    <h1 style="color:#FFFFFF; margin: 0 0 0 5px; font-weight:bold; font-size:medium;">change password!</h1>
                                    <div style="margin:0 0 0 40px;">                                                                        
                                    	 <form id="frm1" name="myform" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return formValidation()">  
                                         <table>
                                                <tr>
                                                    <td><span style='font-weight:lighter;font-size:12px;'> Old Password*</span></td>
                                                    <td><input type="password" name="prev_password" /></td>
                                               </tr>
                                               <tr>
                                                   <td><span style='font-weight:lighter;font-size:12px;'>New Password*</span></td>
                                                   <td><input id="new_pass" type="password" name="new_password" /></td>
                                               </tr>
                                               <tr>
                                                   <td><span style='font-weight:lighter;font-size:12px;'>Password Confirmation*</span></td>
                                                   <td><input id="pass_confirmation" type="password" name="password_confirmation" /></td>
                                               <tr>
                                                   <td></td>
                                                   <td><input type="submit" value="LogIn" class="button orange" onclick = " return pwdCompare()" style="margin:10px 0 0 140px;" /></td>
                                               </tr>
                                           </table>
                                       	 </form>                        
                                    </div>
                                </div>
                                <div id="login-footer">
                        			<p style="margin:25px 0 0 0;">&copy; All rights reserved.</p>
                        		</div> 
                         </div>
                         <?php 
						 	}
						 ?>
                    </div>
              </div>
    </body>
</html>
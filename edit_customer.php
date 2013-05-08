<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
    <title>Admin | Edit Customer</title>
    </head>
    <body>
    	<div id="wrap">        	
                
				<?php       
					//connect to DB             
                    include 'connect-db.php';
                    $user_id = $_REQUEST['user_id'];
					//getting user details based on user id                    
                    $query = "select * from user where user.user_id = '$user_id'";
                    $result = mysql_query($query, $link);
                    $row = mysql_fetch_assoc($result);  
                ?>
                <?php
                        if(isset($_POST) && array_key_exists('user_username',$_POST))
                        {
							$user_firstname = $_POST['user_firstname'];
							$user_lastname = $_POST['user_lastname'];
							$user_email = $_POST['user_email'];
							$user_address = $_POST['user_address'];
							$user_city = $_POST['user_city'];
							$user_state = $_POST['user_state'];
							$user_zip = $_POST['user_zip'];
							$user_country = $_POST['user_country'];
							$user_phone_number = $_POST['user_phone_number'];
                            
							//update user details
                            $query = "Update user Set user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', user_address = '$user_address', user_city = '$user_city', user_state = '$user_state', user_zip = '$user_zip', user_country = '$user_country', user_phone_number = '$user_phone_number'  where user_id ='$user_id'";
                            mysql_query($query, $link) or die(mysql_error());                                                 
                            echo "<script>window.location.href = 'review_customer.php'</script>";
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
                <div style="float:left;">
                	<a href="dashboard.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to DashBoard </a>
                    <a href="review_customer.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to Customers </a>
                </div>
                <div id="edit-form-container">   
                <div id="edit-form">              
                    <form id="frm1" name="edit_records" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">                    
                        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />                        
                  		<table>
                            <tr><td><span>user id </span></td><td> <?php echo "<span>".$user_id."</span>"; ?></td></tr>
                            <tr><td><span>First Name  </span></td><td> <input type="text" value="<?php echo $row['user_firstname']; ?>" name="user_firstname" /></td></tr>
                             <tr><td><span>Last Name  </span></td><td> <input type="text" value="<?php echo $row['user_lastname']; ?>" name="user_lastname" /></td></tr>
                            <tr><td><span>Email  </span></td><td> <input type="text" value="<?php echo $row['user_email']; ?>" name="user_email" /></td></tr>
                            <tr><td><span>Address  </span></td><td><input type="text" value="<?php echo $row['user_address']; ?>" name="user_address" /></td></tr>
                             <tr><td><span>City  </span></td><td> <input type="text" value="<?php echo $row['user_city']; ?>" name="user_city" /></td></tr>
                              <tr><td><span>State  </span></td><td> <input type="text" value="<?php echo $row['user_state']; ?>" name="user_state" /></td></tr>
                               <tr><td><span>Zip/Postal  </span></td><td> <input type="text" value="<?php echo $row['user_zip']; ?>" name="user_zip" /></td></tr>
                                <tr><td><span>Country  </span></td><td> <input type="text" value="<?php echo $row['user_country']; ?>" name="user_country" /></td></tr>
                            <tr><td><span>Phone Number  </span></td><td><input type="text" value="<?php echo $row['user_phone_number']; ?>" name="user_phone_number" /></td></tr>
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
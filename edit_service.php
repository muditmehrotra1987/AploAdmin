<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
    <title>Admin | Edit Services</title>
    
    <script type="text/javascript" language="JavaScript">
		function check() 
		{
			  var ext = document.edit_records.photo.value;
			  ext = ext.substring(ext.length-3,ext.length);
			  ext = ext.toLowerCase();
			  if(ext != 'jpg' && ext != 'png' && ext != 'gif' && ext != 'jpeg') 
			  {
				alert('You selected a .'+ext+' file; please select a .jpg/.png/.gif file instead!');
				/*alert('File name can\'t be blank.');*/
				return false; 
			  }
			  else
				return true; 
		}
	</script>
    
    
    </head>
    <body>
    	<div id="wrap">        	
                
				<?php   
					//connect to DB                 
                    include 'connect-db.php';
                    $service_id = $_REQUEST['service_id'];                    
					//getting data from service description table
                    $query = "select service_description.service_name, service_description.service_cost, service_description.service_image, service_description.service_description, service_description.service_video_url, service_description.service_avg_time, service_description.service_technician from service_description where service_description.service_id = '$service_id' LIMIT 0, 30 ";
                    $result = mysql_query($query,$link);
                    $row = mysql_fetch_array($result);                    
                               
                ?>
                 
                <?php
						//check POST request is set or not
                        if(isset($_POST) && array_key_exists('service_name',$_POST))
                        {
                            $service_name = $_POST['service_name'];
                            $service_cost = $_POST['service_cost'];
                            $service_description = $_POST['service_description'];
                            $service_video_url = $_POST['service_video_url'];
                            $service_avg_time = $_POST['service_avg_time'];
							$service_technician = $_POST['service_technician'];							
							
							//upload images start here													
								
								if(!file_exists($_FILES['photo']['tmp_name']))
								{		
									$fullpath = $row['service_image'];
								}
								else
								{
									
									$current_image = $_FILES['photo']['name'];												
									$extension = substr(strrchr($current_image, '.'), 1);
									if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif") && ($extension != "png")) 
									{
										die('Please select a valid image extension');	
									}
									$time = date("fYhis");
									$new_image = $time . "." . $extension;
									$destination="serviceimages/".$new_image;							
									$fullpath = "http://apollo.10summer.com/".$destination;
									$action = copy($_FILES['photo']['tmp_name'], $destination);
									if (!$action) 
									{
										die('Record not saved. Please try again later.');
									}
								}
							
							//end upload images		
                                                      
							//update service details
                            $query = "Update service_description Set service_name='$service_name', service_cost='$service_cost', service_image='$fullpath', service_description='$service_description', service_video_url='$service_video_url', service_avg_time='$service_avg_time', service_technician='$service_technician' where service_description.service_id = '$service_id'";
                            mysql_query($query, $link) or die(mysql_error());   
							
							//update image url in appointed services table using service name
							$query1 = "Update apointed_service Set apt_service_image_url='$fullpath' where apointed_service.apt_service_name ='".$row['service_name']."'";
                            mysql_query($query1, $link) or die(mysql_error());                         
                            echo "<script>window.location.href = 'review_services.php'</script>";
                        }
                        else
                        {
                ?>
                <div id="login-banner">
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
                                echo "<script>window.location.href = 'index.php'</script>";
                            }
                        ?> 
                    </div>
            	<img src="images/logoAdmin copy.png" width="1024px" />
                <div style="float:left;">
                <a href="dashboard.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to DashBoard </a>
                <a href="review_services.php" style="color:#805422;font-weight:lighter;font-size:large;text-decoration:none;"> << Back to services </a>
                </div>
               
                <div id="edit-form-container"> 
                
                <div id="edit-form">    
                          
                    <form id="frm1" name="edit_records" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">                    
                        
                        
                  		<table>
                            
                            <tr><td><span>service name  </span></td><td> <input type="text" value="<?php echo $row['service_name']; ?>" name="service_name" /></td></tr>
                            <tr><td><span>service cost  </span></td><td> <input type="text" value="<?php echo $row['service_cost']; ?>" name="service_cost" /></td></tr>
                            <tr>
                           		<td><br /><br /><br /><br /><span>service image url  </span></td>
                                <td>                                	
                                    <br />                                    
                                    <img src="<?php echo $row['service_image']; ?>" width="100" height="100" style="border:2px solid #553424;" />
                                    <input type="hidden" name="size" value="350000"  /><input type="file" name="photo" />
                                   
                                </td>
                            </tr>                           
                            <tr><td><span><br />service desctiption  </span></td><td><br /> <textarea name="service_description" style="width:16.5em; height:5em;"><?php echo $row['service_description']; ?></textarea></td></tr>
                            <tr><td><span>service video url  </span></td><td><input type="text" value="<?php echo $row['service_video_url']; ?>" name="service_video_url" /></td></tr>
                            <tr><td><span>service average time  </span></td><td><input type="text" value="<?php echo $row['service_avg_time']; ?>" name="service_avg_time" /></td></tr>
                            <tr><td><span>service technician name  </span></td><td><input type="text" value="<?php echo $row['service_technician']; ?>" name="service_technician" /></td></tr>
                            <tr><td></td><td><br /><input type="submit" name="submit" value="Update!" class="button orange" style="margin:0 0 0 140px;" />  </td><td></td></tr>
                        </table>          
                    </form>   
                   
                  </div>                  
                    <?php include('footer.php'); ?>
                   </div>
                  </div>
                <?php 
                     }		
                ?>     
		</div><br />
</body>
</html>
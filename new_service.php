<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />     
        <title>Admin | Add New Services</title>
        <link rel="stylesheet" href="styles/apollo.css" type="text/css" />  
    <script type="text/javascript" language="JavaScript">
		function check() 
		{
			  var ext = document.new_service.photo.value;
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
        	<!--Attach header in page-->
           	<?php include ("header.php"); ?>
       		<div class="container">	
            	<!--connet to DB-->		
				<?php include("connect-db.php"); ?>
                <h1 style='font-size:24px; color:#805422;'>Add New Services</h1><br />
                <?php
				if(isset($_POST) && array_key_exists('service_name', $_POST))
				{
					$service_name = $_POST['service_name'];
						$service_cost = $_POST['service_cost'];
						//$service_image = $_POST['service_image'];
						$service_description = $_POST['service_description'];
						$service_video_url = $_POST['service_video_url'];
						$service_avg_time = $_POST['service_avg_time'];
						$service_technician = $_POST['service_technician'];
						
						//upload images start here
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
						//end upload images
						
						$IsRepeat = false;
						//find service name to check with existing service name in database
						$query ="SELECT service_description.service_name FROM service_description";
						$result = mysql_query($query, $link) or die(mysql_error());

						while($row = mysql_fetch_assoc($result))
						{
							if($row['service_name'] == $service_name)
							{	
								$IsRepeat = true;
								echo "<script>alert('This Apollo service is already in list.')</script>";
								echo "<script>window.location.href = 'new_service.php'</script>";	
								break;
							}
						}
						//check fields are blank or not
						if(strlen($service_name) == 0 && strlen($service_cost) == 0 && strlen($service_image) == 0 && strlen($service_description) == 0 && strlen($service_video_url) == 0 && strlen($service_avg_time) == 0)
						{
							echo "<script>alert('Please fill all fields to create new service.')</script>";	
							echo "<script>window.location.href = 'new_service.php'</script>";												
						}
						else
						{
							if($IsRepeat == false)
							{
							//insert into service_description table
							$query = "INSERT INTO `service_description`(`service_name`, `service_cost`, `service_image`, `service_description`, `service_video_url`, `service_avg_time`, `service_technician`) VALUES ('$service_name','$service_cost','$fullpath','$service_description','$service_video_url','$service_avg_time','$service_technician')";	
							mysql_query($query, $link);
							echo "<script>alert('New service saved successfully!')</script>";
							echo "<script>window.location.href = 'new_service.php'</script>";
							}
						}
				}
				else
				{
				?>
                <!--Form for adding new services-->              
                <div id="edit-form" style="margin:5px 0 0 200px;">              
                    <form id="frm1" name="new_service" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" onsubmit="return check();">                        
                  		<table>                           
                            <tr><td><span>service name  </span></td><td> <input type="text" name="service_name" /></td></tr>
                            <tr><td><span>service cost  </span></td><td> <input type="text" name="service_cost" /></td></tr>
                            <tr>
                            	<td><span>service image url  </span></td>
                                <td><input type="hidden" name="size" value="350000"><input type="file" name="photo"><br /></td>
                            </tr>
                            <tr><td><span>service description  </span></td><td><textarea name="service_description" style="width:16.5em;"></textarea></td></tr>
                            <tr><td><span>service video url  </span></td><td><input type="text" name="service_video_url" /></td></tr>
                            <tr><td><span>service average time  </span></td><td><input type="text" name="service_avg_time" /></td></tr>
                            <tr><td><span>service technician name  </span></td><td><input type="text" name="service_technician" /></td></tr>
                   <tr><td></td><td><br /><input type="submit" name="submit" value="Add Service" class="button orange" style="margin:0 0 0 110px; width:100px;" /></td><td></td></tr>
                        </table>          
                    </form>                    
                  </div>
                	<br /><br />
                <?php 
					}
				?>
			</div>
            <!--Footer for the page-->              
            <?php include("footer.php"); ?>
		</div><br />
    </body>
</html>
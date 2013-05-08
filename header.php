<!--Header for all pages-->
 <div id="header">
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
                   <a href="dashboard.php"><img src="images/logoAdmin copy.png" width="1024px" /></a><br /><br />                   
            </div>
            
          <div id="content">
                <div id="welcome">                   
                    <h1 style='font-size:24px; color:#805422;'>Welcome, to your DashBoard!</h1><br />
                    <a href="http://www.twitter.com" target="_blank"><img src="images/twitter.png" width="30" height="30" /></a>
                    <a href="http://www.facebook.com" target="_blank"><img src="images/facebook.png" width="30" height="30" /></a>                    
                    <a href="http://plus.google.com" target="_blank"><img src="images/Google-Plus-icon.png" width="30" height="30" /></a>
                </div>
                <div id="rss">
                   <h2 style='font-size:18px; color:#805422;'>Top 5 Most Popular Services!</h2><hr style="background:inherit;background-color:#805422;border:thick; height:0.5px;" />
                    <?php 
						//connect to DB
						include('connect-db.php');
						//query to find most popular services ordered by the client
						$query = "SELECT service_name, COUNT( service_name ) AS popularity\n"
						. "FROM service_order_details\n"
						. "GROUP BY service_name\n"
						. "ORDER BY popularity DESC \n"
						. "LIMIT 0 , 5";
						
						$result = mysql_query($query, $link) or die(mysql_error());
						
						
						if(mysql_num_rows($result))
						{	
							echo "<ul class='dashboard-list'>";
							while($service = mysql_fetch_assoc($result)) 
							{
								echo "<li><img src='images/businesses.gif' />".$service['service_name']."<em style='float:right;'>".$service['popularity']." orders</em>"."</li>";
								
							}
							echo "</ul>";
						}						
						
						@mysql_close($link);
					
					?>
                    	
                </div>      
                <div id="dashboard-menu">
                	<h2 style='font-size:18px; color:#805422;'>Select your choice!</h2><hr style="background:inherit;background-color:#805422;border:thick; height:0.5px;" />
                	<ul class="dashboard-list">
                    	<li><a href="dashboard.php" class="dashboard-links"><img src="images/businesses.gif" />DashBoard</a></li>
                        <li><a href="new_service.php" class="dashboard-links"><img src="images/businesses.gif" />Add New Services</a></li>
                    	<li><a href="review_services.php" class="dashboard-links"><img src="images/businesses.gif" />Review Services</a></li>                        
                        <li><a href="review_customer.php" class="dashboard-links"><img src="images/businesses.gif" />Review Customer Details</a></li>
                        <li><a href="transaction_details.php" class="dashboard-links"><img src="images/businesses.gif" />Submitted Transactions Details</a></li>
                        <li><a href="change_password.php" class="dashboard-links"><img src="images/businesses.gif" />Change Password</a></li>
                    </ul>
                </div>     
          </div>
          <br /><br /><br /><br /><br /><br /><br /><br />

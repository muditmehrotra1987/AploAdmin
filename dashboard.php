<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />     
        <title>Admin | Home</title>
        <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
        
        <script type="text/javascript">
			<!--check delete or not-->
				function my_alert()
				{
				  var where_to= confirm("Do you really want to delete it??");
				  if (where_to== true)
				  {
					this.submit();
				  } 
				  else 
				  {
					//stay here!!!!!
					window.location="dashboard.php";
					return false;
				  }
				}
		</script>
             
    </head>
        
    <body>
            
        <div id="wrap">
             
		<?php include("header.php"); ?>
       	<div class="container">
            	
			<?php 
			    // connect to the database
                include('connect-db.php');
                
                // number of results to show per page
                $per_page = 4;
                
                // figure out the total pages in the database
				$query = "select user.user_id, service_order_details.service_id, service_order_details.service_name, service_order_details.service_date, service_order_details.service_schedule, service_order_details.service_cost, service_order_details.service_location, service_order_details.status, service_order_details.card_number, service_order_details.card_expiry_date, user.user_address from service_order_details, user where service_order_details.user_id = user.user_id LIMIT 0, 30 ";
				
                $result = mysql_query($query);
                $total_results = mysql_num_rows($result);
                $total_pages = ceil($total_results / $per_page);
        		
                // check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
                if (isset($_GET['page']) && is_numeric($_GET['page']))
                {
                        $show_page = $_GET['page'];                        
                        	// make sure the $show_page value is valid
                        if ($show_page > 0 && $show_page <= $total_pages)
                        {
                           $start = ($show_page -1) * $per_page;
                           $end = $start + $per_page; 
                        }
                        else
                        {
                           // error - show first set of results
                           $start = 0;
                           $end = $per_page; 
                        }               
                }
                else
                {
                        // if page isn't set, show first set of results
                        $start = 0;
                        $end = $per_page;  
                }                
                echo "<h1 style='font-size:24px; color:#805422;'>Current Order Details</h1><br />";
                // display data in table
                echo "<table id='rounded-corner'>";
                echo "<tr><th>User Id</th><th>Service Id</th><th>Service Name</th><th>Service Placed</th><th>Schedule</th><th>Cost</th><th>service_loaction</th><th>card number</th><th>expiry date</th><th>customer address</th><th>payment status</th><th></th><th></th><th></th></tr>";
        
                // loop through results of database query, displaying them in the table 
                for ($i = $start; $i < $end; $i++)
                {
				
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) { break; }
                
                        // echo out the contents of each row into a table
                        echo "<tr>";
						echo '<td>' . mysql_result($result, $i, 'user_id') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'service_id') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_name') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_date') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_schedule') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_cost') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'service_location') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'card_number') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'card_expiry_date') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'user_address') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'status') . '</td>';
                        echo '<td><a href="edit_record.php?user_id=' . mysql_result($result, $i, 'user_id') . '&service_id='.mysql_result($result, $i, 'service_id').'"><img src=images/update.png alt=edit width=25 height=25 /></a></td>';
			?>		
            	 <form name="myform" id="myform" method="post">
                    <?php    echo '<td><a onclick="my_alert(); return false;" href="delete.php?user_id=' . mysql_result($result, $i, 'user_id') .'&service_id='.mysql_result($result, $i, 'service_id').'"><img src=images/remove2.png width=25 height=25 /></a></td>';?>
                  </form>     
            <?php
			            echo '<td><a href="checkout.php?user_id=' . mysql_result($result, $i, 'user_id') . '&service_id=' . mysql_result($result, $i, 'service_id') . '"><img src=images/charge.png width=25 height=25 /></a></td>';
                        echo "</tr>"; 
                }
                // close table>
                echo "</table><br />"; 
         	?>         
		<div style="text-align:center;">
			<?php
                    // pagination
                    echo "<b style='color:#805422;'>Pages :</b> ";
                     for ($i = 1; $i <= $total_pages; $i++)
                    {	                        
                        echo "<a href='dashboard.php?page=$i'><b style='color:#805422;word-spacing:5px;'>$i</b></a> ";
                    }
                    echo "</p>";
            ?>   
       </div>             
		</div>              
            <?php include("footer.php"); ?>
		</div> 
        
    </body>
</html>
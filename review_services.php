<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />     
        <title>Admin | Review Services</title>
        <link rel="stylesheet" href="styles/apollo.css" type="text/css" /> 
        
            <script type="text/javascript">
			
				function my_alert()
				{
				  var where_to= confirm("Do you really want to delete it??");
				  if (where_to== true) {
					this.submit();
				  } else {
					//stay here!!!!!
					window.location="review_services.php";
					return false;
				  }
				}
			</script>
    </head>
    <body>
        <div id="wrap">
        	<!--Header for the page-->
           <?php include ("header.php"); ?>
       	<div class="container">
            	
			<?php 
				//connect to DB
                include('connect-db.php');
                $per_page = 4;
				//getting service data from service_description table
				$query = "select * from service_description LIMIT 0, 30 ";
                $result = mysql_query($query);
                $total_results = mysql_num_rows($result);
                $total_pages = ceil($total_results / $per_page);
                if (isset($_GET['page']) && is_numeric($_GET['page']))
                {
                        $show_page = $_GET['page'];
                        if ($show_page > 0 && $show_page <= $total_pages)
                        {
                           $start = ($show_page -1) * $per_page;
                           $end = $start + $per_page; 
                        }
                        else
                        {
                           $start = 0;
                           $end = $per_page; 
                        }               
                }
                else
                {
                        $start = 0;
                        $end = $per_page;
                }                
                echo "<h1 style='font-size:24px; color:#805422;'>Review Services</h1><br />";
                echo "<table id='rounded-corner'>";
                echo "<tr><th>Id</th><th>Name</th><th>cost</th><th>Image url</th><th>Description</th><th>video url</th><th>average Time</th><th>Technician</th><th></th><th></th></tr>";
                for ($i = $start; $i < $end; $i++)
                {
                        if ($i == $total_results) { break; }
                        echo "<tr>";
						echo '<td>' . mysql_result($result, $i, 'service_id') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'service_name') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'service_cost') . '</td>';
						echo '<td>' .'<input type="text" value="'.mysql_result($result, $i, 'service_image').'" disabled="disabled" style="width:85px; background: #e9d7c2; border:0px;" />' . '</td>';
						echo '<td>' .'<input type="text" value="'.mysql_result($result, $i, 'service_description').'" disabled="disabled" style="width:85px; background: #e9d7c2; border:0px;" />' . '</td>';
						echo '<td>' .'<input type="text" value="'.mysql_result($result, $i, 'service_video_url').'" disabled="disabled" style="width:85px; background: #e9d7c2; border:0px;" />' . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_avg_time') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'service_technician') . '</td>';
						echo '<td><a href="edit_service.php?service_id=' . mysql_result($result, $i, 'service_id') . '"><img src=images/update.png alt=edit width=25 height=25 /></a></td>';
                    ?>
				   <form name="myform" id="myform" method="post">
                   <?php echo '<td><a onclick="my_alert(); return false;" href="delete_service.php?service_id=' . mysql_result($result, $i, 'service_id') . '"><img src=images/remove2.png width=25 height=25 /></a></td>';?></form>
                        <?php
                        echo "</tr>"; 
                }
                echo "</table><br />"; 
         	?>         
		<div style="text-align:center;">
			<?php
                    echo "<b style='color:#805422;'>Pages :</b> ";
                     for ($i = 1; $i <= $total_pages; $i++)
                    {	                        
                        echo "<a href='review_services.php?page=$i'><b style='color:#805422;word-spacing:5px;'>$i</b></a> ";
                    }
                    echo "</p>";
            ?>   
       </div>  
		</div>   
        	<!--Footer for the page-->           
            <?php include("footer.php"); ?>
		</div> 
       
    </body>
</html>
        <?php
            
              // connect to the database
              include('connect-db.php');
             
             // check if the 'id' variable is set in URL, and check that it is valid
             if (isset($_REQUEST['service_id']) && is_numeric($_REQUEST['service_id']))
             {            
                 $service_id = $_REQUEST['service_id'];               
                 $result = mysql_query("DELETE FROM service_description WHERE service_id='$service_id'")
                 or die(mysql_error());                  
                 echo "<script>window.location.href = 'review_services.php'</script>";
             }
             else
             {
                  echo "<script>window.location.href = 'review_services.php'</script>";
             }
             
            ?>
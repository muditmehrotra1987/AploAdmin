<!--Login page-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/apollo.css" type="text/css" />
    <title>Admin | Login</title>
     <script>	 
		function formValidation()
		{			
			var x = document.forms["myform"]["username"].value;		
			if(x==null || x=="")
			{
				alert("Username Can't be blank");
				return false;
			}
			
			var x = document.forms["myform"]["password"].value;		
			if(x==null || x=="")
			{
				alert("Password can't be blank");
				return false;
			}			
		}		
    </script>     
    </head>
    
    <body>
              <div id="wrap">
                    <div id="login-banner">                    
                        <img src="images/logoAdmin copy.png" width="1024px"   />                      
                        
                        <div class="formholder">
                                <div id="login-form">
                                    <h1 style="color:#FFFFFF; margin: 0 0 0 5px; font-weight:bold; font-size:medium;">Admin Login!</h1>
                                    <div style="margin:0 0 0 70px;">  
                                                                                                          
                                    	 <form id="frm1" name="myform" method="post" action="login.php" onsubmit="return formValidation()">
                                           <table>
                                           		<tr>
                                                	<td><span style='font-weight:lighter;font-size:12px;'>Username*</span></td>
                                                    <td><input type="text" name="username" /></td>
                                                </tr>
                                                <tr>
                                                	<td><span style='font-weight:lighter;font-size:12px;'>Password*</span></td>
                                                    <td><input type="password" name="password" /></td>
                                                </tr>
                                                <tr>
                                                	<td></td>
                                                    <td style="text-align:right;"><span style='font-weight:lighter;font-size:12px;'><a href="forgot_password.php" style='font-weight:lighter;font-size:12px;'>Forgot your password?</a></span></td>
                                                </tr>
                                                <tr>
                                                	<td></td>
                                                    <td><input type="submit" value="LogIn" class="button orange" style="margin:10px 0 0 140px;" /></td>
                                                </tr>
                                           </table>
                                       	 </form>  
                                                               
                                    </div>
                                </div>
                                <div id="login-footer">
                        			<p style="margin:25px 0 0 0;">&copy; All rights reserved.</p>
                        		</div> 
                         </div>
                        
                    </div>
              </div>
    </body>
</html>
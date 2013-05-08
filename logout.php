<?php 
//Logout page
	@session_start();
	if($_SESSION['text'] == " " || !isset($_SESSION['text']))
	{
		echo "<script>window.location.href = 'index.php'</script>";
	}
	else
	{
		session_destroy();
		echo "<script>window.location.href = 'index.php'</script>";
		exit;
	}

?>

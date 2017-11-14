<?php
include('connect.php');
	if (isset($_GET['id']))
	{
	
		$comment_id = $_GET['id'];
		
		mysqli_query($con, "DELETE FROM photos WHERE photo_id='$comment_id'");
		header("location: photos.php");
		exit();
		
		mysqli_close($con);
	}
?>
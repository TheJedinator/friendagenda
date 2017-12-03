<?php
require ("connect.php");
$comment_id = $_GET['comment_id'];
	$sql = "DELETE from comment where comment_id = $comment_id";
	$result = mysqli_query($con, $sql);
	if ($result > 0){
		echo "<script> alert('Comment deleted') </script>";
		header("Location: profile.php");
	}
?>
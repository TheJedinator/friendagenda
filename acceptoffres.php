<?php
	require_once('session.php');
include('connect.php');
	$member_id = $_SESSION['SESS_MEMBER_ID'];
	$friend_id = $_GET["id"];
	$sql_update = "UPDATE friends set status='conf' WHERE member_id=$friend_id AND friends_with=$member_id";
	$result = mysqli_query($con, $sql_update);
?>
<html>
<body>
<?php
//Phase #6 - Show the user some kind of confirmation message to let them know they have been successfully added.
			if ($result > 0){
			echo "<script> alert('Friend has been confirmed.') </script>";
		}
		else {
			echo "<script> alert('FAILED') </script>";
		}
		
	?>
</body>
</html>
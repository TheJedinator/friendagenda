<?php
	require_once('session.php');
include('connect.php');
$member_id = $_SESSION['SESS_MEMBER_ID'];
$friend_id = $_GET["id"];
//PHASE #6 - some starting code for you
$result = mysqli_query($con, "INSERT INTO friends(member_id,status,friends_with) VALUES($member_id, 'unconf', $friend_id) "); //or die(mysql_error());
echo "<script>alert(".mysqli_error."); </script>";
?>
<html>
<body>
<div class="facebox">
<?php
	
	//Phase #6 - query the members table to get the details of the user and then display those details to the user with a message, something like "Your friend request has been sent, just wait for the confirmation"
		
		if ($result <= 0){
			$_SESSION['requestmessage'] = "Friend Request failed, please try again";
			echo "<script> alert('Friend Request failed, please try again') </script>";
			header("Location: profile.php");
			
		}
		else {
			$_SESSION['requestmessage'] = "You friend request has been sent. Please wait for confirmation";
			echo "<script> alert('You friend request has been sent. Please wait for confirmation') </script>";
			header("Location: profile.php");
		}
?>
</div>
</body>
</html>
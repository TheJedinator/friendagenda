<?php
	require_once('session.php');
include('connect.php');

//PHASE #6 - some starting code for you
//mysqli_query($con, "INSERT INTO //friends(member_id,datetime,status,friends_with) VALUES() ")or //die(mysql_error());

?>
<html>
<body>
<div class="facebox">
<?php
	$member_id = $_SESSION['SESS_MEMBER_ID'];
	//Phase #6 - query the members table to get the details of the user and then display those details to the user with a message, something like "Your friend request has been sent, just wait for the confirmation"
		
?>
</div>
</body>
</html>
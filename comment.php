<?php
	require_once('session.php');
include('connect.php');
$posterID = $_POST['poster'];
if (isset($_POST['memberid']) && $_POST['memberid'] != "") {
	$member_id = $_POST['memberid'];
}
else {
	$member_id = $posterID;
}
$message = $_POST['message'];
//$image = $_SESSION['image'];

$sql = "INSERT INTO comment (comment, member_id, poster_id) VALUES ('$message', '$member_id', '$posterID')";
$result = mysqli_query($con, $sql);
if ($posterID == $member_id){
	header("Location: profile.php");
}
else {
	header("Location: friendprofile.php?id=".$member_id);
}
// echo '<pre>';
// print_r($member_id);
// print_r($posterID);
// print_r(mysqli_error($con));
// echo '</pre>';
// exit;


?>
<html>
<body>
</div>
</body>
</html>
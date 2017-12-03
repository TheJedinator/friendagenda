<?php
	require_once('session.php');
include('connect.php');
$member_id = $_POST['poster'];
//$name = $_POST['name'];
//$lastname = $_POST['lastname'];
$message = $_POST['message'];
//$fullname = $name . " " . $lastname;
$image = $_SESSION['profileimage'];


//$sql = "INSERT INTO `postcomment`(`content`, `commentedby`, `pic`, `id`) VALUES ('$message', '$fullname', '$image', $member_id)";
//$SQL = "INSERT into postcomment SET(content, commentedby, pic, id) VALUES('$message', '$fullname', '$image', $member_id)";
$sql = "INSERT INTO comment (comment, member_id) VALUES ('$message', '$member_id')";
$result = mysqli_query($con, $sql);
header("Location: profile.php");
echo '<pre>';
print_r(mysqli_error($con));
echo '</pre>';
exit;


?>
<html>
<body>
<?php
	
?>
</div>
</body>
</html>
<?php
//this line turns on output buffering. If you don't use OB, you will get all kinds of errors when trying to redirect the user.
ob_start();
include('session.php');
include('connect.php');
?>


<html>
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose;
// -->
</script>
<head><title>Edit Picture</title></head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
	<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="css/example.css" media="screen" rel="stylesheet" type="text/css" />
			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
			<script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
  	closeImage   : " ../src/closelabel.png"
})
</script>

<link href="css/home.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
-->
</style>
<body>
<div class="main">
<div class="lefttop1">
  <div class="lefttopleft"><img src="img/logo.png" width="150" height="40" /></div>
   <div class="propic">
	<?php
$id= $_SESSION['SESS_MEMBER_ID'];
$image=mysqli_query($con, "SELECT * FROM members WHERE member_id='$id'");
			$row=mysqli_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
			echo '</div>';

?>
</div>
<ul id="sddm1">
	<li><a href="editpic.php"><img src="img/pencil.png" width="17" height="17" border="0" /> &nbsp;Change Picture</a>
	</li>
	<li><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
	</li>
	<li><a href="info.php"><img src="img/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
	</li>
<li><a href="photos.php"><img src="img/photos.png" width="16" height="12" border="0" /> &nbsp;Photos(<?php
$result = mysqli_query($con, "SELECT * FROM photos WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");

	$numberOfRows = mysqli_num_rows($result);

	echo '<font color="red">' . $numberOfRows . '</font>';
	?>)	</a>
	</li>
	<li><a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request
	(<?php

					$member_id=$_SESSION['SESS_MEMBER_ID'];
					$count=mysqli_query($con, "SELECT * FROM friends WHERE friends_with='$member_id' AND status='unconf'") or die(mysql_error());
					$numberOFRows=mysqli_num_rows($count);
					echo '<font color="red">'.$numberOFRows.'</font>';?>)
					</a>
	</li>
	<li><a href=""><img src="img/m.png" width="16" height="12" border="0" /> &nbsp;Message&nbsp(<?php
$result = mysqli_query($con, "SELECT * FROM messages WHERE receiver='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY receiver ASC");

	$numberOfRows = mysqli_num_rows($result);
	echo '<font color="red">' . $numberOfRows. '</font>';
	?>)
	</a>
	</li>

	<li><hr width="150"></li>
	<li>
	</ul>
	<div class="friend">
	<ul id="sddm1">
	<li><a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends

	(<?php


$result = mysqli_query($con, "SELECT * FROM friends WHERE friends_with='".$_SESSION['SESS_MEMBER_ID'] ."' and status='conf'");

	$numberOfRows = mysqli_num_rows($result);
	echo '<font color="Red">' . $numberOfRows. '</font>';
	?>)
	</a>
	</li>
	</ul>
	<ul id="sddm1">
  <?php


		$member_id=$_SESSION['SESS_MEMBER_ID'];
		$post = mysqli_query($con, "SELECT * FROM friends WHERE friends_with = '$member_id' AND status = 'conf' ")or die(mysql_error());

		$num_rows  =mysqli_num_rows($post);

		if ($num_rows != 0 ){

			while($row = mysqli_fetch_array($post)){

				$myfriend = $row['member_id'];
				$member_id=$_SESSION['SESS_MEMBER_ID'];

				if($myfriend == $member_id){

					$myfriend1 = $row['friends_with'];
					$friends = mysqli_query($con, "SELECT * FROM members WHERE member_id = '$myfriend1'")or die(mysql_error());
					$friendsa = mysqli_fetch_array($friends);

					echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';

				}else{

					$friends = mysqli_query($con, "SELECT * FROM members WHERE member_id = '$myfriend'")or die(mysql_error());
					$friendsa = mysqli_fetch_array($friends);

				echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';

				}
			}
			}else{
				echo 'You don\'t have friends </li>';
			}
		?>
		</ul>
		<ul id="sddm1">
		<li><hr width="150"></li>
		</ul>
</div>
  </div>
  <div class="righttop1">
  <?php include('searchForm.php'); ?>
    <div class="nav">
      <ul id="sddm">
        <li><a href="profile.php" ><?php


$result = mysqli_query($con, "SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row = mysqli_fetch_array($result))
  {
  echo "<img width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
echo"  ";
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }

?></a></li>
      <li><a href="Home.php">Home</a></li>
               <li><a  href="#"onmouseover="mopen('m5')" onmouseout="mclosetime()">Account</a>
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>

		<a href="logout.php"><font size="2" class="font1">Logout</font></a>
        </li>
      </ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>

  </div>

<div class="right">
	<div class="rightright">

	 </div>

	   <div class="shout">

<div class="information">

</div>
</div>
<div class="shoutout">

		<div  class="back"><h4><class="p"><div></h4></div>
		</br>
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="pic" value="Submit Pic">
            <br><br>
            <input type="submit" name="submit" value="Save">
        </form>
		<?php
       //** PHASE 3.13 - THIS IS WHERE YOU WILL PUT THE FORM TO UPLOAD THE profile pic
	   //SOURCE: http://www.learningaboutelectronics.com/Articles/How-to-restrict-the-size-of-a-file-upload-with-PHP.php
$id= $_SESSION['SESS_MEMBER_ID'];
$user= $_SESSION['SESS_FIRST_NAME'];



if (isset($_FILES['pic'])){
	include ('photoClass.php');
    $name= $_FILES['pic']['name'];
    $tmp_name= $_FILES['pic']['tmp_name'];
    $size= $_FILES['pic']['size'];
    $path= "Upload/";
    $type = $_FILES['pic']['type'];
    $p = new Photo();
    $p->setMemberid($_SESSION['SESS_MEMBER_ID']);
    $p->setProfPic($con, $name, $tmp_name, $size, $path, $type);
    if ($p->setProfPic($con, $name, $tmp_name, $size, $path, $type) == "Profile Image Updated!"){
    	header('location:home.php');
    }
    else {
    	echo $p->setProfPic($con, $name, $tmp_name, $size, $path, $type);
    }
}

?>
    </div>
    </div>

    </div>
    </div>

    <?php

//******Phase 3 - V3.13 you must catch the value of the form post here
// you must also check the file size to make sure it's not too big
//you must show the user a friendly error is the file is too large or the file doesn't upload correctly
//if the file is valid, you must move the uploaded file to the "uploaded" directory and update the members table in your database to have the correct image
//




?>

</body>

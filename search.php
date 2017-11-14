<?php
	require_once('session.php');
	include('connect.php');
	//include("function.php");
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
<head><title>search</title></head>

<link href="css/home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/icon.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>
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

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();

   });
      });
   </script>
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
-->
</style>
</body>
<div id="shadow" class="popup"></div>

  <div class="lefttop1">
  <div class="lefttopleft"><img src="img/logo.png" width="150" height="40" /></div>
   <div class="propic">
	<?php
//get the member id of the current user from the session
$id= $_SESSION['SESS_MEMBER_ID'];
//display the profile pic of the current user
$image=mysqli_query($con, "SELECT * FROM members WHERE member_id='$id'");
			$row=mysqli_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'>";
			echo '</div>';
?>
</div>

  </div>
  <div class="righttop1">
<?php include('searchForm.php')?>
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
} //end while

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

<div class="shoutout">

		  <div  class="bgg"><h3 id="h2">&nbsp;Search Result</h3></div>
		</br>
<script> 
	function addFriend(){
		location.href = "addfriend.php";
	}
</script>		
<?php

		if(isset($_POST['search'])){
			//Phase #5 - V5.1 -you must write a query that will get a list of members that contain the search string.
      //Assign the search criteria from the post to a variable
      $criteria = $_POST['search'];
      //create a search string
      $searchString = "SELECT FirstName, LastName, profImage from members WHERE LOWER(FirstName) LIKE '%".$criteria."%' OR LOWER(LastName) LIKE '%".$criteria."%';";
      // Query the DB and store the result set 
      $result = mysqli_query($con, $searchString);
      //Loop through the result set and put it into an array if image is null assign the generic image.
      while($array = mysqli_fetch_array($result)){
        $image = "";
        if ($array[2] == ''){
          $image = "Upload/photo.jpg";
        }
        else {
          $image = $array[2];
        }
        //Displays the picture, name and a link to add as friend. 
        echo "<img width=90 height=75 alt='Unable to View' src='" . $image . "'>" . "  <b>" .
        $array[0] . "  " . $array[1] . "</b>  " . "<BR>" .
        "<a href=\"addFriend.php\"><img src=\"img/friends.png\" width=\"16\" height=\"12\" border=\"0\" /> &nbsp;Send Friend Request"
         ."<BR><BR>";
      }
	}
?>

	</div>
</body>
</html>

<?php
//this line turns on output buffering. If you don't use OB, you will get all kinds of errors when trying to redirect the user.
ob_start();
//"require" is exactly the same as include except require will throw and stop running the script, whereas include will only issue a warning and continue trying to run the script.
require('session.php');
include('memberClass.php');
include('header.php');
include('validateAddress.php');

//Session variable used to handle error messages displayed.
if (isset($_SESSION['edit_profile_message'])) {
    echo "<script>alert('".$_SESSION['edit_profile_message']."')</script>";
    unset($_SESSION['edit_profile_message']);
}
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
<head><title>Profile</title></head>

<link href="css/info.css" rel="stylesheet" type="text/css" />
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/icon.png" type="image" />
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
function validateForm() {
        //Make date information
        var today = new Date();
        var day = today.getDate();
        var currentMonth = today.getMonth() + 1;
        var currentYear = today.getFullYear();
        // Current date formatted MM/DD/YYYY
        var dateString = currentMonth + "/" + day + "/" + currentYear;

        //Regular expressions
        var lettersonly = new RegExp(/^|[a-z ,.'-]+$/i);
        var noSpecial = new RegExp(/^[a-z0-9]+$/i);
        var phoneCheck = new RegExp(/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/);
        var postRegEx = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i);
        //Variables
        var lname = document.getElementById('last').value;
        var fname = document.getElementById('first').value;
        var login = document.getElementById('un').value;
        var address = document.getElementById('address').value;
        var province = document.getElementById('province').value;
        var post_code= document.getElementById('postal').value;
        var number = document.getElementById('cnumber').value;
        var email = document.getElementById('email').value;
        var gender = document.getElementById('gender').value;
        var interested = document.getElementById('interestedin').value;
        var city = document.getElementById('city').value;
        var hometown = document.getElementById('hometown').value;
        var language = document.getElementById('language').value;
        var bday = document.getElementById('month').value;
        var college = document.getElementById('college').value;
        var highschool = document.getElementById('highschool').value;
        var experiences = document.getElementById('experiences').value;
        var about = document.getElementById('about').value;

        //birthday year only
        var bdayYear = parseInt(bday.substring(bday.lastIndexOf("/") + 1));


        // Checks for passwords matchings, Username has no specials, Name fields only contain letters ' -
        // Checks phone to be north american format
        // checks date is parseable
        // checks date is less than today if not gives funny message about being from the future
        // checks bday is older than 18
        // Date field is set to read only in HTML but jQuery can still edit it so limits the input to be format expected
        if (gender == "Select") {
            alert("Please select a Gender");
            return false;
        }
        else if (!(lettersonly.test(fname))){
            alert("First Name must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(lname))){
            alert("Last Name must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(noSpecial.test(login))){
            alert("Username cannot contain special characters")
            return false;
        }
        else if (province == ""){
          alert("Please select a province!");
          return false;
        }
        // else if (!postRegEx.test(post_code)){
        //      alert("Postal code must be formatted A1A 1A1 or a1a1a1")
        //     return false;
        //}
        else if (!(phoneCheck.test(number)) || number.length < 10 || number.length > 12 ){
            alert("Phone number must be formatted as XXX-XXX-XXXX")
            return false;
        }
        else if (!(Date.parse(bday))){
            alert("incorrect date format mm/dd/yyyy");
            return false;
        }
        else if (Date.parse(bday) > today){
            alert("You have not yet been born......please try again and modify birthday!");
            return false;
        }
        else if (bdayYear > (currentYear - 18)){
            alert("Must be 18!");
            return false;
        }
        else if (!(lettersonly.test(city))){
            alert("City must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(hometown))){
            alert("Hometown must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(college))){
            alert("College must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(highschool))){
            alert("High-School must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(experiences))){
            alert("Experiences must only contain letters, hyphens, apostrophes.");
            return false;
        }
        else if (!(lettersonly.test(about))){
            alert("About must only contain letters, hyphens, apostrophes.");
            document.getElementById('about').focus();
            return false;
        }
        else {
            return true;
        }
    }
</script>

<script type="text/javascript" src="js/jquery.js"></script>
<!--datepicker -->
<link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
<!--datepicker -->
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$(".date").datepicker();
});
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
    <body>
.style1 {font-weight: bold}
-->
</style>
<div class="main">
<div id="shadow" class="popup"></div>
<div class="lefttop1">
  <div class="lefttopleft"><img src="img/logo.png" width="150" height="40" /></div>
   <div class="propic">
    <?php
    include('connect.php');
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
    ?>) </a>
    </li>
    <li><a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request
    (<?php

                    $member_id=$_SESSION['SESS_MEMBER_ID'];
                    $seeall=mysqli_query($con, "SELECT * FROM friends WHERE friends_with='$member_id' AND status='unconf'") or die(mysql_error());
                    $numberOFRows=mysqli_num_rows($seeall);
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
$result = mysqli_query($con, "SELECT * FROM friends WHERE  friends_with = '$id' and  member_id!= '$id' and status = 'conf'    OR member_id = '$id' and friends_with != '$id' and status = 'conf' ");
    $numberOfRows = mysqli_num_rows($result);
    echo '<font color="Red">' . $numberOfRows. '</font>';
    ?>)
    </a>
    </li>
    </ul>
    <ul id="sddm1">
    <?php
    $member_id=$_SESSION['SESS_MEMBER_ID'];
    $post = mysqli_query($con, "SELECT * FROM friends WHERE   friends_with = '$id' and  member_id!= '$id' and status = 'conf'    OR member_id = '$id' and friends_with != '$id' and status = 'conf'  ")or die(mysql_error());

    $num_rows  =mysqli_num_rows($post);

    if ($num_rows != 0) {
        //we found at least 1 friend record in the database
        while ($row = mysqli_fetch_array($post)) {
            $myfriend = $row['member_id'];
            $member_id=$_SESSION['SESS_MEMBER_ID'];

            if ($myfriend == $member_id) {
                $myfriend1 = $row['friends_with'];
                $friends = mysqli_query($con, "SELECT * FROM members WHERE member_id = '$myfriend1'")or die(mysql_error());
                $friendsa = mysqli_fetch_array($friends);

                echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
            } else {
                $friends = mysqli_query($con, "SELECT * FROM members WHERE member_id = '$myfriend'")or die(mysql_error());
                $friendsa = mysqli_fetch_array($friends);

                echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
            }
        }//end while
    } else {
        echo '<li>You don\'t have friends </li>';
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
        while ($row = mysqli_fetch_array($result)) {
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
              <!-- DELETED an </a> tag here -->
        <a href="logout.php"><font size="2" class="font1">Logout</font></a>
        </li>
      </ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  </div>
  </div>
  <div class="right">

<div class="shoutout">
<div class="ball">

       <div class="shout">
<h2><div class="color"><?php
$result = mysqli_query($con, "SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while ($row = mysqli_fetch_array($result)) {
    echo $row["FirstName"];
    echo"  ";
    echo $row["LastName"];
}
?>
</div>
</h2>

</div>
</div>
<form method="post" action="">
 <input name="userid" type="hidden"  value=" <?php echo $_SESSION['SESS_MEMBER_ID'];?>" />

<?php
//phase #3 - write the code here that will dynamically draw the HTML form to edit a profile. It must populate with all the users data from the database, NO hardcoded values.

//Implemented in Phase4 Instantiate a user object and populate the variables that were already in place with the
//object attributes

    $user = new Member();
    $user = $user->getMember($con, $_SESSION['SESS_MEMBER_ID']);
    $un = $user->getUsername();
		$email = $user->getEmail();
		$province = $user->getProvince();
?>

<!-- The form below uses php variables obtained from the DB query to populate the values of the form -->
    <form method="post" action="">

    <table>
        <tr>
            <td><label for="username"> User Name: </label></td>
            <td><input type="text" name="username" id="un" class="textright" value= "<?php echo $user->getUsername(); ?>" required maxlength=20/> <br></td>
        <tr>
            <td><label for="firstname"> First Name: </label></td>
            <td><input type="text" name="firstname" id="first" class="textright" value= "<?php echo $user->getFirstName(); ?>"required maxlength=30/> <br></td>
        </tr>
        <tr>
            <td><label for="lastname"> Last Name: </label></td>
            <td><input type="text" name="lastname" id="last" class="textright" value= "<?php echo $user->getLastName(); ?>"required maxlength=30/><br></td>
        </tr>
        <tr>
            <td><label for="address"> Address: </label> </td>
            <td><input type="text" name="address" id="address" class="textright" value= "<?php echo $user->getAddress(); ?>" maxlength=100 required/><br></td>
        </tr>
        <tr>
        <td><label for="province"> Province: </label></td>
        <td>
        <select name="province" id="province" class=textfield1" required>
      <option value="" <?php if ($province == null) { echo 'selected = "selected"';}?>> Select </option>
    	<option value="AB" <?php if ($province == "AB") {echo 'selected = "selected"';}?>> AB </option>
      <option value="BC" <?php if ($province == "BC") {echo 'selected = "selected"';}?>> BC </option>
      <option value="MB" <?php if ($province == "MB") {echo 'selected = "selected"';}?>> MB </option>
      <option value="NB" <?php if ($province == "NB") {echo 'selected = "selected"';}?>> NB </option>
      <option value="NL" <?php if ($province == "NL") {echo 'selected = "selected"';}?>> NL </option>
      <option value="NS" <?php if ($province == "NS") {echo 'selected = "selected"';}?>> NS </option>
      <option value="ON" <?php if ($province == "ON") {echo 'selected = "selected"';}?>> ON </option>
      <option value="PE" <?php if ($province == "PE") {echo 'selected = "selected"';}?>> PE </option>
      <option value="QC" <?php if ($province == "QC") {echo 'selected = "selected"';}?>> QC </option>
      <option value="SK" <?php if ($province == "SK") {echo 'selected = "selected"';}?>> SK </option>
      <option value="NW" <?php if ($province == "NW") {echo 'selected = "selected"';}?>> NW </option>
    	<option value="NT" <?php if ($province == "NT") {echo 'selected = "selected"';}?>> NT </option>
			<option value="YK" <?php if ($province == "YK") {echo 'selected = "selected"';}?>> YK </option>
        </select>
        </td>
        </tr>
        <tr>
        <td> <label for="postal"> Postal Code: </label></td>
        <td> <input type="text" name="postal" id="postal" class="textright" value="<?php echo $user->getPostalCode(); ?>" required maxlength=7 /></td>
        </tr>
        <tr>
            <td><label for="phone"> Phone: </label> </td>
            <td><input type="phone" name="phone" id="cnumber" class="textright" value= "<?php echo $user->getPhone(); ?>"required maxlength=13 /><br></td>
        </tr>
        <tr>
            <td><label for="email"> e-Mail: </label></td>
            <td><input type="email" name="email" id="email" class="textright" value= "<?php echo $user->getEmail(); ?>"required/><br></td>
        </tr>
        <tr>
            <td><label for="birthday"> Birth Date: </label></td>
            <td><input type="text" name="birthday" id="month" class="date" readonly value= "<?php echo $user->getBday(); ?>"required/> <br></td>
        </tr>
        <tr>
        <td><label for="gender"> Gender: </label></td>
            <td><select name="gender" id="gender" class="textfield1" required>
                    <option value="Male"<?php if ($user->getGender() == "Male") {
                        echo ' selected="selected"';
} ?>>Male</option>
                    <option value="Female"<?php if ($user->getGender() == "Female") {
                        echo ' selected="selected"';
} ?>>Female</option>
            </select>
            </td>
        </tr>
        <tr>
            <td><label for="city"> Current City: </label></td>
            <td><input type="text" name="city" id="city" class="textright" value= "<?php echo $user->getCurrentCity(); ?>" maxlength=50/> <br></td>
        </tr>
        <tr>
            <td><label for="hometown"> Hometown: </label></td>
            <td><input type="text" name="hometown" id="hometown" class="textright" value= "<?php echo $user->getHomeTown(); ?>" maxlength=50/> <br></td>
        </tr>
        <tr>
            <td ><label for="interested"> Interested In: </label></td>
            <td><select name="interested" id="interestedin" class="textfield1" >
          <option value="Select"<?php if ($user->getInterestedIn() == "") {echo 'selected = "selected"';}?>>Select</option>
          <option value="Male"<?php if ($user->getInterestedIn() == "Male") {echo ' selected="selected"';} ?>>Male</option>
          <option value="Female"<?php if ($user->getInterestedIn() == "Female") {echo ' selected="selected"';} ?>>Female</option>
            </select>
            <br>
            </td>
        </tr>
        <tr>
            <td><label for="language"> Language: </label></td>
            <td><select name="language" id="language" class="textfield1" required>
                <option value=""<?php if ($user->getLanguage() == "") {
                    echo 'selected = "selected"';
}?>>Select</option>
                <option value="English"<?php if ($user->getLanguage() == "English") {
                    echo 'selected = "selected"';
}?>>English</option>
                <option value="French"<?php if ($user->getLanguage() == "French") {
                    echo 'selected = "selected"';
}?>>French</option>
                </select><br></td>
        </tr>
        <tr>
            <td><label for="college"> College: </label></td>
            <td><input type="text" name="college" id="college" class="textright" value= "<?php echo $user->getCollege(); ?>" maxlength=50/> <br></td>
        </tr>
        <tr>
            <td><label for="highschool"> High school: </label></td>
            <td><input type="text" name="highschool" id="highschool" class="textright" value= "<?php echo $user->getHighschool(); ?>" maxlength=50/>  <br></td>
        </tr>
        <tr>
            <td><label for="experiences"> Experiences: </label></td>
            <td><textarea name="experiences" id="experiences" maxlength="200" style="width: 350px; height: 100px;"><?php echo $user->getExperiences(); ?></textarea> <br></td>
        </tr>
        <tr>
            <td><label for="about"> About Me: </label></td>
            <td><textarea name="about" id="about" maxlength="200" style="width: 350px; height: 100px;" ><?php echo $user->getAbout(); ?></textarea> <br> </td>
        </tr>

    </table>
            <input type="submit" name="submit" onClick="return validateForm();" value="Save Changes" class="greenButton"/>
    </form>
    <a href="changepassword.php">Change Password</a>
<div class="ball">
</div>
<br>
    </div>

<?php
if (!empty($_POST)) {
    //PHASE #3 - if the user submits the form, you must write code here that will get all the values from the form post and save them to the database. You must do all the data validation here as well
//I admit is seems strange to redirect the user to the same page they are already on, but it is the quickest (and easiest) way for the user to see their changes.

    //Populate user
    $user->setFirstName($_POST['firstname']);
    $user->setLastName($_POST['lastname']);
    $user->setAddress($_POST['address']);
    //$user->setProvince($_POST['province']);
    $user->setPhone($_POST['phone']);
    $user->setGender($_POST['gender']);
    $user->setBday( $_POST['birthday']);
    $user->setCurrentCity($_POST['city']);
    $user->setHomeTown($_POST['hometown']);
    $user->setInterestedIn($_POST['interested']);
    $user->setLanguage($_POST['language']);
    $user->setCollege( $_POST['college']);
    $user->setHighschool($_POST['highschool']);
    $user->setAbout($_POST['about']);
    $user->setExperiences($_POST['experiences']);
    //Populate Variables.
    $email = $_POST['email'];
    $new_un =$_POST['username'];
    $postal_code = $_POST['postal'];
    $province = $_POST['province'];
        //CHECK FOR USERNAME OR EMAIL IN USE
        //UN OR EMAIL Variables
        $email_inuse= 0;
        $username_inuse = 0;
        $validAddress = 0;
//CHECK FOR USERNAME OR EMAIL IN USE
        if ($new_un <> $user->getUsername()){
            $sql = "SELECT * FROM members WHERE UserName = '".$new_un."'";
            if($result = mysqli_query($con, $sql)) {
                $username_inuse = mysqli_num_rows($result);
            }
        }
        if ($email <> $user->getEmail()){
            $sql = "SELECT * FROM members WHERE email = '".$email."'";
            if($result = mysqli_query($con, $sql)) {
                $email_inuse = mysqli_num_rows($result);
            }
        }
        if ($province != $user->getProvince() || $postal_code != $user->getPostalCode()){
            if (!valPostal($postal_code, $province)){
                $validAddress = 1;
            }
        }
//Display appropriate error for email or username already in use.
        if ($email_inuse > 0) {
            $_SESSION['edit_profile_message'] = "e-Mail already in use, please use a different address.";
            header('location:editprofile.php');
        }
        else if ($username_inuse > 0) {
            $_SESSION['edit_profile_message'] = "User name already in use, choose a different username.";
            header('location:editprofile.php');
        }
        else if ($validAddress > 0){
            $_SESSION['edit_profile_message'] = "Postal code and Province do not match. Please verify and try again.";
            header('location:editprofile.php');
        }
//Else call the savemember method of the MemberClass
        else {
            $user->setProvince($province);
            $user->setUsername($new_un);
            $user->setEmail($email);
            $user->setPostalCode($postal_code);
            $user->saveMember($con, $_SESSION['SESS_MEMBER_ID']);
        }
}

?>
</body>
</html>

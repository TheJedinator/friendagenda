<?php
//this line turns on output buffering. If you don't use OB, you will get all kinds of errors when trying to redirect the user.
ob_start();
//"require" is exactly the same as include except require will throw and stop running the script, whereas include will only issue a warning and continue trying to run the script.
require('session.php');
include('header.php');
include('memberClass.php')
//Session variable used to handle error messages displayed.
//if(isset($_SESSION['edit_profile_message'])) {
//echo "<script>alert('".$_SESSION['edit_profile_message']."')</script>";
//unset($_SESSION['edit_profile_message']);
//}
?>
    <html>
    <script type="text/javascript">
        <!--
        var timeout = 500;
        var closetimer = 0;
        var ddmenuitem = 0;

        // open hidden layer
        function mopen(id) {
            // cancel close timer
            mcancelclosetime();

            // close old layer
            if (ddmenuitem) ddmenuitem.style.visibility = 'hidden';

            // get new layer and show it
            ddmenuitem = document.getElementById(id);
            ddmenuitem.style.visibility = 'visible';

        }
        // close showed layer
        function mclose() {
            if (ddmenuitem) ddmenuitem.style.visibility = 'hidden';
        }

        // go close timer
        function mclosetime() {
            closetimer = window.setTimeout(mclose, timeout);
        }

        // cancel close timer
        function mcancelclosetime() {
            if (closetimer) {
                window.clearTimeout(closetimer);
                closetimer = null;
            }
        }

        // close layer when click-out
        document.onclick = mclose;
        // -->
    </script>


    <head>
        <script type="text/javascript">
            //validate passwords match
            function pwMatch() {
                //alert("in PW MATCH ")
                var newpass = document.getElementById("newPass1").value;
                var confirmnewpass = document.getElementById("newPass2").value;
                if (newpass != confirmnewpass) {
                    alert("New Password and Confirm New Password do not match.")
                    return false;
                } else {
                    return true;
                }
            }
        </script>
        <title>Profile</title>
    </head>

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
            closeImage: " ../src/closelabel.png"
        })
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <!--datepicker -->
    <link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
    <!--datepicker -->
    <script type="text/javascript" charset="utf-8">
        jQuery(function($) {
            $(".date").datepicker();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#shadow").fadeOut();

            $("#cancel_hide").click(function() {
                $("#").fadeOut("slow");
                $("#shadow").fadeOut();

            });
        });
    </script>
    <style type="text/css">
        <!-- body {
            background-image: url(images/New%20Picture.jpg);
            background-repeat: repeat-x;
        }

        <body> .style1 {
            font-weight: bold
        }
    </style>
    <div class="main">
        <div id="shadow" class="popup"></div>
        <div class="lefttop1">
            <div class="lefttopleft"><img src="img/logo.png" width="150" height="40" /></div>
            <div class="propic">
                <?php
include('connect.php');
$id= $_SESSION['SESS_MEMBER_ID'];
$image=mysqli_query($con,"SELECT * FROM members WHERE member_id='$id'");
$row=mysqli_fetch_assoc($image);
$_SESSION['image']= $row['profImage'];
echo '<div id="pic">';
echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
echo '</div>';

?>
            </div>
            <ul id="sddm1">
                <li>
                    <a href="editpic.php"><img src="img/pencil.png" width="17" height="17" border="0" /> &nbsp;Change Picture</a>
                </li>
                <li>
                    <a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
                </li>
                <li>
                    <a href="info.php"><img src="img/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
                </li>
                <li>
                    <a href="photos.php"><img src="img/photos.png" width="16" height="12" border="0" /> &nbsp;Photos(
                        <?php
$result = mysqli_query($con, "SELECT * FROM photos WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");

$numberOfRows = mysqli_num_rows($result);

echo '<font color="red">' . $numberOfRows . '</font>';
?>) </a>
                </li>
                <li>
                    <a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request (
                        <?php

$member_id=$_SESSION['SESS_MEMBER_ID'];
$seeall=mysqli_query($con, "SELECT * FROM friends WHERE friends_with='$member_id' AND status='unconf'") or die(mysql_error());
$numberOFRows=mysqli_num_rows($seeall);
echo '<font color="red">'.$numberOFRows.'</font>';?>)
                    </a>
                </li>
                <li>
                    <a href=""><img src="img/m.png" width="16" height="12" border="0" /> &nbsp;Message&nbsp(
                        <?php
$result = mysqli_query($con, "SELECT * FROM messages WHERE receiver='".$_SESSION['SESS_FIRST_NAME'] ."' and status='pending' ORDER BY receiver ASC");

$numberOfRows = mysqli_num_rows($result);
echo '<font color="red">' . $numberOfRows. '</font>';
?>)
                    </a>
                </li>

                <li>
                    <hr width="150">
                </li>
                <li>
            </ul>
            <div class="friend">
                <ul id="sddm1">
                    <li>
                        <a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends (

                            <?php
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

if ($num_rows != 0 ){
//we found at least 1 friend record in the database
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
}//end while
}else{
echo '<li>You don\'t have friends </li>';
}
?>
                </ul>

                <ul id="sddm1">
                    <li>
                        <hr width="150">
                    </li>
                </ul>
            </div>
        </div>
        <div class="righttop1">
              <?php include('searchForm.php'); ?>
            <div class="nav">
                <ul id="sddm">
                    <li><a href="profile.php"><?php


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
                    <li><a href="#" onmouseover="mopen('m5')" onmouseout="mclosetime()">Account</a>
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
while($row = mysqli_fetch_array($result))
{

echo $row["FirstName"];
echo"  ";
echo $row["LastName"];
}
?>
<br>
<br>
<form method="POST">
<table>
<tr>
<td> Current Password:</td>
<td> <input type="password" name="currentPassword" id="currentpassword" required minlength="8" maxlength="32"> </td>
</tr>
<tr>
<td> New Password: </td>
<td> <input type="password" name="newPass1" id="newPass1" required minlength="8" maxlength="32"> </td>
</tr>
<tr>
<td> Confirm New Password: </td>
<td> <input type="password" name="newPass2" id="newPass2" required minlength="8" maxlength="32"> </td>
</tr>
</form>
</table>
<input type="submit" name="submit" onClick="return pwMatch();" value="Submit">
<?php

if (isset($_POST['submit'])){
    $member = new Member();
    $member->getMember($con, $_SESSION['SESS_MEMBER_ID']);
    $retrievedPassword = $member->getPassword();
    //get variables from the post for the password form
    $cpw = $_POST['currentPassword'];
    $npw = $_POST['newPass1'];
    $confirmNew = $_POST['newPass2'];
    // if the current password matches what's in the DB continue
    if (password_verify($cpw, $retrievedPassword)){
         //Don't let them change the password to the same thing,
        $member->updatePassword($con, $npw, $cpw);
     }
    //If not the same as in DB alert incorrect PW
    else {
        echo "<script type='text/javascript'> alert('Password Incorrect'); </script>";
    }
}
?>
</div>
</h2>

                </div>
            </div>
            <form method="post" action="">
                <input name="userid" type="hidden" value=" <?php echo $_SESSION['SESS_MEMBER_ID'];?>" />
                </body>

    </html>

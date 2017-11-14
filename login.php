<?php include("connect.php");
include("memberClass.php");?>
    <?php
//Start session
session_start();
//Session variables
$_SESSION["SESS_FIRST_NAME"] = "";
$_SESSION["SESS_LAST_NAME"] = "";
$_SESSION["SESS_MEMBER_ID"] = "";
$_SESSION['login_error_message'] = "";


	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str, $con) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}

		return mysqli_real_escape_string($con, $str);
	}
	  // $db_name = "members";
		//Sanitize the POST values (username and password)
        if(isset($_POST['submit'])) {
            $vUsername = clean($_POST['UserName'], $con);
            $vPassword = clean($_POST['Password'], $con);
        }
	//query the DB to see if the correct user exists
        $member = new Member();
        
        $member->getMemberByName($con, $vUsername);


        if (($member->getUsername()) == ($vUsername)){

            //The lines below work in conjuction with errorlogin.php if an error needs to be displayed.
            //Because we are using the header function a JS alert cannot operate on the page it's coming from.
            //Password encryption using the built in PHP method
            //If verification = true then assign session variables and redirect to the home page
            //Else redirect to the error login screen
            if (password_verify($vPassword, $member->getPassword())){

                $_SESSION["SESS_FIRST_NAME"] = $member->getFirstName();
                $_SESSION["SESS_LAST_NAME"] = $member->getLastName();
                $_SESSION["SESS_MEMBER_ID"] = $member->getMemberid();
                
//echo '<pre>';
//print_r(var_dump($member->getMemberid()));
//echo '</pre>';
//exit;
                //redirect the user to home.php if they are successful
                header("Location: home.php");
            }
            else {

                //This is the part that checks the password, if not verified display related error and redirect to errorlogin.php
                $_SESSION['login_error_message'] = "Unable to verify password, please try again";
              header("Location: errorlogin.php");
            }

        }
        // If -1 or 0 returned from query send user to error login page because the user couldn't be found we display that error instead.
        else {

            //otherwise redirect the user to errorlogin.php
           $_SESSION['login_error_message'] = "Could not find user, Please try again";
            header("Location: errorlogin.php");
        }
?>

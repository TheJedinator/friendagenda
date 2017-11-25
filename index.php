<?php include('connect.php');
include('memberClass.php');
include('validateAddress.php');
?>
<?php
session_start();

if (!empty($_SESSION['SESS_MEMBER_ID'])){
        header("Location: home.php");
        die;
    }
if(isset($_SESSION['login_error_message'])) {
    echo "<script>alert('".$_SESSION['login_error_message']."')</script>";
    unset($_SESSION['login_error_message']);
}

if (isset($_POST['Submit'])) {
    //Instantiate and populate a member object
	$user = new Member();
	$user->setUsername($_POST['login']);
	$user->setFirstName($_POST['fname']);
	$user->setLastName($_POST['lname']);
	$user->setAddress($_POST['address']);
	//$user->setProvince($_POST['province']);
	//$user->setPostalCode($_POST['postal']);
	$user->setPhone($_POST['cnumber']);
	$user->setEmail($_POST['email']);
	$user->setGender($_POST['gender']);
	$user->setBday( $_POST['month']);
	$user->setPassword($_POST['cpassword']);

    $prov = $_POST['province'];
    $inValidPostal = $_POST['postal'];
//UN OR EMAIL Variables
        $email_inuse= 0;
        $username_inuse = 0;
//CHECK FOR USERNAME OR EMAIL IN USE
        $sql = "SELECT * FROM members WHERE UserName = '".$user->getUserName()."'";
        if($result = mysqli_query($con, $sql)) {
            $username_inuse = mysqli_num_rows($result);
        }
        $sql = "SELECT * FROM members WHERE email = '".$user->getEmail()."'";
        if($result = mysqli_query($con, $sql)) {
        		$email_inuse = mysqli_num_rows($result);
        }
        
//Display appropriate error for email or username already in use.
        if ($email_inuse > 0) {
            echo "<script> alert('e-Mail Address already in use.');</script>";
        }
        else if ($username_inuse > 0) {
            echo "<script> alert('User already exists');</script>";
        }
        else if(!valPostal($inValidPostal, $prov)){
            echo "<script> alert('Postal code and Province do not match, please verify and try again!');</script>";
        }
//Else call the Add new member method of the MemberClass, if it succeeds display success esle display failure
        else {
            $user->setPostalCode($inValidPostal);
            $user->setProvince($prov);
           $result = $user->AddNewMember($con);
           // echo mysqli_error($con);
            if ($result > 0){
                $newUserName = $user->getUsername();
                $_SESSION['login_error_message'] = "You have succesfully registered as: ". $newUserName;
                header("Location: home.php");
            }
            else{
                $_SESSION['login_error_message'] = "Registration Failed: ".mysqli_error($con);
                header("Location: home.php");
                
          }
    }
}
echo mysqli_error($con);
?>
        <script type=text/javascript>
            function validateForm() {
                var lettersonly = new RegExp(/^[a-z ,.'-]+$/i);
                var noSpecial = new RegExp(/^[a-z0-9]+$/i);
                var phoneCheck = new RegExp(/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/);
                var today = new Date();
				//var postRegEx = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i);

                //Make date information
                var day = today.getDate();
                var currentMonth = today.getMonth() + 1;
                var currentYear = today.getFullYear();

                // Current date formatted MM/DD/YYYY
                var dateString = currentMonth + "/" + day + "/" + currentYear;

                var lname = document.getElementById('last').value;
                var fname = document.getElementById('first').value;
                var login = document.getElementById('un').value;
                var password = document.getElementById('pw').value;
                var cpassword = document.getElementById('confirmpw').value;
                var address = document.getElementById('address').value;
                var number = document.getElementById('cnumber').value;
                var email = document.getElementById('email').value;
                var gender = document.getElementById('gender').value;
                var bday = document.getElementById('month').value;
				var vPostal = document.getElementById('postal').value;
				var province = document.getElementById('province').value;
                var bdayYear = parseInt(bday.substring(bday.lastIndexOf("/") + 1));


                // Checks for passwords matchings, Username has no specials, Name fields only contain letters ' -
                // Checks phone to be north american format
                // checks date is parseable
                // checks date is less than today if not gives funny message about being from the future
                // checks bday is older than 18
                // Date field is set to read only in HTML but jQuery can still edit it so limits the input to be format expected
                if (password != cpassword) {
                    alert("Password Mismatch Try again");
                    return false;
				}
				else if (province == ""){
					 alert("Please select a Province");
                    return false;
				}
                else if (gender == "Select") {
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
				// else if (!postRegEx.test(vPostal)){
				// 	alert("Postal code must match A1A 1A1 or A1A1A1");
				// 	return false;
				// }
                else if (!(phoneCheck.test(number))){
                    alert("Phone number must be formatted as XXX-XXX-XXXX")
                    return false;
                }
                else if (!(Date.parse(bday))){
                    alert("incorrect date format mm/dd/yyyy");
                    return false;
                }
                else if (Date.parse(bday) > today){
                    alert("Apparently you have not been born yet. See you in the future!");
                    return false;
                }
                else if (bdayYear > (currentYear - 18)){
                    alert("You must be 18 to register");
                    return false;
                }
                else {
                    return true;
                }
            }
        </script>


        <html>

        <head>
            <title>Friend Agenda (JP)</title>
            <link rel="shortcut icon" href="/favicon.ico">
        </head>
        <meta name="description" content="Friend Agenda, Make internet memories!" />
        <meta name="author" content="Jed Palmater, jed@palmater.ca" />
        <style type="text/css">
            <!-- body {
                background-image: url(bg/bg3.jpg);
                background-repeat: repeat-x;
                background-color: #d9deeb;
            }

            -->
        </style>
        <link href="css/index.css" rel="stylesheet" type="text/css" />
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


        <script>
            !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
        </script>
        <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript">
            $(document).ready(function() {

                $("a#example2").fancybox({
                    'overlayShow': false,
                    'transitionIn': 'elastic',
                    'transitionOut': 'elastic'
                });

                $("a[rel=example_group]").fancybox({
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'titlePosition': 'over',
                    'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
                        return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                    }
                });
            });
        </script>

        <script type="text/javascript" src="js/jquery.js"></script>
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

        <body>
            <div class="mainr">
                <div class="topleft"> <img src="img/logo.png" width="200" height="60" /></a>
                </div>
                <form action="login.php" method="post">

                    <div class="qwerty">
                        <div class="label">
                            <div class="email style1">&nbsp;UserName</div>
                            <div class="password">&nbsp;&nbsp;Password</div>
                        </div>
                        <div class="label1">
                            <div class="emailtext">
                                <input name="UserName" type="text" value="" />
                            </div>
                            <div class="passwordtext">
                                <input name="Password" type="password" value="" />
                                <input name="submit" type="submit" class="greenButton" value="Login" />
                            </div>
                        </div>
                        <div class="label2">

                            <div class="password">&nbsp;&nbsp;Forgot Password?</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="downleft">
                <div class="picture">
                    <img src="bg/log.png" width="500" height="330" />
                </div>
                <div class="field">
                    <div class="signup">Sign Up</div>
                    <div class="free">It's free, and always will be</div>
                    <div class="text">
                        <form method="POST" action="">
                            <div class="textleft">FirstName:</div>
                            <div class="textright">
                                <input name="fname" id="first" type="text" class="textfield" maxlength="20" required />
                            </div>
                            <div class="textleft">LastName:</div>
                            <div class="textright">
                                <input name="lname" id="last" type="text" class="textfield" maxlength="20" required/>
                            </div>
                            <div class="textleft">UserName:</div>
                            <div class="textright">
                                <input name="login" id="un" type="text" class="textfield" maxlength="20" required/>
                            </div>
                            <div class="textleft">Password:</div>
                            <div class="textright">
                                <input name="password2" id="pw" type="password" class="textfield" minlength="8" maxlength="32" required/>
                            </div>
                            <div class="textleft">Retype Password:</div>
                            <div class="textright">
                                <input name="cpassword" id="confirmpw" type="password" class="textfield" minlength="8" maxlength="32" required />
                            </div>
                            <div class="textleft">Address:</div>
                            <div class="textright">
                                <input name="address" id="address" type="text" class="textfield" maxlength="75" required/>
                            </div>
                            <div class="textleft">Province:</div>
                            <div class="textright">
                            <select name="province" id="province" class=textfield1" required>
                              <option value=""> Select </option>
                              <option value="AB"> AB </option>
                              <option value="BC"> BC </option>
                              <option value="MB"> MB </option>
                              <option value="NB"> NB </option>
                              <option value="NL"> NL </option>
                              <option value="NS"> NS </option>
                              <option value="ON"> ON </option>
                              <option value="PE"> PE </option>
                              <option value="QC"> QC </option>
                              <option value="SK"> SK </option>
                              <option value="NW"> NW </option>
                              <option value="NT"> NT </option>
                              <option value="YK"> YK </option>
                            </select>
                            </div>
                            <div class="textleft"> Postal Code: </div>
                            <div class="textright">
                              <input name="postal" id="postal" type="text" class="textfield" maxlength="7" required/>
                            </div>
                            <div class="textleft">Contact Number:</div>
                            <div class="textright">
                                <input name="cnumber" id="cnumber" type="text" class="textfield" maxlength="20"  size="40" required/>
                            </div>
                            <div class="textleft">Email:</div>
                            <div class="textright">
                                <input name="email" id="email" type="email" class="textfield" maxlength="100" required/>
                            </div>
                            <div class="textleft">Gender:</div>
                            <div class="textright1">
                                <div class="input-container">
                                    <select name="gender" id="gender" class="textfield1" required>
                                            <option value="Select">Select </option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                    </select>
                                    <br/>
                                </div>
                            </div>
                            <div class="textleft">Birth Day:</div>
                            <div class="textright">
                                <input name="month" id="month" type="text" class="date" required readonly="true">
                            </div>
                            <div class="input-container">
                                <div class="textright">
                                    <input type="submit" name="Submit" value="Sign Up" class="greenButton1" onClick="return validateForm();" />

                                </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("Include/Footer.php"); ?>
                </div>

        </body>

        </html>

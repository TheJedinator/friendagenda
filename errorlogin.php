<?php
//Using a session variable to display an error message if login has failed. 
//More in login.php file.
session_start();
    if(isset($_SESSION['login_error_message'])) {
    echo "<script>alert('".$_SESSION['login_error_message']."');</script>;";
    unset($_SESSION['login_error_message']);
}
    ?>
<html>

<head>
    <title>Login</title>
</head>
<style type="text/css">
    <!-- body {
        background-image: url(bg/bg3.jpg);
        background-repeat: repeat-x;
        background-color: #d9deeb;
    }
    
    -->
</style>
<link href="css/errorlogin.css" rel="stylesheet" type="text/css" />

<body>

    <div class="mainr">
        <div class="topleft"><img src="img/logo.png" width="200" height="60" /></div>
    </div>
    <div class="bi">
    </div>
    <div class="font">
        <div class="right">
            <form action="login.php" method="post">

                <hr>
                <table>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="UserName" class="textright"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="Password" class="textright"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="greenButton" name="submit" value="Login" /><a href="index.php" class="t"> or sign up for FriendAgenda</a> </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</body>

</html>
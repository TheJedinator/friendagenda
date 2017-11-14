<html>
    <body>
        <?php
            if (isset($_POST['pw'])){
                $password = $_POST['pw'];
                $md5password = md5($password);
                echo $password . "<BR>"; 
                echo $md5password . "<BR>";
                $pwsha1 = sha1($password);
                $pwsha2 = sha1($password);
                echo $pwsha1 . "<BR>";
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                echo $hashed . "<BR>";
            }
            
        
        ?>
        <form action="" method="post">
            Enter a password: 
            <input type="password" name="pw"> 
            <input type="submit">
        </form>
    </body>
</html>


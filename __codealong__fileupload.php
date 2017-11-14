<?php
    if (isset($_POST['submit'])){
       echo $_FILES["homework"]["name"]. "<BR>";
       echo $_FILES["homework"]["type"] ."<BR>";
        echo ($_FILES["homework"]["size"]) . "<BR>";
    }
?>

    <html>

    <head>
        <title>Chapter 15 File Uploading</title>
    </head>

    <body>
        <form method="post" enctype="multipart/form-data">
            <label for="name"> Name: </label>
            <input type="text" value="">
            <br>
            <input type="file" name="homework" value="Submit Homework">
            <br>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>

    </html>

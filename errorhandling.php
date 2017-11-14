<html>
<head>
    <title> Error Handling</title>
</head>
<body>
    <?php
    try {
        $x = 101;
        $fh = fopen("blablah.php", "r");
        
        if (! $fh) throw new Exception("File could not be opened");
        
        if ($x > 100)  throw new Exception("number too large");
        echo $x;
    }
    catch (Exception $ex){
        syslog(LOG_INFO, "WE fucked up");
        closelog();
        echo $ex->getMessage();
    }
    
    ?>
</body>
</html>
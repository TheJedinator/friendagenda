<html>

<head>
    <title> Testing logic </title>
</head>

<body>
    <?php
    $counter = 97;
    $ascii = chr(97);
    echo $ascii;
    
    while ($counter <= 100){
        if (true) {
            $letter = chr($counter);
            echo ' Option1' . $letter;
            }
        $counter ++;
    }
    ?>
</body>

</html>
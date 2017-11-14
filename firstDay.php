<html> 
<title> My first PHP Script </title>
    <body>
    Hello World
    </body>
<?php
    
    $myString = "PHP rulezzzz";
    echo "<BR>The text string is \"" . $myString . "\"<BR>";
    echo "HELLO FROM PHP SCRIPT<br>";
    
    // variables are loosely typed as in js like var no type declaration
    $x = 20;
    $y = 30;
    $answer = $x + $y;
    echo $answer . "<br>";
echo "<table border = \"1\">";
    for ($row = 0; $row <=5; $row++){
        echo "<TR><TD>" . $row . "</TD></TR>";
    }
echo "</table>";
?>
</html>
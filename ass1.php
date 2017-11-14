<html>
<title> Assignment One</title>
<?php
    $temp = 22;
    (($temp > 30) ? $z = "It's really hot " : (($temp == 30) ? $z = "it's hot" : $z = "it's cold"));
    echo $z;
    
    ## QUESTION 2 ###
    
    echo "<br>" . "<table border =  \"2\">";
        
    for ($i = 1; $i <= 7; $i++) {
        echo "<tr>";
        for ($r = 1; $r <= 7; $r++)
        {
            echo "<td>" . ($i * $r) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
    
    ## QUESTION 3 ## 
    
    echo "<table style= \"border: 1px solid black;\" >
    <tr>
        <td style = \"color: blue;\"> Jimmy's GPA IS </td>
        <td> 4 </td>
    </tr>
    <tr>
        <td style = \"color: blue;\"> Susie's GPA is </td>
        <td> 3.7 </td>
    </tr>
    <tr>
        <td style = \"color: blue;\"> Johnny's GPA is </td>
        <td> 2.1 </td>
    </tr>
    
    
    </table"
?>

</html>
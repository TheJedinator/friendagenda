<html>
<head>
    <title> Chapter 30 Databases</title>
</head>
<body>
<?php
    //isset checks to see if variable is set and without this check on first load 
    // is borked.
    if (isset($_POST['fname'])){
        $FirstName = $_POST['fname'];
        echo $FirstName . "<BR>";
    }
// Connect to a database 
    $mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "productsdemo");
// NON TEXTBOOK CONNECTION METHOD 
	$con = mysqli_connect("localhost", "root", "", "productsdemo");
	$strSQL = "DELETE FROM products WHERE ID=10;";
	$rsProducts = mysqli_query($con, $strSQL);
    $numRows = mysqli_affected_rows($con);
    echo $numRows;
    
    if ($numRows != 0) {
//        while ($row = mysqli_fetch_array($rsProducts)){
//            $id = $row["ID"];
//            $cat = $row["Category"];
//            $desc = $row["Description"];
//            $price = $row["Price"];
//            echo "<BR> <BR>" . "ID: $id <BR> Category: $cat <BR> Description: $desc <BR> Price: $price";
//        }    
    }

?>
    <form method="post"> 
        <label>First Name: </label><input type="text" name="fname">
        <br><br>
        <input type="submit" value="Submit Form">
    </form>
</body> 



</html>
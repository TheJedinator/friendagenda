<?php
//c to f
//$format = "json";
$format = $_GET["format"];
 if (isset($GET["temp"]) && intval($_GET["temp"]));
 {
	 $temperature = $_GET["temp"];
	 $returnVal = ($temperature * 1.8) +32;
	 
 if ($format == "json"){
	 header("content-type: application/json");
 echo json_encode(array("temp"=>$returnVal));
						}
 else{
	 header("content-type: text/xml");
	 echo "<?xml version=\"1.0\"?>";
	 echo "<root>";
	 echo"<temp>$returnVal</temp>";
	 echo"</root>";
	}
 }
?>

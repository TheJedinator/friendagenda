<?php
 $url = "http://localhost/Chapter20B.php";
 $format="json";
 //$format = "xml";
 $qs = "temp=37&format=$format";
 
 //cURL is verstatile set of libraries that allow PHP to send/recieve data via HTTP
 //amazo (AWS) uses RESTful webservices
 $cobj = curl_init("$url?$qs");
 curl_setopt($cobj, CURLOPT_RETURNTRANSFER, 1);
 
 $data = curl_exec($cobj);
 echo $data . "<BR>";
 
 if($format == "json"){
 $object = json_decode($data);
 echo $object->temp;//dereferencing the associative array
 }
 else{//xml
	$xmlObject = simplexml_load_string($data); 
	echo $xmlObject->temp; 
 }
 
 curl_close($cobj);//don't forget to close the object
?>

<?php
// Array with a bunch of words
$words = Array("Apple", "Banana", "Cherry", "Dog", "Elephant", "Ferret", "Gorilla", "Horse", "Iguana", "Jackyl", "Kangaroo", "Llama", "Monkey", "New Jersey", "Oromocto", "Piranha", "Qwerty",
"Radish", "Saint John", "Toronto", "Uraguay", "Victoria", "Welsford", "X-Ray", "Young", "Zebra", "Annabelle");

// get the search parameter from URL
$q = $_REQUEST["q"];

$response = "";

// lookup all value from array if $q is not ""
if ($q !== "") {
	//convert it to lower case
    $q = strtolower($q);
    $len=strlen($q);
    //now what????
    foreach($words as $x){
        if (stristr($q, substr($x, 0, $len))){
            if ($response ===""){
                $response = $x;
            }
            else {
                $response .= "," . $x;
            }
        }
    }
}
echo $response === "" ? " no suggestion " : $response;
?>

<html>
<?php

$myString = "PHP Rules";
var_dump($myString);

$value = pow(3,2);
echo "<BR>" . $value;

function DoubleIt($x){
	return $x*=2;
	}
echo "<BR>" . DoubleIt($value);
?>
</html>
<html>
<head>
    <title> Chapter 5 - Arrays </title>
</head>
<body>
    <?php
        //creating array line by line
        $students [0] = "Jed";
        $students[1] = "Chris";
        $students[2] = "Shelby";
//creating array all on one line
        $provinces = array(0=>"NB", 1=>"MB", 3=>"PEI", 4=>"NS", 5=>"NL");

//associative array
    $studentGrades ["Johnny"] = 66;
    $studentGrades ["Jimmy"] = 77;
    $studentGrades ["Susan"] = 89;
//Value is associated with an index of a string called Johnny, Jimmy etc.


// 2D Array
$multiStudents = array(222 =>array("name"=>"Jimmy", "grade"=> 98) ,333=>array("name"=> "Chris", "grade" => 78) );
foreach ($multiStudents as $student) {
    echo $student["name"] . " " . $student["grade"] . "<BR>";
    }
    echo"<BR> <BR>";
    print_r($multiStudents);

    array_unshift($multiStudents, array("name"=> "ROBERT", "grade"=> 77));
    echo"<BR> <BR>";
    print_r($multiStudents);
//array_push is also an option and will add the element to the end of your array
echo "<BR>";

//in array is case sensitive
$isFound = in_array("Jed", $students);
if ($isFound){
    echo "Jed is in your class";
}
else echo "No Jed here";
//array_reverse($arrayName)
//sort($ArrayName, SORT_TYPE)

//randomize the array
shuffle($students);

     ?>
</body>
</html>

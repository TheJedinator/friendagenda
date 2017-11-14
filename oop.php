<html>
<?php
    //Class of type car.
    class Car {
        private $numWheels;
        private $make;
        private $model;
        private $year;
        protected $color;
        //Constants do not have getters and setters
        const HASENGINE = true;

        //Special keyword __construct is for the constructor only used to params as only have to gettes and setters
        function __construct($make, $model){
            $this->setMake($make);
            $this->setModel($model);
        }

        function setMake($make){
            $this->make = $make;
        }
        function getMake(){
            return $this->make;
        }
        function setModel($model){
            $this->model = $model;
        }
        function getModel(){
            return $this ->model;
        }
        function printMe(){
            echo $this->getMake() . "  " . $this->getModel() .  "<BR>";
        }

    }
    //Instance of car Notice no Type definition when instantiating.
    class Person {
        private $name;
        function setName($name){
            $this->name = $name;
        }
        function getName(){
            return $this->name;
        }
    }
    class Student extends Person {
        private $studentID;
        function setStudentID($studentID){
            $this->studentID = $studentID;
        }
        function getStudentID(){
            return $this->studentID;
        }
    }
$jed = new Student();
$jed->setName("Jed");
$jed->setStudentID("12345");

echo $jed->getName() . " " . $jed->getStudentID();
echo "<BR>";
$myCar = new Car("Honda", "Prelude");
//$myCar->setMake("Honda");
$myCar->printMe();
    //for static data members ClASS::MEMBER;
echo Car::HASENGINE;

?>
<body>

</body>
</html>

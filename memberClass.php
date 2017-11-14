<?php

class Member {

    private $memberid;
    private $password;
    private $username;
    private $firstName;
    private $lastName;
    private $address;
    private $province;
    private $postalCode;
    private $phone;
    private $email;
    private $gender;
    private $bday;
    private $currentCity;
    private $homeTown;
    private $interestedIn;
    private $language;
    private $college;
    private $highschool;
    private $about;
    private $experiences;
    private $dateAdded;

    function __construct() {

    }

    function __destruct() {

    }

    function getMemberid() {
        return $this->memberid;
    }

    function getPassword() {
        return $this->password;
    }

    function getUsername() {
        return $this->username;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getAddress() {
        return $this->address;
    }

    function getProvince() {
        return $this->province;
    }

    function getPostalCode() {
        return $this->postalCode;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getGender() {
        return $this->gender;
    }

    function getBday() {
        return $this->bday;
    }

    function getCurrentCity() {
        return $this->currentCity;
    }

    function getHomeTown() {
        return $this->homeTown;
    }

    function getInterestedIn() {
        return $this->interestedIn;
    }

    function getLanguage() {
        return $this->language;
    }

    function getCollege() {
        return $this->college;
    }

    function getHighschool() {
        return $this->highschool;
    }

    function getAbout() {
        return $this->about;
    }

    function getExperiences() {
        return $this->experiences;
    }

    function getDateAdded() {
        return $this->dateAdded;
    }

    //SETTERS

    function setMemberid($memberid) {
        $this->memberid = $memberid;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setProvince($province) {
        $this->province = $province;
    }

    function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setBday($bday) {
        $this->bday = $bday;
    }

    function setCurrentCity($currentCity) {
        $this->currentCity = $currentCity;
    }

    function setHomeTown($homeTown) {
        $this->homeTown = $homeTown;
    }

    function setInterestedIn($interestedIn) {
        $this->interestedIn = $interestedIn;
    }

    function setLanguage($language) {
        $this->language = $language;
    }

    function setCollege($college) {
        $this->college = $college;
    }

    function setHighschool($highschool) {
        $this->highschool = $highschool;
    }

    function setAbout($about) {
        $this->about = $about;
    }

    function setExperiences($experiences) {
        $this->experiences = $experiences;
    }

    function setDateAdded($dateAdded) {
        $this->dateAdded = $dateAdded;
    }
		//Function to add member to the database
    function AddNewMember($con) {
			//hash the password
        $hashed = password_hash($this->password, PASSWORD_DEFAULT);
				//Update statement
				$strSQL = "INSERT INTO members (UserName, Password, FirstName, LastName, Address, Province, PostalCode, ContactNo, email, Birthdate, Gender, DateAdded) "
                . "VALUES ('$this->username','$hashed','$this->firstName','$this->lastName',
								'$this->address','$this->province','$this->postalCode', '$this->phone','$this->email','$this->bday','$this->gender', NOW());";
        //Run the query, if fails trigger error to display assign it to the variable to be returned.
        $result = mysqli_query($con, $strSQL) or trigger_error("Query Failed! SQL: $strSQL - Error: ".mysqli_error($con), E_USER_ERROR);
        return $result;
    }

    function saveMember($con, $memberNum) {
        //Currently being called from Update profile section, this method itself will allow overriding of username and email as that may be desired at some other time.
				//Update statement with newly assigned variables to be passed back to the DB
        $save_SQL = "UPDATE members
          SET
                        UserName = '$this->username',
                        FirstName = '$this->firstName',
                        LastName = '$this->lastName',
                        Address = '$this->address',
                        Province = '$this->province',
                        PostalCode = '$this->postalCode',
                        ContactNo = '$this->phone',
                        email = '$this->email',
                        Birthdate = '$this->bday',
                        Gender = '$this->gender',
                        curcity = '$this->currentCity',
                        hometown = '$this->homeTown',
                        interested = '$this->interestedIn',
                        language = '$this->language',
                        college = '$this->college',
                        highschool = '$this->highschool',
                        experiences = '$this->experiences',
                        aboutme = '$this->about'
          WHERE member_id = '" . $memberNum . "';";
          //Run the query and store the result in a variable so we can use for error checking.
          //Condition one is the event that an actual error was returned from the Query (-1)
          //Condition 2 is a succesful update 1 or more
          //Condition 3 is no change. No rows effected from the DB. Could aslo be an issue but ultimately nothing changed (0 returned)
          //IN ALL cases redirect user to this page so it reloads the values from the database after an update was attempted.
        $_SESSION["sqlresult"] = mysqli_query($con, $save_SQL);
        if (mysqli_affected_rows($con) < 0) {
            $_SESSION['edit_profile_message'] = "Error Updating Profile, Please try again!";
        } else if (mysqli_affected_rows($con) > 0) {
            $_SESSION['edit_profile_message'] = "Profile Updated Succesfully! ";
        } else {
            $_SESSION['edit_profile_message'] = "Profile unchanged";
        }
        header('location:editprofile.php');
    }

    function getMember($con, $memberNum) {

        // Query string for member info, used to populate text boxes.
        $v_data_SQL = "SELECT * FROM members WHERE member_id = '" . $memberNum . "';";
        //execute query.
        $data_result = mysqli_query($con, $v_data_SQL);
        //While reading populate variables.
        while ($dRow = mysqli_fetch_array($data_result)) {
            $this->setMemberid($dRow["member_id"]);
            $this->setPassword($dRow["Password"]);
            $this->setUserName($dRow["UserName"]);
            $this->setFirstName($dRow["FirstName"]);
            $this->setLastName($dRow["LastName"]);
            $this->setAddress($dRow["Address"]);
            $this->setProvince($dRow["Province"]);
            $this->setPostalCode($dRow["PostalCode"]);
            $this->setPhone($dRow["ContactNo"]);
            $this->setEmail($dRow["email"]);
            $this->setBday($dRow["Birthdate"]);
            $this->setGender($dRow["Gender"]);
            $this->setCurrentCity($dRow["curcity"]);
            $this->setHomeTown($dRow["hometown"]);
            $this->setInterestedIn($dRow["Interested"]);
            $this->setLanguage($dRow["language"]);
            $this->setCollege($dRow["college"]);
            $this->setHighschool($dRow["highschool"]);
            $this->setExperiences($dRow["experiences"]);
            $this->setAbout($dRow["aboutme"]);
        } //end while
        return $this;
    }

    function getMemberByName($con, $username){
        $v_data_SQL = "SELECT * FROM members WHERE UserName = '" . $username . "';";
        //execute query.
        $data_result = mysqli_query($con, $v_data_SQL);
         while ($dRow = mysqli_fetch_array($data_result)) {
             $this->setMemberid($dRow["member_id"]);
            $this->setPassword($dRow["Password"]);
            $this->setUserName($dRow["UserName"]);
            $this->setFirstName($dRow["FirstName"]);
            $this->setLastName($dRow["LastName"]);
            $this->setAddress($dRow["Address"]);
            $this->setProvince($dRow["Province"]);
            $this->setPostalCode($dRow["PostalCode"]);
            $this->setPhone($dRow["ContactNo"]);
            $this->setEmail($dRow["email"]);
            $this->setBday($dRow["Birthdate"]);
            $this->setGender($dRow["Gender"]);
            $this->setCurrentCity($dRow["curcity"]);
            $this->setHomeTown($dRow["hometown"]);
            $this->setInterestedIn($dRow["Interested"]);
            $this->setLanguage($dRow["language"]);
            $this->setCollege($dRow["college"]);
            $this->setHighschool($dRow["highschool"]);
            $this->setExperiences($dRow["experiences"]);
            $this->setAbout($dRow["aboutme"]);
        } //end while
        return $this;
    }

    function updatePassword($con, $npw, $cpw){
                 if ($npw == $cpw){
             echo "<script> alert('You may not use the same password!'); </script>";
         }
         else {
             //hash the new password
            $npw = password_hash($npw,PASSWORD_DEFAULT);
            //SQL STATEMENT
            $save_SQL = "UPDATE members SET
                            Password = '$npw'
                            WHERE member_id = '". $_SESSION['SESS_MEMBER_ID']."';";
         //QUERY
            mysqli_query($con,$save_SQL);
             //IF Query succesful alert success
         if (mysqli_affected_rows($con) > 0) {
             $_SESSION['edit_profile_message'] = "Password Succesfully reset";
             header('location:editprofile.php');
            }
         else
             //else give generic password failed to update error message
            {
             echo "<script> alert('There was an issue updating your password'); </script>";
            }
        }
    }
      
}
?>

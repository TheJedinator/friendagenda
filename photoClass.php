<?php
	class Photo{
	private $photo_id;
	private $location;
	private $memberid;

	function __construct(){

	}
	function getMemberid() {
		return $this->memberid;
	}
	function setMemberid($memberid) {
		$this->memberid = $memberid;
	}

	function getLocation(){
		return $this->location;
	}
	function setLocation($location){
		$this->location = $location;
	}

	function getPhoto_id(){
		return $this->photo_id;
	}
	function setPhoto_id($id){
		$this->phot_id = $id;
	}
	function Upload($con, $tmp_name){
		$filepath = $this->location;
		$save_image = "INSERT INTO photos (location, member_id) VALUES ('$filepath',$this->memberid);";
		mysqli_query($con, $save_image);
		if (!file_exists($this->location)){
			move_uploaded_file($tmp_name, $this->location);
		if (mysqli_affected_rows($con) > 0){
			echo "Upload Succesful";
		}
		else {
			echo "Upload Failed";
		}
	} // If the file is already present in the uploads gallery we don't want to create another one so we'll just map it and give a message.
	else {
		if (mysqli_affected_rows($con) > 0){
			echo "Upload Succesful";
		}
		else {
			echo "Upload Failed";
			}
		}

	}
}
?>

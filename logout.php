<?php
session_start();	
//destroy the session
session_destroy();
//redirect the user back to the index.php page
header("Location: index.php");

?>

<?php

$sername = "127.0.0.1";
$uname = "root";
$pass = "";
$dbname = "sb";

$con = mysqli_connect($sername,$uname,$pass,$dbname);
		mysqli_set_charset($con,"utf8");
if (!$con) {
	  
	  die("Connection failed: " . mysqli_connect_error());
}

else {

	//echo "Success";
}

?>
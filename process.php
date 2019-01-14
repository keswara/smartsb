<?php
include  'config/connect.php';

if($_GET["cmd"] == "addpoint"){

	$point = $_POST["point"];
	$track = $_POST["track_id"];
	$ment = $_POST["comment"];
	$sql = "UPDATE track SET point = '$point', time_point = NOW(), comment = '$ment' WHERE trackid = '$track'";
	if (mysqli_query($con, $sql)) {
		echo "
		<script>
		alert('เพิ่มผู้ใช้เรียบร้อยแล้ว, ".$track." สำเร็จ');
		window.location = 'search.php?track=$track';
		</script>";
		 // echo $track."<br>";
		 // echo $point;

} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}


		 }


?>
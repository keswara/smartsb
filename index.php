<?php
include "config/connect.php";

?>
<!DOCTYPE html>
<html>
  <head>
  	
  	<title>ตรวจสอบพืชผลการเกษตร</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style> <?php include "config/style.css"; ?></style>
<body>

<div class="wrapper">
<div class="head-danger center">
<h1>ตรวจสอบติดตาม SB-Farm</h1>
<p>กรุณากรอกหมายเลขติดตามสินค้า หรือ  <i class="glyphicon glyphicon-barcode"></i></p>
</div>

<br><br><br>
<div align="center" class="form-area">
		<form action="search.php" class="form-inline" id="formtrack" name="formtrack" method="GET" >
			
			<div class="form-group">
				<input  placeholder="หมายเลขติดตาม" class="form-control" type="text" name="track" id="track">
			</div>


			<button type="submit"  class="btn btn-warning pull-center">ตรวจสอบ  <i class="glyphicon glyphicon-link"></i></button>

		</form>

</div>
<hr width="40%">

<br><br>
<h3 class="center">"คุณภาพเป็นเรื่องสำคัญ เราใส่ใจทุกขึ้นตอนการผลิต ปลอดสารพิษ เพื่อสุขภาพ"</h3>

</div>


<div class="footer ">

<p class="textfooter">ระบบตรวจสอบสำหรับลูกค้า sbfarm ตรวจสอบข้อมูลสินค้าทางการเกษตร <br>
โทร.090-9533094 . 085-6363925 . 097-2241132  Email: keswara.ku@rmuti.ac.th <br>
<a href="http://www.chaiae.me">www.chaiae.me</a> Copyright © 2018 sbfarm.com All rights reserved. 
</p>


</div>

</body>
</html>
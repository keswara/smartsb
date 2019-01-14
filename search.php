<?php
include "config/connect.php";


if ($_GET['track'] == ""){

echo "<center><h3>กรุณากรอกหมายเลขติดตาม</h3></center><br><br>"; 
}

?>

 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style><?php include "config/style.css"; ?></style>
<?php 
 

$track = $_GET['track'];

$sqli = "SELECT * FROM track WHERE trackid LIKE '$track'";

 $query = mysqli_query($con,$sqli);
 // $count = count(mysqli_fetch_array($query,MYSQLI_ASSOC));
$data = mysqli_fetch_assoc($query);
$count_row = count(mysqli_fetch_array($query,MYSQLI_ASSOC));


$track_no = $data['trackid']; // insertpoint
$tree = $data['treeid'];
?>
<div class="container">
<label>ข้อมูลติดตามระบบ</label>
<table class="table">
    <tr><th></th>
        <th>หมายเลขติดตาม</th>
        <th>ลอตจำหน่าย</th>
        <th>น้ำหนัก(กรัม)</th>
        <th>คะแนน <?php echo $data['point']; ?></th>

    </tr>

    <tr><td></td>

        <!-- insert point -->
        <?php $pointin = $data['point']; ?>
        <td><?php echo $data['trackid']; ?></td>
        <td><?php echo $data['lot']; ?></td>
        <td><?php echo $data['weight']; ?></td>
        <td><?php $point = $data['point'];
        if ($point <= 0){ echo "ยังไม่มีคะแนน</br>";} 
        if ($point > 0){ 

            $sql = "SELECT comment FROM track WHERE trackid = '$track_no'";
            $qq = mysqli_query($con,$sql);
            $result = mysqli_fetch_assoc($qq);
            echo "ให้คะแนนโดย: ".$result['comment']."<br>";   //คนมารีวิว
         for($i = 1; $i <= $point;$i++)  { ?>   
            <i class="glyphicon glyphicon-star"></i>
        <?php }?>
        <?php $sero = 10-$point;
         for($i = 1; $i <= $sero;$i++)  { ?>  
            <i class="glyphicon glyphicon-star-empty"></i>

           <?php } } ?>
        </td>

    </tr>

</table>

<hr>
<label>ข้อมูลเจาะลึก</label>

    <table class="table">
        <tr>
            <th></th>
            <th>หมายเลขประจำโซน</th>
            <th>รหัสประจำต้น</th>
           <!--  <th>ผลผลิต</th> -->
            <th>เจ้าหน้าที่</th>

        </tr>

        <tr>
            <td></td>
            <td><?php echo $data['sonid']; ?></td>
            <td><?php echo $data['treeid']; ?></td>
           <!--  <td>-</td> -->
            <td><?php echo $data['staff']; ?></td>

        </tr>

    </table>

<hr>

<?php


$sql = "SELECT subject, datehi, status, user FROM shot_history WHERE no_tree = '$tree' LIMIT 7 ";
$query_data = mysqli_query($con,$sql);
// $data_hi = mysqli_fetch_assoc($query);
$count = count(mysqli_fetch_array($query_data,MYSQLI_ASSOC));
        
        if($count > 0){
 ?>
<label>ข้อมูลการดูแลล่าสุด</label>
<p>รายการล่าสุด 7 รายการ</p>

 
    <table class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">รายการ</th>
            <th scope="col">วันเวลา</th>
            <th scope="col">เจ้าหน้าาที่</th>
            <th scope="col">สถานะ</th>

        </tr>
        <?php
      while( $data_hi = mysqli_fetch_array( $query_data, MYSQLI_ASSOC)){
                     @$r++;
            echo '<tr>';    
                        echo '<td>'.$r.'</td>';
                        echo '<td>'.$data_hi["subject"].'</td>';
                        echo '<td>'.$data_hi["datehi"].'</td>';
                        echo '<td>'.$data_hi["user"].'</td>';
                        echo '<td>'.$data_hi["status"].'</td>';
                    
            echo '</tr>';   
                 } 

                }else{
                        
                        echo "<center><h4>ไม่มีรายการ</h4><br>";
                    }

                 ?>
    </table>
<hr>

<?php  
    
if ($pointin == "0") { ?>
<h3>การให้คะแนน</h3>
<p>เกณฑ์การประเมิน 1 น้อยที่สุด จนถึงระดับที่ 10 มากที่สุด</p>
    <form id = "review" action="process.php?cmd=addpoint"  method="POST" name="review">
        <div class="form-group"> 
            <input type="hidden" name="track_id" value="<?php echo $track_no; ?>">
            <input type="radio" name="point" value="1"> 1
            <input type="radio" name="point" value="2"> 2 
            <input type="radio" name="point" value="3"> 3
            <input type="radio" name="point" value="4"> 4
            <input type="radio" name="point" value="5"> 5
            <input type="radio" name="point" value="6"> 6
            <input type="radio" name="point" value="7"> 7 
            <input type="radio" name="point" value="8"> 8
            <input type="radio" name="point" value="9"> 9
            <input type="radio" name="point" value="10"> 10
            <input placeholder="ชื่อ or ความเห็น"  type="texbox" name="comment">
            <button type="submit"  class="btn btn-warning pull-"> ส่งคะแนน </button>
        </div>
            
    </form>
</div>
<?php } ?>
<center>
    <a  href="http://127.0.0.1/smartsb/" role"button" class="btn btn-primary pull-center " > กลับหน้าแรก</a></center>
<br><br>
</div>
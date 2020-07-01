<?php
session_start();
if(!$_SESSION["account_id"]){
	Header("location: login.php");
}?>
<!DOCTYPE html>
<html>
<title>Plern Plern</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="font/stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.css">
<style>
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: 'itimregular', cursive;}
body {background-color: #A3E7D8;}
</style>
<head>
</head>
<?php include('navadmin.php');?>
<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>จัดการประเภทสินค้า</center></h1><br>
  <table class="w3-table-all w3-margin">
    <a href="Addtypeproduct.php" class="w3-button w3-yellow w3-border w3-round-large w3-hover-black"><i class="fas fa-plus-circle"></i> เพิ่มประเภทสินค้า</a>
    <thead>
      <tr class="w3-blue">
        <th>ชื่อประเภทสินค้า</th>
        <th>จัดการข้อมูล</th>
      </tr>
    </thead>
    <?php 
    include 'connect.php';
    $query = $conn->query("SELECT * FROM product_type ORDER BY type_id desc");
  
    if($query){
      while($row = mysqli_fetch_assoc($query)){
    echo '

    <tr class="w3-hover-light-grey">
      <td>'.$row['type_name'].'</td>
      <td>  <a href="fixtypeproduct.php?id='.$row['type_id'].'" class="w3-button w3-green w3-border w3-round-large w3-hover-black">แก้ไข</a> 
            <a href="deletetype.php?id='.$row['type_id'].'" class="w3-button w3-red w3-border w3-round-large w3-hover-black">ลบ</a></td>
    </tr>
    ';?>
  
  
   <?php }
}else{ ?>
 <p>Not found...</p>
<?php } ?>
  </table>
</div>



<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

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
<body>

<?php 

    
include 'connect.php'; 
    
$type_id = $_GET['id'];

$sql = "SELECT * FROM product_type WHERE typeid='$type_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);

    
    
?>

  <div class="w3-top">
    <div class="w3-bar w3-pale-red">
      <a href="ProductAdmin.php" class="w3-bar-item w3-button">Home <i class="fas fa-home"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-right">ออกจากระบบ</a>
      <a href="#" class="w3-bar-item w3-button w3-right">กราฟยอดขาย</a>
      <a href="AdminTypeproduct.php" class="w3-bar-item w3-button w3-right">จัดการประเภทสินค้า</a>
      <a href="AdminProduct.php" class="w3-bar-item w3-button w3-right">จัดการสินค้า</a>
      <a href="AdminCustomer.php" class="w3-bar-item w3-button w3-right">จัดการลูกค้า</a>
      <a href="AdminOrder.php" class="w3-bar-item w3-button w3-right">รายการสั่งสินค้า</a>
      <a href="Adminchangepassword.php" class="w3-bar-item w3-button w3-right">เปลี่ยนรหัสผ่าน</a>

    </div>
  </div>

<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>แก้ไขประเภทสินค้า</center></h1><br>
  <form action="update_type.php" method="post">
      <input type="hidden" name="typeid" value="<?php echo $row['typeid']; ?>">
       ชื่อประเภทสินค้า:<br>
      <input type="text" name="type_name" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['type_name'];?>"><br>
      <input type="submit" value="ยืนยัน" name="update"  class="w3-margin w3-button w3-green w3-border w3-round-large w3-hover-black">
      <a href="AdminTypeproduct.php" class="w3-button w3-red w3-border w3-round-large w3-hover-black">ยกเลิก</a>
  </form>
</div>



<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

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
<body>

  <div class="w3-top">
    <div class="w3-bar w3-pale-red">
      <a href="Product.php" class="w3-bar-item w3-button">Home <i class="fas fa-home"></i></a>
      <a href="Customermap.php" class="w3-bar-item w3-button w3-hover-pink"><i class="fas fa-map-marked-alt"></i> แผนที่ร้าน</a>
      <a href="basket.php" class="w3-bar-item w3-button">ตระกร้าสินค้า <i class="fas fa-shopping-cart"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-right">ออกจากระบบ</a>
      <a href="OrderCustomer.php" class="w3-bar-item w3-button w3-right">การสั่งซื้อสินค้า</a>
      <a href="ChangePassword.php" class="w3-bar-item w3-button w3-right">เปลี่ยนรหัสผ่าน</a>
      <a href="personal.php" class="w3-bar-item w3-button w3-right">ข้อมูลส่วนตัว</a>
    </div>
  </div>

<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>รายละเอียดรายการสั่งซื้อ</center></h1><br>
 
  <a href="OrderCustomer.php" class="w3-button w3-red w3-border w3-round-large w3-hover-black w3-right w3-margin-bottom">ย้อนกลับ</a>
  <table class="w3-table-all w3-margin">
   
   <thead>
     <tr class="w3-blue">
       <th>ชื่อสินค้า</th>
       <th>รูปสินค้า</th>
       <th>จำนวน</th>
       <th>ราคารวม</th>
      
      

     </tr>
   </thead>
   <?php 
   include 'connect.php';
   $id =$_GET['id'];
   $query = $conn->query("SELECT tb_order_detail.*,product_db.product_name,product_db.product_pic 
   FROM `tb_order_detail`
   JOIN product_db 
   ON product_db.product_id = tb_order_detail.p_id where order_id=$id");
  

 
   if($query){
     while($row = mysqli_fetch_assoc($query)){
       echo '
   <tr class="w3-hover-light-grey">
     <td>'.$row['product_name'].'</td>
     <td><img src="img/'.$row['product_pic'].'" style="width:75px;height:100px;"></td>
     <td>'.$row['p_qty'].'</td>
     <td>'.$row['total'].'</td>
    
           
     
     </td>


   </tr>';
   ?>
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

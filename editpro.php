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


 <?php 
//  include ('phpeditpro.php');
//  1. เชื่อมต่อ database:
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$p_id = $_GET["id"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT product_db.*,product_type.type_name
FROM `product_db`
INNER JOIN product_type ON product_db.type_id = product_type.type_id
WHERE product_id = '$p_id'";
$result2 = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);

 
//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM product_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
// 4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

$sql1= "SELECT * FROM product_db WHERE product_id='$p_id' ";
$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
$row1 = mysqli_fetch_array($result1);

if(isset($_POST['update'])){
  
    $product_name = $_POST['product_name'];
    $product_detail = $_POST['product_detail'];
    $product_price = $_POST['product_price'];
    $amount_pro = $_POST['amount_pro'];
    $type_id = $_POST['type_id'];
    

    $old_image= $row1['product_pic'];
    if(isset($_FILES['fileToUpload']['name']) && ($_FILES['fileToUpload']['name']!="")){
        $size = $_FILES['fileToUpload']['size'];
        $temp = $_FILES['fileToUpload']['tmp_name'];
        $type = $_FILES['fileToUpload']['type'];
        $file_name = $_FILES['fileToUpload']['name'];
        //1st delete old file
        unlink("img/$old_image");
        //new file add to dir
        move_uploaded_file($temp,"img/$file_name");
    } else {
        $file_name = $old_image;
    }

    
    
    

    $update = mysqli_query($conn,"UPDATE `product_db` 
    set `product_name` ='".$product_name."' ,
    `product_detail` ='".$product_detail."' ,
    `product_price` ='".$product_price."' ,
    `amount_pro` ='".$amount_pro."' ,
    `product_pic` ='".$file_name."' ,
    `type_id` ='".$type_id."' 
    
    
    WHERE `product_id` = '".$p_id."'");

    if($update){
        echo "<script type='text/javascript'>";
          echo "alert('อัพเดทสินค้าสำเร็จ');";
          echo "window.location = 'adminproduct.php';";
          echo "</script>";
      }else {
        echo "<script>alert('ไม่สามารถอัพเดทสินค้า')</script>";
      }
}
   

?>


<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>แก้ไขสินค้า</center></h1><br>
      <form action="" method="post" enctype="multipart/form-data">
              ชื่อสินค้า:<br>
              <input type="text" name="product_name" class="w3-input w3-round-xlarge w3-border w3-margin" required style="max-width:400px" value="<?php echo $row['product_name'];?>"><br>
              รายละเอียดสินค้า:<br>
              <textarea class="w3-input w3-round-xlarge w3-border w3-margin" rows="3" style="width: 500px;"name="product_detail" required style="max-width:400px"><?php echo $row['product_detail'];?></textarea>
              ราคา:<br>
              <input type="text" name="product_price" class="w3-input w3-round-xlarge w3-border w3-margin"required style="max-width:400px" value="<?php echo $row['product_price'];?>"><br>
              จำนวน:<br>
              <input type="text" name="amount_pro" class="w3-input w3-round-xlarge w3-border w3-margin"required style="max-width:400px" value="<?php echo $row['amount_pro'];?>"><br>
              <!-- <select class="w3-select w3-margin w3-round-xlarge w3-border" name="option" style="width:40%;">
                <option value="" disabled selected>ประเภทสินค้า</option>
                <option value="1">เสื้อยืด</option>
                <option value="2">กระโปรง</option>
                <option value="3">เดรส</option>
              </select><br> -->
              <select name="type_id" class="form-control w3-round-xlarge w3-border w3-margin" style="max-width:400px" required>
              <option value="<?php echo $row["type_id"];?>">
                <?php echo $row["type_name"]; ?>
              </option>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select><br>
           
              กรุณาเลือกรูปภาพสินค้า:
              <input type="file" name="fileToUpload"">
              
              <?php echo '<img src="img/'.$row['product_pic'].'" style="wdith:400px;height:500px;">';?> 
      
          <input type="submit" value="update" name="update" class="w3-margin w3-round-large w3-button w3-green w3-hover-black">
          <a href="AdminProduct.php" class="w3-button w3-red w3-round-large w3-hover-black">Cancel</a>
      </form>
</div>



<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

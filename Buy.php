<?php session_start();
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
<body>
<?php include('navcus.php');?>
<?php 
  include('connect.php');
  $id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
  $query_showproduct = "SELECT * FROM product_db where product_id='".$id."'";
  $showproduct = mysqli_query($conn,$query_showproduct) or die(mysqli_error($conn));
  $row_showproduct = mysqli_fetch_assoc($showproduct);
  $totalRows_showproduct = mysqli_num_rows($showproduct);
?>
<div class="w3-card-4" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>ข้อมูลสินค้า</center></h1><br>
  <div class="w3-row">
    <div class="w3-half w3-container">
      <img src="img/<?php echo $row_showproduct['product_pic'];?>" style="max-width:300px;">
      <p><?php echo $row_showproduct['product_name']; ?> <br><b><?php echo $row_showproduct['product_price']; ?> บาท</b></p>
    </div>
    <div class="w3-half w3-container" style="background-color:#FFBE7D;">
      รายละเอียดสินค้า:<p><?php echo $row_showproduct['product_detail']; ?>
</p>
      จำนวนสั่งซื้อ:<br>

     
      <a href='basket.php?product_id=<?php echo"$row_showproduct[product_id]&act=add'";?> class="w3-button w3-margin w3-green w3-border w3-round-large w3-hover-black" >นำใส่ตระกร้าสินค้า></a>
      <a href="Product.php" class="w3-button w3-margin w3-red w3-border w3-round-large w3-hover-black">Cancel</a>

    </div>
  </div>
  </div>


  <footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
    <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
    <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

</body>
</html>

<?php
	error_reporting( error_reporting() & ~E_NOTICE );
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
  <h1><center>ตระกร้าสินค้า</center></h1><br>
  <div class="row">
    	<div class="col-md-2"></div>
        <div class="col-md-8">

  <p><button class="w3-button w3-margin w3-red w3-border w3-round-large w3-hover-black"><a href="basket.php">กลับหน้าตะกร้าสินค้า</a></button>
   
  
  <table class="w3-table-all">
    <tr class="w3-blue">
      <td width="1558" colspan="5" align="center">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr class="success">
    <td>ลำดับ</td>
      <td>สินค้า</td>
      <td>ราคา</td>
      <td>จำนวน</td>
      <td>รวม/รายการ</td>
    </tr>
   
<?php
	include_once('connect.php');
	$total=0;
	foreach($_SESSION['shopping_cart'] as $id=>$p_qty)
	{
        $sql =mysqli_query($conn,"SELECT * FROM `product_db` where product_id='".$id."' ");
		
		$row	= mysqli_fetch_array($sql);
		$sum	= $row['product_price']*$p_qty;
		$total	+= $sum;
    echo "<tr>";
	echo "<td align='center'>";
	echo  $i += 1;
	echo "</td>";
    echo "<td>" . $row["product_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['product_price'],2) ."</td>";
    echo "<td align='right'>$p_qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='4'><b>รวม</b></td>";
    echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>
		
	</div>
</div>
<div class="container">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="w3-margin">
     <?php  if(isset($_SESSION['account_id'])){ ?>
      
      <form  name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
      <div class="form-group">
      <input type="hidden" value="<?php echo $_SESSION['account_id'];?>" name="user_id">  <?php }else {} ?>
          <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
          <input type="text" class="w3-input w3-round-xlarge w3-border w3-margin" id="name" value="<?php echo$_SESSION["firstname"]?>" style="width: 300px;" name="name">
        </div>
        <div class="form-group">
          <label for="exampleInputAddress">ที่อยู่</label>
          <textarea class="w3-input w3-round-xlarge w3-border w3-margin" rows="3" style="width: 500px;"name="address" id="order_address"><?php echo $_SESSION["address"];?></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
          <input type="text" class="w3-input w3-round-xlarge w3-border w3-margin" id="phone" value="<?php echo$_SESSION["tel"]?>" style="width: 300px;" name="phone">
          <input type="hidden" value="<?php echo''.$total.'';?>" name="total">
      </div>
      <div class="col-sm-12" align="center">
            <button type="submit" class="w3-button w3-margin w3-green w3-border w3-round-large w3-hover-black">
             ยืนยันสั่งซื้อ </button>
          </div>
      </form>
    </div>
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

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
<?php 
session_start();
if($_SESSION["status"]!="member"){
	Header("location: login.php");
}?>
<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
    $id = $_REQUEST['product_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$id]))
		{
			$_SESSION['shopping_cart'][$id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$id]=1;
		}
	}

	if($act=='remove' && !empty($id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $id=>$amount)
		{
			$_SESSION['shopping_cart'][$id]=$amount;
		}
  }
  if($act=='Cancel-Cart'){
		unset($_SESSION['shopping_cart']);	
	}
	?>
  
  <?php include('navcus.php');?>

<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>ตระกร้าสินค้า</center></h1><br>
  <form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table class="w3-table-all">
    <thead>
      <tr class="w3-pink">
        <th>No</th>
        <th>img</th>
        <th>สินค้า</th>
        <th>ราคา</th>
        <th>จำนวน</th>
        <th>รวม</th>
        <th>ลบ</th>

      </tr>
    </thead>
   

    <?php

if(!empty($_SESSION['shopping_cart']))
{
include_once('connect.php');

	foreach($_SESSION['shopping_cart'] as $id=>$p_qty)
	{
    $sql =mysqli_query($conn,"SELECT * FROM `product_db` where product_id='".$id."' ");

		
		while($row = mysqli_fetch_array($sql))
		{
		 
		$sum = $row['product_price'] * $p_qty;
		$total += $sum;
		echo "<tr>";
		echo "<td>";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td width='100'>"."<img src='img/$row[product_pic]'  width='50'/>"."</td>";
		echo "<td width='334'>"." " . $row["product_name"] . "</td>";
		echo "<td width='100' align='right'>" . number_format($row["product_price"],2) . "</td>";
		
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$id]' value='$p_qty' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='center'><a href='basket.php?product_id=$id&act=remove' class='w3-button w3-margin w3-red w3-border w3-round-large w3-hover-black'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='5' align='right'>Total</td>";
  	echo "<td align='right' >";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left'></td>";
	echo "</tr>";
}
?>

  </table>
  <tr>
          <td></td>
          <td colspan="5" align="right">
          <a href="basket.php?act=Cancel-Cart" class="w3-button w3-margin w3-red w3-border w3-round-large w3-hover-black"> ยกเลิกตะกร้าสินค้า </a>
          <button type="submit" name="button" id="button" class="w3-button w3-margin w3-yellow w3-border w3-round-large w3-hover-black"> คำนวณราคาใหม่ </button>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="w3-button w3-margin w3-blue w3-border w3-round-large w3-hover-black"> 
            <span> </span> สั่งซื้อ </button>
            </td>
        </tr>
  
  </form>
    
</div>




<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

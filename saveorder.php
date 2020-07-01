<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();  
    require_once('connect.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$user_id = $_POST["user_id"];	
	$name = $_POST["name"];
	$address = $_POST["address"];
	
	$phone = $_POST["phone"];
	$p_qty = $_POST["p_qty"];
	$total_1 = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$status = 'ยังไม่ได้ชำระ';

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($conn, "BEGIN"); 
	$sql1 = "INSERT  INTO tb_order (`order_id`, `user_id`, `name`, `address`,`phone`, `order_status`, `payment_img`, `order_date`, `sum`) VALUES
	(NULL,  
	'$user_id',
	'$name',
	'$address',
	
	'$phone',
	'$status',
	 '',
	'$order_date',
	'$total_1' 
	)";
	
	$query1	= mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysql_error());
	

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tb_order  WHERE phone='$phone'";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM product_db where product_id=$id";
		$query3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['product_price']*$p_qty;
		$count=mysqli_num_rows($query3);
		
		
		$sql4	= "INSERT INTO  tb_order_detail 
		values(null, 
		'$order_id', 
		'$id', 
		'$p_qty', 
		'$total')";
		$query4	= mysqli_query($conn, $sql4);
	}

	for($i=0; $i<$count; $i++){  
		$have =  $row3['amount_pro']; 
		$stc = $have - $p_qty;  
		$sql5 = "UPDATE product_db SET  amount_pro=$stc WHERE  product_id=$id ";
		$query9 = mysqli_query($conn, $sql5);  
		  
		  }

	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $id)
		{	
			unset($_SESSION['shopping_cart']);
			// Header("Location: Product.php");
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

	
?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='Product.php';
</script>


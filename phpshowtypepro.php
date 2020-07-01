<?php
include('connect.php');
$type_id = $_GET['type_id'];
$query_showproduct = "SELECT * FROM product_db WHERE type_id = $type_id order by product_id desc";
$showproduct = mysqli_query($conn,$query_showproduct) or die(mysqli_error($conn));
$row_showproduct = mysqli_fetch_assoc($showproduct);
$totalRows_showproduct = mysqli_num_rows($showproduct);
?>
<?php do{  ?>

<div class="w3-col l3 s6 w3-center">
    
        <img src="img/<?php echo $row_showproduct['product_pic']; ?>" width="90%" style = "margin-bottom:20px;"/><br>
        <?php echo  $row_showproduct['product_name']; ?><br>
        <b>ราคา <?php echo  $row_showproduct['product_price']; ?>บาท </b><br>
        <a href="buy.php?product_id=<?php echo $row_showproduct['product_id'];?>" class="w3-button w3-green w3-border w3-round-large w3-hover-black" style="margin-bottom:50px;">Detail</a>
    
</div>
<?php } while($row_showproduct = mysqli_fetch_assoc($showproduct))?>
<?php
    mysqli_free_result($showproduct);
?>
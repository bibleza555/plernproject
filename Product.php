<?php session_start();
if(!$_SESSION["account_id"]){
	Header("location: login.php");
}?> 
<!DOCTYPE html>
<html>
<title>Plern Plern</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.css">
<link href="font/stylesheet.css" rel="stylesheet">

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
  $query = "SELECT product_type.* FROM product_type ";
  $result = mysqli_query($conn,$query);
?>

  <div class="w3-content w3-white" style="max-width:1000px;margin-top:100px;">


    <div class="w3-container w3-text-black w3-margin" >
      <h3>Product</h3>
    </div>

   
    <div class="w3-row">
      <div class="w3-row w3-margin" >
        <div class="w3-dropdown-hover w3-blue">
            <button class="w3-button w3-hover-black">เลือกประเภทสินค้า</button>
        
            <div class="w3-dropdown-content w3-bar-block w3-card-4 ">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>  
                  <a href="product.php?act=showbytype&type_id=<?php echo $row['type_id'];?>
                  &type_name=<?php echo $row['type_name'];?>" class="w3-bar-item w3-button">
                  <?php echo $row['type_name'];?> </a>
            <?php } ?>     
            </div>
       </div>

     </div>

     <?php 
    $act = (isset($_GET['act']) ? $_GET['act']:'');
    if($act=='showbytype'){
      include('phpshowtypepro.php');
    }else{
      include('phpshowproduct.php');
    }

    ?>
          
    </div>
    
    

     
               
      
  
</div>
  <!-- Footer -->
  <footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
    <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
    <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>



</body>
</html>
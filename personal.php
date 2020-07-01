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
<?php 

    include_once('connect.php'); 
    
    $account_id = $_SESSION['account_id'];
    
    $sql = "SELECT * FROM account WHERE account_id='$account_id' ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    
    
    
?>


<?php include('navcus.php');?>

<form action="update.php" method="post">
  <div class="w3-card-4" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
    <h1><center>ข้อมูลส่วนตัว</center></h1><br>
    <div class="w3-row">
      <div class="w3-half w3-container" style="background-color:#FFBE7D;">
      <input type="hidden" name="account_id" value="<?php echo $row['account_id']; ?>">

        ชื่อ:<br>
        <input type="text" name="firstname" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['firstname'];?>"><br>
        นามสกุล:<br>
        <input type="text" name="sirname" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['sirname'];?>"><br>
        รหัสประจำตัวประชาชน:<br>
        <input type="text" name="id_number" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['id_number'];?>"><br>

      </div>

      <div class="w3-half w3-container" style="background-color:#FFBE7D;">

        ที่อยู่:<br>
        <input type="text" name="address" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['address'];?>"><br>
        เบอร์โทร: <br>
        <input type="text" name="tel" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['tel'];?>"><br>
        E-mail:<br>
        <input type="text" name="email" class="w3-input w3-round-xlarge w3-border w3-margin" value="<?php echo $row['email'];?>"><br>
        <input type="submit" value="Update" name="update" class="w3-margin w3-round-large w3-button w3-red w3-hover-black">
        <a href="Product.php" class="w3-button w3-round-large w3-red w3-hover-black">Cancel</a>

      </div>
    </div>
  </div>
</form>


  <footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
    <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
    <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

<?php mysqli_close($conn);?>
</body>
</html>

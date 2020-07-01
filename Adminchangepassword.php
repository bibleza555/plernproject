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


<?php include('navadmin.php');?>

<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>เปลี่ยนรหัสผ่าน</center></h1><br>
  <form action="updatepass.php" method="post">
      <input type="hidden" name="account_id" value="<?php echo $row['account_id']; ?>">
      Username:<br>
      <input type="text" name="username" class="w3-input w3-round-xlarge w3-border w3-margin" style="max-width:400px" value="<?php echo $row['username'];?>"><br>
      Password:<br>
      <input type="text" name="password" class="w3-input w3-round-xlarge w3-border w3-margin" style="max-width:400px" value="<?php echo $row['password'];?>"><br>
      

      <input type="submit" value="Update" name="update" class="w3-margin w3-button w3-red w3-hover-black">
      <a href="ProductAdmin.php" class="w3-button w3-red w3-hover-black">Cancel</a>
  </form>
</div>



<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

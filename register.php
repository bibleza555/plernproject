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
  <div class="w3-bar w3-pale-red">
      <a href="index.php" class="w3-bar-item w3-button w3-hover-pink">Home  <i class="fas fa-home"></i></a>
  </div>



  <div class="w3-container w3-margin-top w3-white" style="max-width:600px; margin:auto;">
      <form action="phpregister.php" method="POST" class="w3-margin" name="form1">
          <h1><center>Register</center></h1><br>
            Username:<br>
            <input type="text" name="username" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            Password:<br>
            <input type="password" name="password" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            ชื่อ:<br>
            <input type="text" name="firstname" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            นามสกุล:<br>
            <input type="text" name="sirname" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            รหัสประจำตัวประชาชน:<br>
          <input type="text" name="id_number" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            ที่อยู่:<br>
          <input type="text" name="address" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            เบอร์โทร: <br>
          <input type="text" name="tel" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
            E-mail:<br>
          <input type="text" name="email" class="w3-input w3-round-xlarge w3-border w3-margin" required><br>
          <input type="hidden" name="status" value="member">

            <input type="submit" value="submit" class="w3-margin w3-round-large w3-button w3-red w3-hover-black" >
            <a class="w3-button w3-round-large w3-red w3-hover-black" href="index.php">Cancel</a>
      </form>
  </div>

  <footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
    <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
    <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

</body>
</html>

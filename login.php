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


  <div class="w3-bar w3-pale-red">
      <a href="index.php" class="w3-bar-item w3-button w3-hover-pink">Home <i class="fas fa-home"></i></a>
      <a href="register.php" class="w3-bar-item w3-button w3-hover-pink w3-right">สมัครสมาชิก</a>
  </div>


      <div class="w3-card-4 w3-margin-top w3-white" style="width:350px;margin:auto;">
        <form class="w3-margin" action="check_login.php" method="post">
          <h1><center>Login</center></h1><br>
            Username:<br>
            <input type="text" name="txtUsername" class="w3-input w3-round-xlarge w3-border w3-margin"><br>
            Password:<br>
            <input type="password" name="txtPassword" class="w3-input w3-round-xlarge w3-border w3-margin"><br>
            <input type="submit" value="submit" name="submit" class="w3-margin w3-round-large w3-button w3-red w3-hover-black" >
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

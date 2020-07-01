<!DOCTYPE html>
<html>
<title>Plern Plern</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="font/stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: 'itimregular', cursive;}
body {background-color: #A3E7D8;}
</style>
<head>
</head>
<body>
<?php include('navadmin.php');?>
  <?php
  include('connect.php');
  $query = "SELECT * FROM product_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
  $result = mysqli_query($conn, $query);

  ?>
<div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
  <h1><center>เพิ่มสินค้า</center></h1><br>
      <form action="phpaddpro.php" method="post" enctype="multipart/form-data">
              ชื่อสินค้า:<br>
              <input type="text" name="product_name" class="w3-input w3-round-xlarge w3-border w3-margin" required style="max-width:400px"><br>
              รายละเอียดสินค้า:<br>
              <textarea class="w3-input w3-round-xlarge w3-border w3-margin" rows="3" style="width: 500px;"name="product_detail" required style="max-width:400px"></textarea>
              <br>
              ราคา:<br>
              <input type="text" name="product_price" class="w3-input w3-round-xlarge w3-border w3-margin"required style="max-width:400px"><br>
              จำนวน:<br>
              <input type="text" name="amount_pro" class="w3-input w3-round-xlarge w3-border w3-margin"required style="max-width:400px"><br>
              <!-- <select class="w3-select w3-margin w3-round-xlarge w3-border" name="option" style="width:40%;">
                <option value="" disabled selected>ประเภทสินค้า</option>
                <option value="1">เสื้อยืด</option>
                <option value="2">กระโปรง</option>
                <option value="3">เดรส</option>
              </select><br> -->
              <select name="type_id" class="w3-select w3-margin w3-round-xlarge w3-border" style="max-width:400px" required>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select><br>
              กรุณาเลือกรูปภาพสินค้า:
              <input type="file" name="fileToUpload" onchange="readURL(this);"/>
              <img id="blah" width="40%"/>
      
          <input type="submit" value="Submit" name="submit" class="w3-margin w3-button w3-red w3-hover-black">
          <a href="AdminProduct.php" class="w3-button w3-red w3-hover-black">Cancel</a>
      </form>

</div>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

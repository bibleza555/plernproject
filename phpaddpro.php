<?php
  // if(isset($_FILES["filUpload"])) {
include ('connect.php');

if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $product_detail = $_POST['product_detail'];
    $product_price = $_POST['product_price'];
    $amount_pro = $_POST['amount_pro'];
   
    $img = $_FILES["fileToUpload"]["name"];
    $type_id = $_POST['type_id'];
   

    $query = "INSERT INTO `product_db`(`product_name`,`product_detail`,`product_price`,`amount_pro`,`product_pic`,`type_id`)
    VALUES('$product_name','$product_detail','$product_price','$amount_pro','$img','$type_id')";
    $result = mysqli_query($conn,$query);


 
    $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $uploadOk = 1;
          echo "<script>";
            echo "alert(\"เพิ่มสินค้าสำเร็จ\");";
            echo "window.location = 'adminproduct.php';"; //ไปหน้า addmin_pro
            echo "</script>";

      } else {
        echo "<script>";
       
        echo "window.location = 'adminproduct.php';"; //ไปหน้า addmin_pro
        echo "</script>";
          
          $uploadOk = 0;
      }
 
}
    
  }

?>
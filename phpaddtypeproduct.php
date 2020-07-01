<?php 
  include_once('connect.php');

  
        $sql = "INSERT INTO `product_type` (`type_id`, `type_name`) 
                VALUES (NULL, '".@$_POST['type_name']."' );";
        
        $result = $conn->query($sql);

        if($sql){
            echo "<script>";
            echo "alert(\"บันทึกข้อมูลเรียบร้อยแล้ว\");";
            echo "window.location = 'admintypeproduct.php';"; //ไปหน้าเเรก
            echo "</script>";
            
          }else {
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
          }
          
          

        
?>
<?php 
  include_once('connect.php');

  
        $sql = "INSERT INTO `account` (`account_id`, `username`, `password`, `firstname`, `sirname`, `id_number`, `address`, `tel`, `email`, `status`) 
                VALUES (NULL, '".@$_POST['username']."', '".@$_POST['password']."', '".@$_POST['firstname']."', '".@$_POST['sirname']."', '".@$_POST['id_number']."', '".@$_POST['address']."', '".@$_POST['tel']."', '".@$_POST['email']."','".@$_POST['status']."');";
        
        $result = $conn->query($sql);

        if($sql){
            echo "<script>";
            echo "alert(\"สมัครสมาชิกเรียบร้อยแล้ว\");";
            echo "window.location = 'login.php';"; //ไปหน้า login
            echo "</script>";
            
          }else {
            echo "<script>alert('ไม่สามารถสมัครสมาชิกได้')</script>";
          }
      
?>
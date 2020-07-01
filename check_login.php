<?php
    session_start();
    include('connect.php');
    $query = "SELECT * FROM `account` WHERE username = '".mysqli_real_escape_string($conn,$_POST['txtUsername'])."'
            AND password = '".mysqli_real_escape_string($conn, $_POST['txtPassword'])."'";
    $objQuery = mysqli_query($conn,$query);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    if(mysqli_num_rows($objQuery)==1){
 
        

       
        if(!$objResult){
            echo "<script>";
            echo "alert(\"Username หรือ Password ไม่ถูกต้อง\");";
            echo "window.location = 'Login.php';"; //ไปหน้าเเรก
            echo "</script>";
        }
        else
        {
            $_SESSION["account_id"] = $objResult["account_id"];
            $_SESSION["status"] = $objResult["status"];
            $_SESSION["firstname"] = $objResult["firstname"];
            $_SESSION["address"] = $objResult["address"];
            $_SESSION["tel"] = $objResult["tel"];
    
        

            if($objResult["status"] == "admin" )
            {
                header("Location: adminproduct.php");
            }
            elseif($objResult["status"] == "member" )
            {
                header("Location: Product.php");
            }
            
        }
        
       
    }
    else
        {
            echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
            echo "window.location = 'login.php'";
            echo "</script>";
        }


   
    mysqli_close($conn);
?>


<?php 
session_start();
        if(isset($_POST['txtUsername'])){
				//connection
                  include("connect.php");
				//รับค่า user & password
                  $Username = $_POST['txtUsername'];
                  $Password = md5($_POST['txtPassword']);
				//query 
                  $sql="SELECT * FROM account Where '".mysqli_real_escape_string($conn,$_POST['txtUsername'])."'
                  AND password = '".mysqli_real_escape_string($conn, $_POST['txtPassword'])."'";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["account_id"] = $row["account_id"];
                      $_SESSION["User"] = $row["firstname"]." ".$row["sirname"];
                      $_SESSION["Userlevel"] = $row["status"];

                      if($_SESSION["Userlevel"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: adminproduct.php");

                      }

                      if($_SESSION["Userlevel"]=="member"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: Product.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>
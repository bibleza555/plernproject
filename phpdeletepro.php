<?php 

    include 'connect.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if($id!=''){
        $sql = "DELETE FROM product_db Where product_id ='".$id."' ";

        if($conn->query($sql)==TRUE){
            echo "<script>";
            echo "alert('delete success');";
            echo "window.location.href='adminproduct.php';";
            echo "</script>";            
        }
        else{
            echo "error".sql."<br>".$conn->error;
        }
    
    
    }
?>
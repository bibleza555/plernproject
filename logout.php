<?php 
    session_start();
    unset($_SESSION['shopping_cart']);
    session_destroy();
    
    
    
    header('location:login.php');

?>
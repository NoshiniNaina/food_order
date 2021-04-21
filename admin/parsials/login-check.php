<?php
    //check wether the user is login or not
    if(!isset($_SESSION['user'])){ //if user session is not set
        $_SESSION['no-login-message']="<div class='error'>Please login to access Admin panel.</div>";
        //redirect to log in page
        header('location:'.SITEURL.'admin/login-php');
    }
    
?>
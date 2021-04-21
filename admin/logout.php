<?php
    include('../config/contant.php');
    //destory thr seccsion and redirect to login page
    session_destroy();//unset $_SESSION['user]
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>
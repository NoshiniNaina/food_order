<?php
    //include constant file
    include("../config/contant.php");

    //1.get the id to be deleted
    $id=$_GET['id'];

    //create SQL Query to delete admin
    $sql="DELETE FROM dbl_admin WHERE id=$id";
    //Execute the query
    $res= mysqli_query($conn,$sql);

    //check wether the query is excuted successfully or not
    if($res==TRUE){
        $_SESSION['delete']="<div class='success'> Admin delete successfully</div>";
        header('location:'.SITEURL.'admin/manage_admin.php');
    }
    else{
        $_SESSION['delete']="<div class='error'>Admin cant delete successfully.Try again later</div>";
        header('location:'.SITEURL.'admin/manage_admin.php');
    }

    //Redirect ro manage admin page with message(success/error)
?>
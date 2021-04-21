<?php include('parsials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Change password</h1>
            <br> <br>
            <?php
                if (isset($_GET['id'])){
                    $id=$_GET['id'];
                }
            ?>


            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Enter current password">

                        </td>
                    </tr>
                    <tr>
                        <td>New password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="Enter new password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm password</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="change_password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['submit'])){
           //Get the data from form
           $id=$_POST['id'];
           $current_password =md5($_POST['current_password']);
           $new_password= md5($_POST['new_password']);
           $confirm_password=md5($_POST['confirm_password']);
           //check whether the user with current ID and current password exists or not
           $sql= "SELECT * FROM dbl_admin WHERE id=$id AND password='$current_password'";
           //Execute the query
           $res=mysqli_query($conn,$sql);
           if($res==TRUE){
               $count=mysqli_num_rows($rows);
               if($count==1){
                    if($new_password==$confirm_password){
                        $sql2="UPDATE dbl_admin SET
                        password ='$new_password'
                        WHERE id=$id
                        ";
                        $res2=mysqli_query($conn,$sql2);
                        if ($res2==TRUE){
                            $_SESSION['change-pwd']="<div class='success'> Password changed successfully </div>";
                            //redirct the user
                            header('location:'.SITEURL.'admin/manage_admin.php');
                        }
                        else{
                            $_SESSION['change-pwd']="<div class='error'> Failed to change password </div>";
                            //redirct the user
                            header('location:'.SITEURL.'admin/manage_admin.php');
                        }
                    }
                    else{
                        $_SESSION['pwd-not-found']="<div class='error'> Password did not match </div>";
                         //redirct the user
                         header('location:'.SITEURL.'admin/manage_admin.php');
                    }
               }
              
           }
        }
    ?>
<?php include('parsials/footer.php'); ?>
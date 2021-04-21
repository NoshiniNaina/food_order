<?php include('parsials/menu.php'); ?>

<!--Main section start-->
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE ADMIN</h1>
        <br/> <br/>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delte']);
            
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            
            }
            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            
            }
            if(isset($_SESSION['pwd-not-found'])){
                echo $_SESSION['pwd-not-found'];
                unset($_SESSION['pwd-not-found']);
            
            }
            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            
            }
        ?>
        <br> <br>
        <!--Botton to add admin-->
        <a href="add_admin_a.php" class="btn-primary">Add admin</a>
        <br/> <br/> <br/>
        <table class="tbl-full">
            <tr>
                <th>Sr no</th>
                <th>Full name</th>
                <th>User name</th>
                <th>Active</th>
            </tr>
            <?php
                //querry to get all admin
                $sql ="SELECT * FROM dbl_admin";
                //execute the querry
                $res =mysqli_query($conn,$sql);
                //check where the query is exceuted or not
                if( $res == TRUE){
                    $count= mysqli_num_rows($res);
                    $sn=1;
                    
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                            ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $full_name;?></td>
                                <td><?php echo $username;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id?>" class="btn-primary">Change password</a>
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id?>" class="btn-secondary">Update admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id?>" class="btn-danger">Delete admin</a>
                                </td>
                            </tr>
                            <?php
                           

                        }
                    }
                    else{

                    }
                }
                    
                    
            
                else{

                    
                }
            ?>
            
        </table>
    </div>
</div>
<!--Main section end-->

<!--Footer section start-->
<?php include('parsials/footer.php'); ?>
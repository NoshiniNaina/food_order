<?php include('parsials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update admin page</h1>
            <br> <br>

            <?php
                //GET THE id of selected id
                $id=$_GET['id'];
                //create the SQL querry to get the details
                $sql="SELECT * FROM dbl_admin WHERE id=$id";

                //execute the query
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                       $row=mysqli_fetch_assoc($res);
                       $full_name=$row['full_name'];
                       $username= $row['username'];
                    }
                }
                else{
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php  echo $full_name?>" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Userame</td>
                    <td>
                        <input type="text" name="username" value="<?php  echo $username?>"placeholder="Enter your username">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                    </td>
                </tr>
                </table>
            </form>
        </div>
    </div>
    <?php
        //check where the submit button is clicked or not
        if (isset($_POST['submit'])){
            //Get all the values from form update
            //echo $id= $_POST['id'];
            echo  $full_name = $_POST['full_name'];
            echo $username = $_POST['username'];

            //create sql query
            $sql= "UPDATE dbl_admin SET
            full_name= '$full_name',
            username= '$username'
            WHERE id=$id
            ";

            $res=mysqli_query($conn,$sql);
            if($res==TRUE){
                $_SESSION['update']="<div class='success'>Admin updated successfully</div>";
                header('location:'.SITEURL.'admin/manage_admin.php');
            } 
            else{
                $_SESSION['update']="<div class='error'>Failed to update</div>";
                header('location:'.SITEURL.'admin/manage_admin.php');
            }
        }
    ?>
<?php include('parsials/footer.php'); ?>
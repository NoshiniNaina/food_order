<?php include('parsials/menu.php'); ?>
<link rel="stylesheet" href="../css/addamin.css">
<div class="main-container">
    <div class="wrapper">
        <h1>Add admin</h1>
        <br /> <br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Userame</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('parsials/footer.php'); ?>

<?php
//process the value from and save it in database
//chack whether the button is clicked or not
    
    if (isset($_POST['submit'])) {
    //button click
    //echo "button clicked";
    //get the data from form;
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password incript with md5

    //SQL Querry to save the data into database

    $sql="INSERT INTO dbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
    
    
    //excute querry and save data in database
    
    
    $res = mysqli_query($conn,$sql) ;
    if($res==TRUE){
        $_SESSION['add']="Admin added successfully";
        header("location:".SITEURL.'admin/manage_admin.php');
    }
    else{
        $_SESSION['add']="Cant add admin";
        header("location:".SITEURL.'admin/add_admin.php');
    }
    }

?>
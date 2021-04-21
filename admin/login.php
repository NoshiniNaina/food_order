<?php include('../config/contant.php')?>
<html>
    <head>
        <title>Login-Food order system</title>
        <link rel="stylesheet" href="../css/admin_a.css">
    </head>
    <body>
        <div class="login" >
            <h1 class="text-center" >Login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])){
                     echo $_SESSION['no-login-message'];
                     unset ($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
            <form action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter username"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <br>
            <p class="text-center">Created by-<a href="www.noushinnaina.com">Noushin Naina</a></p>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password= ($_POST['password']);

        //SQL to check whether the user name and password exsit or not
        $sql="SELECT * FROM dbl_admin WHERE username='$username' AND password='$password'";
        $res=mysqli_query($conn,$sql);
        $count= mysqli_num_rows($res);
        if($count==1){
            
            $_SESSION['login']="<div class='success text-center'>Login successfully</div>";
            $_SESSION['user']= $username;//to check whether the user is login or not
            
            header('location:'.SITEURL.'admin/');
        }
        else{
            $_SESSION['login']="<div class='error text-center'>Cant login successfully</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>
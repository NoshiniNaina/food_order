<?php include('parsials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add category</h1>

            <br><br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br> <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>
                    <tr>
                        <td>Select image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="Yes">No
                        </td>
                    </tr>
                    <tr>
                        <td>Action:</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="Yes">No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                //check the submit button clicked or not
                if(isset($_POST['submit'])){
                    //1.Get the value from form
                    $title= $_POST['title'];

                    if(isset($_POST['featured'])){
                        //get the vale from form
                        $feature=$_POST['featured'];
                    }
                    else{
                        $feature="No";
                    }
                    if(isset($_POST['active'])){
                        $active=$_POST['active'];
                    }
                    else{
                        $active="No";
                    }
                    //check the image is selected or not
                    
                    //2.creat sql suerry to insert category into database
                    $sql="INSERT INTO dbl_catagory SET title='$title', featured='$feature',active='$active'";
                    //3.Execute the querry and save in database
                    $res= mysqli_query($conn, $sql);
                    //4. the querry executed or not
                    if($res==true){
                        //querry executed
                        $_SESSION['add']= "<div class='success'> Category Added successfully.</div>";
                        //Redirect to manage category page
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
                    else{
                        //failed to add category
                        $_SESSION['add']= "<div class='erroe'> Failed to add category .</div>";
                        //Redirect to manage category page
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
                }
            ?>
        </div>
    </div>
<?php include('parsials/footer.php'); ?>
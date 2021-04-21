<?php include('parsials/menu.php'); ?>
<!--Main section start-->
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1>
        <br /> <br />
        <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
        <br> <br>
        <!--Botton to add admin-->
        <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add category</a>
        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>Sr no</th>
                <th>Full name</th>
                <th>User name</th>
                <th>Active</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Naina</td>
                <td>Noushin Naina</td>
                <td>
                    <a href="a" class="btn-secondary">Update admin</a>
                    <a href="a" class="btn-danger">Delete admin</a>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Naina</td>
                <td>Noushin Naina</td>
                <td>
                    <a href="a" class="btn-secondary">Update admin</a>
                    <a href="a" class="btn-danger">Delete admin</a>
                </td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Naina</td>
                <td>Noushin Naina</td>
                <td>
                    <a href="a" class="btn-secondary">Update admin</a>
                    <a href="a" class="btn-danger">Delete admin</a>
                </td>
            </tr>
        </table>
    </div>
</div>
<!--Main section end-->
<?php include('parsials/footer.php'); ?>
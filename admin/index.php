<?php include('parsials/menu.php');?>

    <!--Main section start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br> <br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br> <br>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Catagories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Catagories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Catagories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Catagories
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--Main section end-->
<?php include('parsials/footer.php');?>
    
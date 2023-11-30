<?php require_once("../resources/config.php")?>


<?php include("../resources/templates/frontend/header.php")?>

<body>



    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <?php include("../resources/templates/frontend/side_nav.php");?>
            <div class="col-md-9">
                <?php include("../resources/templates/frontend/slider.php"); ?>
                <?php include("../resources/templates/frontend/products_grid.php"); ?>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <?php include("../resources/templates/frontend/footer.php")?>

</body>

</html>

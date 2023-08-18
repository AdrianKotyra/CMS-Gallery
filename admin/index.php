<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page
                            <br>
                            <small>Welcome <?php echo $_SESSION["fetched_firstname"]?></small>
                        </h1>



                    </div>
                </div>
                <!-- /.row -->
                <?php include "includes/admin_widgets.php" ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>

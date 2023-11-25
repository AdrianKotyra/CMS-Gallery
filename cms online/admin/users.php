
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
                       Users

                    </h1>



                </div>
            </div>
            <!-- /.row -->

            </div>



            <?php

                if(isset($_GET["source"])) {
                    $source = $_GET["source"];

                }
                else {
                    $source = "";
                }
                switch($source) {
                    case 'add_users';
                    include "./includes/add_users.php";
                    break;

                    case 'edit_user';
                    include "./includes/edit_users.php";
                    break;


                    default: include "includes/view_all_users.php";
                    break;




                }





            ?>

            <?php






            ?>












        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>

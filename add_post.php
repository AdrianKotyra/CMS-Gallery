<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>



    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">



            <?php if(!empty($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {
                    include "includes/add_post_form_user..php";

                    }


                ?>





            </div>
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>



</body>

</html>

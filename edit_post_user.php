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



            <?php if(isset($_GET["post_id"]) && !empty($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {
                    $post_id = $_GET["post_id"];
                    include "includes/edit_post_form.php";

                    }


                ?>




                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

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



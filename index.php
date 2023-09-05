<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>

    <?php



    ?>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">


            <?php if(isset($_GET["source"]) && !empty($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {
                    $source = $_GET["source"];

                    }
                    else {
                        $source = "";
                    }
                    switch($source) {
                        case 'view_profile' ;
                        include "includes/view_profile_main.php";
                        break;

                        case 'posts' ;
                        include "includes/posts_validation.php";
                        break;

                        case 'view_users' ;
                        include "includes/all_users_view.php";
                        break;


                        default: include "includes/register_form.php";
                        break;











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

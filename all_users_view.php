
<!-- ------FETCHING DATA USERS FROM SQL------ -->
<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>






    <?php

    // RESET COMMENT PAGE
    $_SESSION['comments_page']=1;

    ?>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>


    <!-- Page Content -->
    <div class="content_users">





        <div class="col-md-4 user_search_profiles">
            <?php include "includes/user_search.php"?>
        </div>




            <div class="col-md-12 all_users_content">




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
                        header("Location:all_users_view.php");
                        break;














                    }
                ?>
                <?php
                    global $connection;
                        $query = "SELECT * FROM users";

                        $select_user = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($select_user)) {
                            $user_name = $row["user_namee"];
                            $user_img = $row["user_image"];
                            $user_email = $row["user_email"];
                            $user_firstname = $row["user_firstname"];
                            $user_lastname = $row["user_lastname"];
                            $user_desc = $row["user_desc"];


                    ?>


                        <div class="row-user col-lg-3 col-sm-6 col-xs-12 mx-auto">

                            <div class="user_content ">
                                <div class="user_col ">
                                    <img class="img-fluid user_picture" src="img/<?php echo $user_img;?>">
                                    <div class="user_info">
                                        <p><b>Nickname:</b> <br><?php echo $user_name;?></p>
                                        <p><b>Name:</b><br><?php echo $user_firstname;?></p>
                                        <p><b>Lastname:</b><br><?php echo $user_lastname;?></p>
                                        <p><b>Email:</b><br><?php echo $user_email;?></p>
                                    </div>


                                </div>

                                <div class="user_col">
                                    <p class="user_desc">
                                        <?php echo $user_desc;?>
                                    </p>

                                </div>


                            </div>


                        </div>





                    <?php } ?>





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




        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>



</body>

</html>




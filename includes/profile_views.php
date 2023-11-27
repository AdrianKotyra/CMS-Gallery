
<!-- ------FETCHING DATA USERS FROM SQL------ -->
<!DOCTYPE html>
<html lang="en">



<body>






    <?php

    // RESET COMMENT PAGE
    $_SESSION['comments_page']=1;

    ?>

    <!-- Navigation -->

    <h1 class="views_head">
                <?php echo $_SESSION['fetched_login']. "s". "<br> recent views"?>

    </h1>


    <!-- Page Content -->
    <div class="content_users">

        <p><b>Total Views:</b>
        <?php
            global $connection;
            $fetched_id = $row["user_id"];
            $query = "SELECT * FROM profile_views where profile_view_id = $fetched_id";

            $select_user = mysqli_query($connection, $query);
            $view_counts = mysqli_num_rows($select_user);
            echo $view_counts
        ?>






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
                        $fetched_id = $row["user_id"];
                        $query = "SELECT * FROM profile_views where profile_view_id = $fetched_id ORDER BY id DESC LIMIT 9 " ;

                        $select_user = mysqli_query($connection, $query);
                        $view_counts = mysqli_num_rows($select_user);

                        while($row = mysqli_fetch_array($select_user)) {
                            $user_id = $row["user_id"];
                            $view_date = $row["view_date"];

                        $query_select_all_users = "SELECT * FROM users WHERE user_id = $user_id LIMIT 9" ;


                        $select_users = mysqli_query($connection, $query_select_all_users);


                        while($row = mysqli_fetch_array($select_users)) {
                            $user_name = $row["user_namee"];
                            $user_img = $row["user_image"];
                            $user_email = $row["user_email"];
                            $user_firstname = $row["user_firstname"];
                            $user_lastname = $row["user_lastname"];
                            $user_desc = $row["user_desc"];




                    ?>

                        <a class="row-user col-lg-4 col-sm-6 col-s-12 mx-auto" href="profile.php?user=<?php echo $user_id;?>">
                            <div >

                                <div class="user_content ">
                                    <div class="user_col ">
                                        <img class="img-fluid user_picture" src="img/<?php echo $user_img?>">
                                        <div class="user_info">
                                            <p><b>Nickname:</b> <br><?php echo $user_name;?></p>
                                            <p><span class="glyphicon glyphicon-time"></span> Vieved on <?php echo $view_date ?></p>
                                        </div>


                                    </div>

                                    <div class="user_col">
                                        <p class="user_desc">
                                            <?php echo $user_desc?>
                                        </p>

                                    </div>


                                </div>


                            </div>

                        </a>



                    <?php }}?>





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


    <?php include "includes/footer.php"
    ?>

</body>

</html>




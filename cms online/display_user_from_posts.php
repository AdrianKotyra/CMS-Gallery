
<!-- ------FETCHING DATA USERS FROM SQL------ -->


<
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


            <?php
            if(isset($_GET["user"])){
                $user_name_fetched = $_GET["user"];
            }
            $query = "SELECT * FROM users where user_namee='{$user_name_fetched}'";

            $select_user = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_user)) {
                $user_name = $row["user_namee"];
                $user_img = $row["user_image"];
                $user_email = $row["user_email"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_desc = $row["user_desc"];


        ?>



            <div class="row row-user" id="user_row_sub">

                <div class="col-md-8 user_content">
                    <div class="user_col " id="user_col_sub">
                        <img class="img-fluid user_picture"id="image_user_from_post" src="img/<?php echo $user_img;?>">
                        <div class="user_info">
                            <p><b>Nickname:</b> <br><?php echo $user_name;?></p>
                            <p><b>Name:</b><br><?php echo $user_firstname;?></p>
                            <p><b>Lastname:</b><br><?php echo $user_lastname;?></p>
                            <p><b>Email:</b><br><?php echo $user_email;?></p>
                            <a href="display_user_from_posts.php?user=<?php echo $user_name?>&posts">
                            <button class="btn btn-success">Show posts</button>
                            </a>

                        </div>


                    </div>

                    <div class="user_col">
                        <p class="user_desc">
                            <?php echo $user_desc;?>
                        </p>

                    </div>



                </div>


            </div>
            <?php
              if(isset($_GET["user"]) == $user_name && isset($_GET["posts"]) ) {
                    $user = $_GET["user"];
                    $query = "SELECT * FROM posts where post_author= '{$user}'ORDER BY post_id DESC";
                    $select_posts = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_posts)) {
                        $post_id = $row["post_id"];
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_content = substr($row["post_content"],0, 50);
                        $post_image =  $row["post_image"];
                        $post_status =  $row["post_status"];



            ?>
                <h2>
                <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="display_user_from_posts.php?user=<?php echo $post_author?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id?>" >

                <img class="img-responsive posts_img" id="image_sub_user" src="img/<?php echo $post_image;?>" alt="">
                </a>

                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php } }?>




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

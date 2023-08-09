<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if(isset($_GET["p_id"])) {
                    $post_id = $_GET["p_id"];




                    $query = "SELECT * FROM `posts` where post_id={$post_id}";
                    $select_posts = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_posts)) {
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_content = $row["post_content"];
                        $post_image = $row["post_image"];

                        ?>


                        <h1 class="page-header">
                        Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive " src="img/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>



                   <?php }  } ?>

            </div>          <!-- Blog Comments -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <hr>

        <!-- Posted Comments -->


        <?php
            if(isset($_POST["create_comment"])) {

                $comment_id_unique = $_GET["p_id"];
                $comment_content = $_POST["comment_content"];
                $comment_author = $_POST["comment_author"];
                $comment_email = $_POST["comment_email"];
                $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`) VALUES ('$comment_id_unique','$comment_author', '$comment_email' , '$comment_content' , now())";
                $create_comment_query = mysqli_query($connection, $query);





            }


        ?>



        <!-- Comment form-->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form method="POST" role="form">
                <div class="form-group">
                    <label for="comment_author">Author</label>
                    <input type="text" class="form-control" name="comment_author">
                </div>
                <div class="form-group">
                    <label for="comment_email">Email</label>
                    <input type="text" class="form-control" name="comment_email">
                </div>
                <div class="form-group">
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>



        <!-- SELECT COMMENTS -->
        <?php
            if(isset($_GET["p_id"])) {
                $post_id = $_GET["p_id"];
                $query = "SELECT * FROM comments where comment_id = {$post_id}";

                $select_comment_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_comment_query)) {
                    $comment_author_data = $row["comment_author"];
                    $comment_date_data = $row["comment_date"];
                    $comment_content_data = $row["comment_content"];




                    ?>



            <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php echo "$comment_author_data"?>
                                <small><?php echo "$comment_date_data"?></small>
                            </h4>
                            <?php echo "$comment_content_data"?>
                        </div>
            </div>


        <?php } }?>





        <!-- Comment to be displayed-->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>



        <div>
















            <div>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>


        </div>
        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>


</body>

</html>

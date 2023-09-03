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
            <div class="col-md-12 ">

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



                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="display_user_from_posts.php?user=<?php echo $post_author ?>"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive post_img" src="img/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>


                        <hr>



                <?php }  } ?>



                <!-- SELECT COMMENTS -->
                <!-- comment approved or comment_author_role="Admin" display comment -->
                <?php
                    $query = "SELECT * from comments where comment_post_id={$post_id} AND comment_status = 'approved' ORDER BY comment_id DESC";
                    $query_select_comments = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($query_select_comments)) {
                        $comment_author_data = $row["comment_author"];
                        $comment_date_data = $row["comment_date"];
                        $comment_content_data = $row["comment_content"];
                        $comment_img = $row["comment_img"];







                ?>




                <div class="media">
                    <a class="pull-left" href="display_user_from_posts.php?user=<?php echo $comment_author_data?>" >
                        <img width=140 height=140 class="media-object posts_images" src="./img/<?php echo "$comment_img"?>" alt="">
                    </a>

                    <div class="media-body">
                        <h4 class="media-heading"> <a href="display_user_from_posts.php?user=<?php echo $comment_author_data?>"><?php echo $comment_author_data ?></a>
                      <small><?php echo "$comment_date_data"?></small>
                        </h4>
                        <?php echo "$comment_content_data"?>
                    </div>

                </div>
                <?php }?>






                <hr>

                <!-- Posted Comments -->


                <!-- empty fields assigned variables -->
                <?php

                    $comment_content_field = "";

                ?>
                <?php
                    if(isset($_POST["create_comment"])) {

                        // if user is admin then comment status is approved so the post display straight away
                        $fetched_login = $_SESSION["fetched_login"];
                        $query = "SELECT * FROM users WHERE user_namee = '{$fetched_login}'";
                        $select_user_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($select_user_query)) {
                            $user_image = $row["user_image"];
                            $user_role = $row["user_role"];
                            $user_status = $row["user_status"];
                        }
                        // if user is admin or hes status is approved by admin comments are Approved.
                        if ($user_role=="Admin" || $user_status=="approved") {
                            $comment_status = "Approved";
                        }
                        else {
                            $comment_status = "";
                        }




                        $comment_id_unique = $_GET["p_id"];
                        $comment_content = $_POST["comment_content"];
                        $comment_author = $_SESSION["fetched_login"];

                        if( !empty($comment_content)) {
                            $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_content`, `comment_date`, `comment_img`, `comment_status`) VALUES ('$comment_id_unique','$comment_author' , '$comment_content' , now(), '$user_image', '$comment_status')";
                            $create_comment_query = mysqli_query($connection, $query);

                            // select certain post by given id and increment comment count
                            $query_update = "UPDATE posts SET post_comment_count={post_comment_count+1} where post_id = {$comment_id_unique}";
                            $select_post_query = mysqli_query($connection, $query_update);
                            header("Location:post.php?p_id={$comment_id_unique}");

                        }
                        else {

                            global $comment_content_field;


                            }
                            if(empty($comment_content)) {
                                $comment_content_field = "This field can not be empty";
                            }


                        }







                ?>



                    <div class="well col-md-6 ">
                        <h4>Leave a Comment:</h4>
                        <form method="POST" role="form">
                            <div class="form-group">
                                <textarea name="comment_content" class="form-control comment_field" rows="3" placeholder="<?php echo $comment_content_field ?>"></textarea>
                            </div>
                            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        </form>
                    </div>






            </div>
































        </div>
        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>


</body>

</html>

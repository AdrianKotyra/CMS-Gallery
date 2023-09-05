<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row post_container">

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
                          <!-- EDIT COMMENT -->

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
                        $comment_id =$row["comment_id"];






                ?>





                <div class="media">
                    <!-- checking if session login is equal to user comment and if true display option to edit comment  -->
                <?php if($comment_author_data==$_SESSION["fetched_login"]) {
                    ?>
                <div class="dropdown edit_comment" style="cursor:pointer";>
                  <div href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></div>
                  <ul class="dropdown-menu edit_comment_menu">
                    <li><a class='nav-link' href='./post.php?p_id=<?php echo $post_id?>&delete_comment=<?php echo $comment_id?>'>Delete comment  </a> </li>
                    <li><a class='nav-link edit_comment_button' >Edit comment</a> </li>


                  </ul>
                </div>
                <?php }?>
                    <a class="pull-left" href="display_user_from_posts.php?user=<?php echo $comment_author_data?>" >
                        <img width=140 height=140 class="media-object posts_images" src="./img/<?php echo "$comment_img"?>" alt="">
                    </a>

                    <div class="media-body">
                        <div class="date_and_drop_container">
                            <h4 class="media-heading name_date_plate"> <a href="display_user_from_posts.php?user=<?php echo $comment_author_data?>"><?php echo $comment_author_data ?></a>
                            <small><?php echo "$comment_date_data"?></small>


                                </h4>

                            </div>
                        </div>

                        <div>
                            <div class="edit_comment_textarea col-md-6">
                                <h4><small> Edit Comment:</small></h4>
                                <form method="POST" role="form" >
                                    <textarea name="comment_id" class="form-control comment_field comment_id" rows="3"><?php echo "$comment_id"?></textarea>
                                    <div class="form-group">
                                        <textarea name="comment_content" class="form-control comment_field" rows="3" placeholder=<?php echo "$comment_content_data"?>></textarea>
                                    </div>
                                    <button type="submit" name="update_comment" class="btn btn-primary">Update comment</button>
                                </form>
                            </div>


                            <p class='content_comment'><?php echo "$comment_content_data"?></p>



                        </div>


                </div>
                <?php }?>
                <?php
                // CHECKING HOW MANY COMMENT EACH POST HAVE AND IF MORE THAN 0 DISPLAY WIDGET TO CHANGE COMMENTS
                if(isset($_GET["p_id"])){
                    $post_id = $_GET["p_id"];
                    $query = "SELECT * from comments where comment_post_id = '{$post_id}'";
                    $query_select_comments = mysqli_query($connection, $query);
                    $comments_count = mysqli_num_rows($query_select_comments);
                    if( $comments_count>=6) {
                        ?>
                    <ul class="pager page_changer col-md-2">
                        <li class="previous">
                            <a href="#">&larr; Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer &rarr;</a>
                        </li>
                    </ul>








                <?php }}?>








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









            </div>

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
        <hr>



    </div>
    <?php
        if(isset($_POST["update_comment"])) {

            $comment_id = $_POST["comment_id"];
            // echo $comment_id;


            $updates_content_comment = $_POST["comment_content"];

            $query_update = "UPDATE comments SET comment_content='{$updates_content_comment}' where comment_id = '{$comment_id}'";
            $update_comment = mysqli_query($connection, $query_update);


            header("location:post.php?p_id=$post_id");
        }

    ?>



    <!-- DELETE COMMENT -->
    <?php
    if(isset( $_GET["delete_comment"])) {
        $comment_deleted =$_GET["delete_comment"];
        $query = "DELETE from comments WHERE comment_id={$comment_deleted}";
        $delete_comment = mysqli_query($connection, $query);
        header("location:post.php?p_id=$post_id");
    }
    ?>
    <!-- DELETE POST -->
    <?php
    if(isset( $_GET["delete_post"])) {
     if(isset($_GET["p_id"]) && $_GET["delete_post"] == "post") {
        $post_deleted = $_GET["p_id"];

        $query = "DELETE from posts WHERE post_id={$post_deleted}";
        $delete_post = mysqli_query($connection, $query);
        header("location:index.php?source=posts");
    }}
    ?>
    <?php include "includes/footer.php";
    ?>


</body>

</html>

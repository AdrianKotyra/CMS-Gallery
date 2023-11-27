<?php ob_start(); ?>

<?php
    include("posts_user_approved_unapproved_switch.php");

?>
<?php




    $query = "SELECT * FROM posts ORDER BY post_id DESC ";
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["post_id"];
        $post_title = $row["post_title"];
        $post_author = $row["post_author"];
        $post_date = $row["post_date"];
        $post_content = substr($row["post_content"],0, 50);
        $post_image =  $row["post_image"];
        $post_status =  $row["post_status"];
        $post_views = $row["post_views"];
        $post_likes = $row["likes"];

        $query_select_id_post_author = "SELECT * FROM users WHERE user_namee = '$post_author'";
        $query_select_id_post_author_query = mysqli_query($connection, $query_select_id_post_author);
        while ($row = mysqli_fetch_assoc($query_select_id_post_author_query)) {
        $author_id = $row["user_id"];
        }
        if($post_status !== "published") {
            echo "";
        }
        else {


        ?>




    <h2>
        <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
    </h2>
    <p class="lead">
        by <a href="display_user_from_posts.php?user=<?php echo $author_id?>"><?php echo $post_author ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
    <hr>
    <a href="post.php?p_id=<?php echo $post_id?>" >

    <img class="img-responsive posts_img" src="img/<?php echo $post_image;?>" alt="">
    </a>


    <div class="main_post_likes_view_cont">
        <p class=views_main>Views: <?php echo $post_views  ?></p>
        <p class=views_main>Likes: <?php echo $post_likes  ?></p>
    </div>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>




<?php } } ?>




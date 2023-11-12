<?php




    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["post_id"];
        $post_title = $row["post_title"];
        $post_author = $row["post_author"];
        $post_date = $row["post_date"];
        $post_content = substr($row["post_content"],0, 50);
        $post_image =  $row["post_image"];
        $post_status =  $row["post_status"];

        if($post_status !== "published") {
            echo "";
        }
        else {


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

    <img class="img-responsive posts_img" src="img/<?php echo $post_image;?>" alt="">
    </a>

    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>




<?php }  }?>
<?php
    include("posts_user_approved_unapproved_switch.php");

?>



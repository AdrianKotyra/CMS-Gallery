<?php

$user_logged_in = $_SESSION['fetched_login'];
$query = "SELECT * FROM posts where post_author='{$user_logged_in}'";
$select_posts = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row["post_id"];
    $post_title = $row["post_title"];
    $post_author = $row["post_author"];
    $post_date = $row["post_date"];
    $post_content = substr($row["post_content"],0, 50);
    $post_image =  $row["post_image"];
    $post_status =  $row["post_status"];

    if ($post_status== "unpublished" || $post_status== "") {
        include("post_user_unapproved.php");


    }

}



?>



<?php
    $user_logged_in = $_SESSION['fetched_login'];
    $query = "SELECT * FROM users where user_namee = '{$user_logged_in}'";
    $select_users = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_users);
    $user_status = $row["user_status"];
    $user_role = $row["user_role"];
    // only posts posted by admins and status approved
    if ($user_role=="Admin" ||  $user_status=="approved" ) {

        include("posts.php");
    }
    else {
        include("posts_all.php");
    }









?>
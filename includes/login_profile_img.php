<link  href="./css/stylesheet.css" rel="stylesheet" >
<?php

    global $connection;
    $login_username = $_SESSION["fetched_login"];
    $query = "SELECT * from users where user_namee= '{$login_username}'";
    $select_user_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_user_query)) {
        $user_img = $row["user_image"];

        echo "<a href='index.php?source=posts&profile=view'><img style='width:40px; height:40px;display: inline-block; border-radius: 50%; transform: translateY(-10px);' src='./img/$user_img'><a/>";

    }



?>
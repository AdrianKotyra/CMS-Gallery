<link  href="./css/stylesheet.css" rel="stylesheet" >
<?php
    if (!empty($_SESSION['fetched_login'])) {
        global $connection;
        $login_username = $_SESSION["fetched_login"];
        $query = "SELECT * from users where user_namee= '{$login_username}'";
        $select_user_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_user_query)) {
            $user_img = $row["user_image"];
            if ($user_img == '') {
                echo "<a href='index.php?source=posts&profile=view'><img class='profile_img_main' style='width:40px; height:40px;display: inline-block; border-radius: 50%;' src='./icons/avatar-default.png'><a/>";
            }
            else {
                echo "<a href='index.php?source=posts&profile=view'><img class='profile_img_main' style='width:40px; height:40px;display: inline-block; border-radius: 50%;' src='./img/$user_img'><a/>";
            }

        }
    }



?>
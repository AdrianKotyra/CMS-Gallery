<?php


    if (isset($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {


    ?>
       <?php
        // UPDATING POST UNAPPORVED IF VALUE BELOW 0 TO 0
        $query_select_posts = "SELECT * FROM posts where posts_unapproved_count<0";

        $select_post_query1 = mysqli_query($connection, $query_select_posts);
        while($row = mysqli_fetch_array( $select_post_query1)) {
            $posts_less_than_0 = $row["posts_unapproved_count"];
            if ($posts_less_than_0<0) {
                $posts_less_than_0=0;
                $query_update_posts_value_to_0 = "UPDATE posts SET posts_unapproved_count={$posts_less_than_0}";
                $update_unapproved_counts = mysqli_query($connection, $query_update_posts_value_to_0);
            }

        }


        $query = "SELECT SUM(posts_unapproved_count) from posts";
        $select_user_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_user_query)) {
            $sum_unapproved = $row['SUM(posts_unapproved_count)'];


        }



        ?>





    <div class="dropdown" style="cursor:pointer";>
        <div href="#" class="dropdown-toggle notification_cont" data-toggle="dropdown">
        <p class="notification_text">
            <?php echo "$sum_unapproved"?>
        </p>






       </i><img class="notification_img" width="40px" height="40px"src="./icons/email.png" alt=""></b></div>
        <ul class="dropdown-menu">
            <li>
                <a href="./admin/post.php"><i class="fa fa-fw fa-user"></i> <?php echo "<p>Unapproved posts .$sum_unapproved</p>"?></a>
            </li>
            <li>
                <a class="show_messages_button"><i class="fa fa-fw fa-user"></i> <?php echo "<p>Unreaded messages 0</p>"?></a>
            </li>
            <li>

                <a href="index.php?source=posts&profile=view"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>



            <li>
                <a href="index.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                <?php logout_user_main()?>
            </li>

        </ul>
    </div>




<?php }?>
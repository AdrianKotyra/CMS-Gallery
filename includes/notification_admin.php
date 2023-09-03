<?php


    if (isset($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {


    ?>
       <?php
     

        $query = "SELECT SUM(posts_unapproved_count) from posts";
        $select_user_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_user_query)) {
            $sum_unapproved = $row['SUM(posts_unapproved_count)'];

        }



        ?>





    <div class="dropdown" style="cursor:pointer";>
        <div href="#" class="dropdown-toggle notification_cont" data-toggle="dropdown"><p class="notification_text"><?php echo $sum_unapproved?></p></i><img class="notification_img" width="40px" height="40px"src="./icons/email.png" alt=""></b></div>
        <ul class="dropdown-menu">
            <li>
                <a href="./admin/post.php"><i class="fa fa-fw fa-user"></i> <?php echo "Unapproved posts ".$sum_unapproved?></a>
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
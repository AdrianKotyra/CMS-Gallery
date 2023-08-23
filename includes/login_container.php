<?php


if (isset($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {


    ?>


    <div class="dropdown" style="cursor:pointer";>
        <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php display_login()?><b class="caret"></b></div>
        <ul class="dropdown-menu">
            <?php
                $fetched_login = $_SESSION["fetched_login"];
                $query = "SELECT * FROM users WHERE user_namee = '{$fetched_login}'";
                $select_user_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($select_user_query)) {
                    $fetched_status = $row["user_role"];
                    if ($fetched_status==="Admin") {
                    echo "<li><a class='fa fa-fw fa-user' href='admin/index.php'>ADMIN</a></li>";
                    }

                }



            ?>
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
<?php
if ($_SESSION["fetched_password"] !==  "" && $_SESSION["fetched_login"] !== "") {


    ?>


    <div class="dropdown cursor-pointer">
        <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php display_login()?><b class="caret"></b></div>
        <ul class="dropdown-menu">
            <li>
                <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>

            <li>
                <a href="index.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                <?php logout_user_main()?>
            </li>
        </ul>
    </div>
<?php }?>
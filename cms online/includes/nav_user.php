






<nav>
  <div class="nav-container">
    <div class="nav-links">
      <img class="hamb" src="icons/hamburger.svg" alt="">
      <!-- -------NAV MOBILE-------- -->
      <div class="nav_mobile">
        <?php
          if (!empty($_SESSION['fetched_login'])) {
            $fetched_login = $_SESSION["fetched_login"];
            $query = "SELECT * FROM users WHERE user_namee = '{$fetched_login}'";
            $select_user_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($select_user_query)) {
              $fetched_status = $row["user_role"];
              if ($fetched_status==="Admin") {
                echo "<a class='nav-link' href='admin/index.php'>ADMIN</a>";
              }

            }
          }



        ?>
        <a class="nav-link catButton fa fa-user">Category<b class="caret"></b>
          <div class="cat_container">

          <?php
            $query = "SELECT * FROM categories";
            $query_select_category = mysqli_query($connection, $query);
            while($row =mysqli_fetch_assoc($query_select_category)) {
                $category = $row["category_title"];


                echo "<a class='mobile_cat_link'href='category.php?category='>{$category}</a>";


            }




          ?>

          </div>





        </a>






      </div>

      <!-- ----NAV WIDE SCREEN---- -->
      <div class="nav-links-box">
        <a class="nav-link " href="index.php?source=posts">HOME</a>
          <?php
            if (!empty($_SESSION['fetched_login'])) {
              $fetched_login = $_SESSION["fetched_login"];
              $query = "SELECT * FROM users WHERE user_namee = '{$fetched_login}'";
              $select_user_query = mysqli_query($connection, $query);
              while($row = mysqli_fetch_array($select_user_query)) {
                $fetched_status = $row["user_role"];
                if ($fetched_status==="Admin") {
                  echo "<a class='nav-link' href='admin/index.php'>ADMIN</a>";
                }

              }
            }



          ?>
        </a>

        <a class="nav-link " href='index.php?source=register'>Sign Up</a>
        <?php
        $query = "SELECT * FROM users";
        $query_select_users = mysqli_query($connection, $query);
        while($row =mysqli_fetch_assoc($query_select_users)) {
            $user_name = $row["user_namee"];
            $user_password = $row["user_password"];
          if ($_SESSION["fetched_password"] == $user_password  && $_SESSION["fetched_login"] == $user_name  && !empty($_SESSION['fetched_login'])) {




        ?>
        <div class="nav-link">
          <div class="dropdown" style="cursor:pointer";>
            <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Categories<b class="caret"></b></div>
            <ul class="dropdown-menu">
              <?php
                  $query = "SELECT * FROM categories";
                  $query_select_category = mysqli_query($connection, $query);
                  while($row =mysqli_fetch_assoc($query_select_category)) {
                      $category = $row["category_title"];
                      $category_id = $row["category_id"];

                      echo "<li><a href='category.php?category={$category_id}'>{$category}</a> </li>";


                  }




              ?>



            </ul>
          </div>


        </div>
        <?php }  } ?>

       <?php
        $query = "SELECT * FROM users";
        $query_select_users = mysqli_query($connection, $query);
        while($row =mysqli_fetch_assoc($query_select_users)) {
            $user_name = $row["user_namee"];
            $user_password = $row["user_password"];
          if ($_SESSION["fetched_password"] == $user_password  && $_SESSION["fetched_login"] == $user_name && !empty($_SESSION['fetched_login'])) {




        ?>
          <div class="nav-link">
            <div class="dropdown" style="cursor:pointer";>
              <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Users<b class="caret"></b></div>
              <ul class="dropdown-menu">
                <li><a href='index.php?source=view_users'>See all Users</a> </li>";



              </ul>
            </div>

          </div>
        <?php }  } ?>







        <?php
          if(isset($_GET["p_id"])) {
            $post_id = $_GET["p_id"];

            echo "<a class='nav-link' href='admin/post.php?source=edit_posts&post_id=$post_id'>Edit Post </a>";



          }







        ?>
      </div>
    </div>
    <div class="nav-profile-container">

        <div class="profile-box-components">
          <div class="profile-box-component"  >
            <?php include "login_container.php" ?>

          </div>
          <div class="profile-box-component"  >
            <?php include "login_profile_img.php"?>
          </div>

        </div>

    </div>























  </div>


</nav>

















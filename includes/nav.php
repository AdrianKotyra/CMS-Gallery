<nav>
  <div class="nav-container">
    <div class="nav-links">
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

        <a class="nav-link " href='index.php?source=register'>Sign Up</a>

          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Categories
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                    $query = "SELECT * FROM categories";
                    $query_select_category = mysqli_query($connection, $query);
                    while($row =mysqli_fetch_assoc($query_select_category)) {
                        $category = $row["category_title"];


                        echo "<li><a href='category.php?category='>{$category}</a> </li>";


                    }




                  ?>


            </ul>

        </a>
        <a>

          <?php
          if(isset($_GET["p_id"])) {
            $post_id = $_GET["p_id"];

            echo "<a class='nav-link' href='admin/post.php?source=edit_posts&post_id=$post_id'>Edit Post </a>";



          }







          ?>
        </a>








      </div>


      </div>


    <div class="nav-profile-container">
      <div class="profile-box">
        <div class="profile-box-components">
          <div class="profile-box-component"  >
            <?php include "includes/login_container.php" ?>

          </div>
          <div class="profile-box-component"  >
            <?php include "login_profile_img.php"?>
          </div>

        </div>

      </div>


    </div>






  </div>


</nav>

















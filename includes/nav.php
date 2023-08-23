

<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">

        <a class="navbar-brand " href="index.php?source=posts">HOME</a>
        <?php
          $fetched_login = $_SESSION["fetched_login"];
          $query = "SELECT * FROM users WHERE user_namee = '{$fetched_login}'";
          $select_user_query = mysqli_query($connection, $query);
          while($row = mysqli_fetch_array($select_user_query)) {
            $fetched_status = $row["user_role"];
            if ($fetched_status==="Admin") {
              echo "<a class='navbar-brand' href='admin/index.php'>ADMIN</a>";
            }

          }



        ?>

        <a class="navbar-brand" href='index.php?source=register'>Sign Up</a>
        <ul class="nav navbar-nav">

          <li class="dropdown" >
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
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
          </li>



        </ul>


    </div>
    <div class="navbar-brand nav navbar-nav navbar-right"  >
      <?php include "includes/login_container.php" ?>

    </div>
    <div class="navbar-brand nav navbar-nav navbar-right"  >
      <?php include "login_profile_img.php"?>
    </div>


    <div class="navbar-header ">
      <!-- EDIT POST LINK DISPLAY ON NAV IF USER CLICK ON ANY POST -->
      <?php
        if(isset($_GET["p_id"])) {
          $post_id = $_GET["p_id"];

          echo "<a class='navbar-brand' href='admin/post.php?source=edit_posts&post_id=$post_id'>Edit Post </a>'";



        }







      ?>


    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->


    <!-- /.navbar-collapse -->
</div>

</nav>












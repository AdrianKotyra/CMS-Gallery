

<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">

        <a class="navbar-brand " href="index.php">HOME</a>
        <a class="navbar-brand" href='admin/index.php'>ADMIN</a>
        <div class="navbar-brand" >   <?php include "includes/login_container.php" ?></div>

    </div>

    <ul class="nav navbar-nav navbar-right">

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
      </li>

    </ul>
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












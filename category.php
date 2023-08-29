<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                    if(isset($_GET["category"])) {
                        $category_id = $_GET["category"];

                        $query = "SELECT * FROM `posts` where post_category_id = {$category_id}";
                        $select_posts = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $post_id = $row["post_id"];
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_content = substr($row["post_content"],0, 50);
                            $post_image =  $row["post_image"]

                            ?>




                            <!-- First Blog Post -->
                            <h2>
                            <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                            <hr>
                            <a href="post.php?p_id=<?php echo $post_id?>" >
                            <img class="img-responsive" src="img/<?php echo $post_image;?>" alt="">
                            </a>

                            <hr>
                            <p><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>



                   <?php }} ?>




















                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>


</body>

</html>

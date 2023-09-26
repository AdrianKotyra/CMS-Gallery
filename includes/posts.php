<script><?php include "./js/custom.js"?> </script>
<?php


    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["post_id"];
        $post_title = $row["post_title"];
        $post_author = $row["post_author"];
        $post_date = $row["post_date"];
        $post_content = substr($row["post_content"],0, 50);
        $post_image =  $row["post_image"];
        $post_status =  $row["post_status"];

        if($post_status !== "published") {
            echo "";
        }
        else {

        global $connection;
        // CHECKING IF POST AUTHOR === USER LOGGED USING SESSION LOGIN NAME
        $fetched_login = $_SESSION["fetched_login"];
        $query = "SELECT * FROM `posts` WHERE post_author = '{$fetched_login}'";
        $select_posts_LOGGED_user = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts_LOGGED_user)) {
            $post_author = $row["post_author"];
        }

        ?>




        <h2>
            <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <a href="display_user_from_posts.php?user=<?php echo $post_author?>"><?php echo $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>

        <?php

        // DISPLAYING EDIT AND DELETE POST IF USER IS THE CREATOR BY CHECKING SESSION LOGIN IF ITS EQUAL BY POST AUTHOR

        if ($fetched_login===$post_author) {
            ?>

            <div class="nav-link">
            <div class="dropdown edit_drop" style="cursor:pointer";>
                <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   <button class="btn btn-success">Edit Post</button><b class="caret"></b></div>
                <ul class="dropdown-menu">
                <li><a class='nav-link' href='./edit_post_user.php?post_id=<?php echo $post_id?>'><p>Edit Post</p> </a> </li>
                <li><a class='nav-link publishPostButtonAction'><p>Delete Post</p></a> </li>
                <!-- INVISIBLE BUTTON TO BE CLICKED BY FAKE JS BUTTON to make changes -->
                <li><a class='applyButton2' href='./post.php?p_id=<?php echo $post_id?>&delete_post=post'>Delete Post </a> </li>
                <!-- INVOKING DELETE SCRIPT IF BUTTON IS CLICKED -->



                </ul>
            </div>

            </div>


        <?php } ?>

    <hr>
    <a href="post.php?p_id=<?php echo $post_id?>" >
    <img class="img-responsive posts_img" src="img/<?php echo $post_image;?>" alt="">
    </a>

    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>





<?php }  }?>
<!--
CREATING SCRIPT TO DELETE EACH POST INDIVIDUALLY BASED ON ITS POST ID LINK GET -->
<script>
    const deleteButtons = document.querySelectorAll(".publishPostButtonAction");

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            confirmationWindow("delete");
        });
    });
</script>

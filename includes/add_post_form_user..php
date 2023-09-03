
<?php


if(isset($_POST['create_post'])) {


    echo '<h2 class="text-center">Post have been added</h2>';

    $post_user =   $_SESSION["fetched_login"];


    $query = "SELECT * FROM users where user_namee = '{$post_user}'";
    $select_users = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users)) {
        $user_status = $row["user_status"];
        $user_role = $row["user_role"];

    }





    $post_title        = $_POST['post_title'];

    $post_category_id  = $_POST['post_category'];
    $posts_unapproved_count = 0;


    // if user status is approved by admin to "approved" then post is visible;
    if ($user_status=="Approved" || $user_role=="Admin" ) {
        $post_status = "published";
        $posts_unapproved_count = $posts_unapproved_count+0;

    }
    else {

        $post_status       = "unpublished";
        $posts_unapproved_count = $posts_unapproved_count+1;

    }


    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];


    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    $post_date         = date('d-m-y');


    move_uploaded_file($post_image_temp, "./img/$post_image" );


    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, posts_unapproved_count) ";

    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}','{$posts_unapproved_count}')";

    $create_post_query = mysqli_query($connection, $query);


}








?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>


    <!-- <div class="form-group">
        <label for="Post_Category_Id">Post Category Id</label>
        <input type="text" class="form-control" name="Post_Category_Id">
    </div> -->


    <label for="category">Category</label>
    <div class="form-group">

       <select name="post_category" id="">

            <?php

                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);



                while($row = mysqli_fetch_assoc($select_categories )) {
                    $cat_id = $row['category_id'];
                    $cat_title = $row['category_title'];


                    echo "<option value='$cat_id'>{$cat_title}</option>";


                }

            ?>


       </select>

    </div>




    <!-- <div class="form-group">
        <label for="Post_Status">Post Status</label>
        <input type="text" class="form-control" name="Post_Status">
    </div> -->



    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "name="post_content" id="" cols="30" rows="10"></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>





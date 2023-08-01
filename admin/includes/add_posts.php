<?php
    if(isset($_POST['create_post'])) {
        $form_title = $_POST["post_title"];
        $form_Post_Category_Id = $_POST["Post_Category_Id"];
        $form_author = $_POST["post_author"];
        $form_Post_Status = $_POST["Post_Status"];
        $form_image = $_FILES["image"]["name"];
        $form_image_temp = $_FILES["image"]["tmp_name"];
        $form_post_tags = $_POST["post_tags"];
        $form_post_content = $_POST["post_content"];
        $form_date = date('d-m-y');
        $form_comment_count = 4;

        move_uploaded_file($form_image_temp, "../img/$form_image");


        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

        $query .= "VALUES({$form_Post_Category_Id},'{$form_title}','{$form_author}',now(),'{$form_image}','{$form_post_content}','{$form_post_tags}','{$form_comment_count}','{$form_Post_Status}') ";

        $query_posts_form = mysqli_query($connection, $query);




    }







?>









<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>


    <div class="form-group">
        <label for="Post_Category_Id">Post Category Id</label>
        <input type="text" class="form-control" name="Post_Category_Id">
    </div>



    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="Post_Status">Post Status</label>
        <input type="text" class="form-control" name="Post_Status">
    </div>







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
        <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>
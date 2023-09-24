
<script><?php include "./js/custom.js"?> </script>

<!-- SELECT POSTS ABD DISPLAY IN FORM -->
<?php
    global $connection;
    if(isset($_GET["post_id"])) {
        $post_id_to_be_edited = $_GET["post_id"];
        $query = "SELECT * from posts where post_id={$post_id_to_be_edited}";
        $select_categories_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_categories_query)) {
            $post_id = $row["post_id"];
            $post_category_id = $row["post_category_id"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_date = $row["post_date"];
            $post_content = $row["post_content"];
            $post_tags = $row["post_tags"];
            $post_status = $row["post_status"];
            $post_image = $row['post_image'];



        }


    }




?>

<!-- UPDATE  POST FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["post_id"])) {
        global $connection;
        $post_id_to_be_edited = $_GET["post_id"];
    }




    if(isset($_POST["edit_post"])) {
        echo '<script> submitWindowTimed() </script>';
        $post_author         = $_SESSION['fetched_login'];
        $post_title          =  $_POST['post_title_input'];
        $post_status         =  $_POST['Post_Status'];
        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];
        $post_content        =  $_POST['post_content'];
        $post_tags           =  $_POST['post_tags'];
        $post_category_id    =  $_POST['post_category'];

        if(empty($post_image)) {

            $query = "SELECT * FROM posts WHERE post_id = $post_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            $row = mysqli_fetch_array($select_image);
            $post_image = $row['post_image'];
        }


        $query_update = "UPDATE posts SET ";
        $query_update .="post_title  = '{$post_title}', ";
        $query_update .="post_category_id = '{$post_category_id}', ";
        $query_update .="post_date   =  now(), ";
        $query_update .="post_author = '{$post_author}', ";
        $query_update .="post_status = '{$post_status}', ";
        $query_update .="post_tags   = '{$post_tags}', ";
        $query_update .="post_content= '{$post_content}', ";
        $query_update .="post_image  = '{$post_image}' ";
        $query_update .= "WHERE post_id = {$post_id_to_be_edited} ";

        $update_post= mysqli_query($connection,$query_update);

        move_uploaded_file($post_image_temp, "./img/$post_image");
















    }







?>




<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control post_title_input" name="post_title_input" value=<?php echo "$post_title"?> required>
    </div>


    <div class="form-group">
        <select name="post_category" id="">
            <?php
                global $connection;

                $query ="SELECT * from categories";
                $select_category = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_category)) {
                    $category_title = $row["category_title"];
                    $category_id = $row["category_id"];


                    echo "<option value='{$category_id}'>{$category_title}</option>";
                }



            ?>



        </select>

    </div>




    <div class="form-group">
        <select name="Post_Status" id="">



            <option value='published'>published</option>";
            <option value='unpublished'>unpublished</option>";



        </select>

    </div>







    <div class="form-group">

        <img class="posts_img"src="./img/<?php echo"$post_image" ?>" alt="">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value=<?php echo "$post_tags"?>>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control post_content_input" name="post_content" id="" cols="30" rows="10" required>  <?php echo "$post_content"?></textarea>
    </div>





    <div class="form-group">
        <input class="btn btn-primary publishPostButtonAction" value="Edit Post">
    </div>

    <div class="form-group">
        <input class="btn btn-primary publishPostButton" type="submit" name="edit_post" value="Edit Post">
    </div>




</form>


<script>
    actionItemsBySelectionPost("edit");
</script>




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
            $post_image = $row["post_image"];
            $post_content = $row["post_content"];
            $post_tags = $row["post_tags"];
            $post_status = $row["post_status"];

        }


    }



?>




<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value=<?php echo "$post_title"?>>
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
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value=<?php echo "$post_author"?>>
    </div>

    <div class="form-group">
        <label for="Post_Status">Post Status</label>
        <input type="text" class="form-control" name="Post_Status" value=<?php echo "$post_status"?>>
    </div>







    <div class="form-group">

        <img width=200 src="../img/<?php echo"$post_image" ?>" alt="">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value=<?php echo "$post_tags"?>>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">  <?php echo "$post_content"?></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Edit Post">
    </div>





</form>


<?php
    if(isset($_GET["post_id"])) {
        global $connection;
        $post_id_to_be_edited = $_GET["post_id"];
        if(isset($_POST["edit_post"])) {
            $query ="SELECT * from posts WHERE post_id={$post_id_to_be_edited}";
            $select_post = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post)) {
                $row["post_category_id"] = $_POST["Post_Category_Id"];
                $row["post_title"] = $_POST["post_title"];
                $row["post_author"] = $_POST["post_author"];
                $row["post_status"] = $_POST["Post_Status"];
                $row["post_image"] = $_POST["image"];
                $row["post_tags"] = $_POST["post_tags"];
                $row["post_content"] = $_POST["post_content"];

            }




        }
    }









?>
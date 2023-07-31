<?php

function insert_categories() {
    global $connection;

    if(isset($_POST["submit"])){
        $new_cat = $_POST["cat_title"];
        if($new_cat=="" || empty($new_cat)) {
            echo "<h3> THIS FIELD CANT BE EMPTY</h3>";
        }
        else {
            $query="INSERT INTO categories(category_title) VALUE('{$new_cat}')";
            $insert_cat = mysqli_query($connection, $query);
        }

    }


}


function update_category() {
    global $connection;
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($categories)) {
        $cat_title = $row["category_title"];
        $cat_id = $row["category_id"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete_cat={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?update_cat={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }
}


function delete_category() {
    global $connection;
    if(isset($_GET['delete_cat'])) {
        $cat_id_get= $_GET["delete_cat"];
        $query ="DELETE from categories WHERE category_id={$cat_id_get}";
        $delete_category = mysqli_query($connection, $query);
        header("location:categories.php");
    }
}


function select_categories() {
    global $connection;
    if(isset($_GET['update_cat'])) {
        $cat_id_get= $_GET["update_cat"];
        $query ="SELECT * from categories WHERE category_id={$cat_id_get}";
        $update_category = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($update_category)) {
            $category_to_be_updated = $row["category_title"];



    ?>
    <input value="<?php if(isset($category_to_be_updated)) {echo $category_to_be_updated;}?>" class="form-control" type="text" name="cat_title_update">
    <?php }} ?>

    <?php
    if(isset($_GET["update_cat"])) {
    include "update_categories.php";
    }


}

function select_and_display_categories_posts() {
    global $connection;
    $query = "SELECT * from posts";
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

        echo"<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";
        echo "<td>$post_category_id</td>";
        echo "<td>$$post_status</td>";
        echo "<td><img width=100 height=100 src='../img/$post_image'></td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_content</td>";
        echo "<td>$post_date</td>";
        echo"</tr>";





    }









}










?>
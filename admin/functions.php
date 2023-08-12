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


function select_and_display_comments() {
    global $connection;

    $query = "SELECT * from comments";
    $select_comment_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_comment_query)) {
        $comment_id = $row["comment_id"];
        $comment_post_id = $row["comment_post_id"];
        $comment_author = $row["comment_author"];
        $comment_email = $row["comment_email"];
        $comment_content = $row["comment_content"];
        $comment_status = $row["comment_status"];
        $comment_date = $row["comment_date"];
        $comment_id_unique = $row["comment_post_id"];




        echo"<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";



        echo "<td>{$comment_email}</td>";
        // SELECT POST BY ID AND GET NAME
        $query_post_id = "SELECT * FROM posts where post_id={$comment_id_unique}";
        $select_post_query = mysqli_query($connection, $query_post_id);
        while($row = mysqli_fetch_assoc($select_post_query)) {
            $post_name = $row["post_title"];


        }

        // SELECT COMMENT BY ID AND CHANGE STATUS
        if(isset($_GET["approve"])) {
            $comment_status_id = $_GET["approve"];
            $query_update_comment = "UPDATE comments SET comment_status= 'approved' where comment_id={$comment_status_id}";
            $update_comment_query = mysqli_query($connection, $query_update_comment);
            header("Location: comments.php");

        }
        if(isset($_GET["unapprove"])) {
            $comment_status_id = $_GET["unapprove"];
            $query_update_comment = "UPDATE comments SET comment_status= 'unapproved' where comment_id={$comment_status_id}";
            $update_comment_query = mysqli_query($connection, $query_update_comment);
            header("Location: comments.php");

        }



        // else {
        //     $source = "";
        // }
        // switch($source) {
        //     case 'approve';
        //     echo  "<td> approved </td>";
        //     break;

        //     case 'unapprove';
        //     echo  "<td> unapproved </td>";
        //     break;


        //     default:  echo  "<td> awaiting  </td>";
        //     break;




        // }
        echo  "<td> $comment_status</td>";
        echo "<td><a href='../post.php?p_id=$comment_id_unique'>$post_name</td>";

        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td>$comment_date</td>";

        echo "<td><a href='comments.php?source=edit_comment&comment_id={$comment_id}'>EDIT</a></td>";
        echo "<td><a href='comments.php?delete_comment={$comment_id}'>DELETE</a></td>";
        echo"</tr>";
    }}


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
        $post_comment_count = $row["post_comment_count"];




        echo"<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";


        // SELECT some categories using post id
        global $connection;
        $query = "SELECT * FROM categories where category_id={$post_category_id}";
        $categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($categories)) {
            $cat_title = $row["category_title"];



        }

        echo "<td>{$cat_title}</td>";
        echo "<td>$$post_status</td>";
        echo "<td><img width=100 height=100 src='../img/$post_image'></td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_content</td>";


        echo "<td>$post_comment_count</td>";


        echo "<td>$post_date</td>";
        echo "<td><a href='post.php?source=edit_posts&post_id={$post_id}'>EDIT</a></td>";
        echo "<td><a href='post.php?delete_post={$post_id}'>DELETE</a></td>";
        echo"</tr>";

        // DELETE posts
        if(isset($_GET["delete_post"])) {
            $post_to_be_deleted = $_GET["delete_post"];
            $query = "DELETE from posts WHERE post_id={$post_to_be_deleted}";
            $delete_post = mysqli_query($connection, $query);
            header("location:post.php");
        }



    }
}

 // DELETE comments
function delete_comments() {
    global $connection;


    if(isset($_GET["delete_comment"])) {
        $post_to_be_deleted = $_GET["delete_comment"];
        $query = "DELETE from comments WHERE comment_id={$post_to_be_deleted}";
        $delete_comment = mysqli_query($connection, $query);
        header("location:comments.php");
    }
}
// Delete users


function select_and_display_users() {
    global $connection;

    $query = "SELECT * from users";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row["user_id"];
        $user_name = $row["user_namee"];
        $user_password = $row["user_password"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_email = $row["user_email"];
        $user_image = $row["user_image"];
        $user_role = $row["user_role"];
        $user_randSalt = $row["randSalt"];


        echo"<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_password</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_image</td>";
        echo "<td>$user_role</td>";
        echo "<td>$user_randSalt</td>";
        echo "<td><a href='users.php?edit_user={$user_id}'>EDIT</a></td>";
        echo "<td><a href='users.php?delete_user={$user_id}'>DELETE</a></td>";
        echo"</tr>";


        if(isset($_GET["delete_user"])) {
            $user_to_be_deleted = $_GET["delete_user"];
            $query = "DELETE from users WHERE user_id={$user_id}";
            $delete_user = mysqli_query($connection, $query);
            header("location:users.php");
        }
    }
}
// function delete_users() {
//     global $connection;



// }




















?>
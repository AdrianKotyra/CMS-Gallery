<?php
    if(isset($_POST["update"])) {
        $cat_id = $_GET["update_cat"];
        $the_cat_title_update = $_POST["cat_title_update"];
        $query2 = "UPDATE categories SET category_title = '$the_cat_title_update' WHERE category_id='$cat_id'";
        $update_category2 = mysqli_query($connection, $query2);
    }

?>
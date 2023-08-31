<!-- login  -->
    <?php
    if(empty($_SESSION["fetched_login"])) {
        include "login_input_component.php";

    }

    ?>

    <?php
        if(!empty($_SESSION["fetched_login"]) && isset($_GET["source"])=="posts") {
            include "blog_search.php";

        }

    ?>

    <?php
        if(isset($_GET["category"])) {
            $category = $_GET["category"];
            include "blog_search.php";

        }

    ?>

    <?php
        if(isset($_GET["source"])) {
            $source = $_GET["source"];
        }
        else {
            $source = "";
        }
        switch($source) {
            case 'view_users';
            include "user_search.php";
            break;


            // case 'posts';
            // include "blog_search.php";
            // break;




        }
    ?>



    <!-- Blog Categories Well -->




    <!-- Side Widget Well -->
    <?php include "widget.php";?>
</div>
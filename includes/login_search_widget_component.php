<!-- login  -->
<div class="well">
        <h4>login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input placeholder="username"name="username" type="text" class="form-control" >


            </div>
            <div class="input-group">
                <input placeholder="password"name="password"  placeholder="password" type="password" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit

                    </button>



                </span>



            </div>


        </form>
        <!-- /.input-group -->
    </div>

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


            case 'posts';
            include "blog_search.php";
            break;




        }
    ?>



    <!-- Blog Categories Well -->




    <!-- Side Widget Well -->
    <?php include "widget.php";?>
</div>
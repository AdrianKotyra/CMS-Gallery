<!-- login  -->
<div class="well">
        <h4>login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input placeholder="username"name="username" type="text" class="form-control">


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



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>

        </form>
        <!-- /.input-group -->
    </div>



    <!-- Blog Categories Well -->


    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                        $query = "SELECT * FROM categories";
                        $categories_sidebar = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($categories_sidebar)) {
                            $cat_title = $row["category_title"];
                            $cat_id = $row["category_id"];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

                        }

                    ?>


                </ul>
            </div>


        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php";?>
</div>
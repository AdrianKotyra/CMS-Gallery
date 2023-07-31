<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page
                            <small>Welcome</small>
                        </h1>

                    </div>
                </div>
                <div class="col-xs-6">

                    <?php insert_categories();?>








                    <form method="POST">


                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">



                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary"type="submit" name="submit" value="Add Category">



                        </div>

                        <div class="form-group">
                            <label for="cat_title">Update Category</label>



                            <?php select_categories(); ?>







                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary"type="submit" name="update" value="Update Category">



                        </div>







                    </form>
                </div>


                <div class="col-xs-6">
                    <table class="table table-borderED">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php update_category();?>

                            <?php delete_category();?>



















                        </tbody>
                    </table>



                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>

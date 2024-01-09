<?php include("includes/header.php"); ?>
        <?php
            $message = "";
            if(isset($_POST["create"])) {
                $user = new Users;
                $user->username = $_POST["username"];
                $user->first_name = $_POST["first_name"];
                $user->last_name = $_POST["last_name"];
                $user->password = $_POST["user_password"];
                $message = "New user has been created.";
                $user->save();


            }


        ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("./includes/nav.php")?>
            <?php include("./includes/sidebar.php")?>

        </nav>


        <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">
                Add Users

            </h1>
            <!-- Page Heading -->
            <div class="row">

                <form action="" method="post" enctype="multipart/form-data">



                    <div class="col-lg-8">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" name="username" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="text" name="user_password" class="form-control" >
                            </div>
                            <div class="form-group">

                                <input type="submit" name="create" class="btn btn-primary" >
                            </div>

                            <?php echo $message;?>




                        </div>

                    </div>


                </form>
            </div>

            <!-- /.row -->


        </div>
<!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>
    <?php if(empty($_GET["id"])) {
        redirect("users.php");
    }

    $user = users::find_by_id($_GET["id"]);



    ?>
        <?php
            $message = "";
            if(isset($_POST["update"])) {

                if($user) {
                    $user->username = $_POST["username"];
                    $user->first_name = $_POST["first_name"];
                    $user->last_name = $_POST["last_name"];
                    $user->password = $_POST["user_password"];

                    if(empty($_FILES["user_image"])) {
                        $user->save();
                        redirect("edit_users.php?id={$_GET["id"]}");
                    } else {
                        $user->set_file($_FILES["user_image"]);
                        $user->save_user_and_image();
                        $user->save();
                        $message = "User has been updated.";
                        redirect("edit_users.php?id={$user->id}");
                    }








                }


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
                Edit Users

            </h1>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-6">

                    <img width="120" height="120"src="<?php echo $user->image_path_and_placeholder()?>" alt="">

                </div>
                <form action="" method="post" enctype="multipart/form-data">



                    <div class="col-lg-8">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">File</label>
                                <input type="file" name="user_image" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control"  value="<?php echo $user->first_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control"  value="<?php echo $user->last_name ?>">
                            </div>

                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="text" name="user_password" class="form-control"  value="<?php echo $user->password ?>">
                            </div>
                            <div class="form-group">

                                <input type="submit" name="update" class="btn btn-primary pull-left" value="Update">
                                <a class="btn btn-primary pull-right alert-danger" href="delete_user.php?id=<?php echo $user->id?>">Delete</a>

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
<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("./includes/nav.php")?>
            <?php include("./includes/sidebar.php")?>
        </nav>

        <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <?php $users = users::find_all();
                            ?>
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php

                                    foreach ($users as $user) :

                                ?>




                                <tr>
                                    <td><img width="120" height="120"src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                                        <div class="active_links">
                                            <a href="delete_user.php?id=<?php echo $user->id?>">Delete</a>
                                            <a href="edit_users.php?id=<?php echo $user->id?>">Edit</a>
                                            <a href="">View</a>

                                        </div>

                                    </td>

                                    <td><?php  echo $user->id ?></td>
                                    <td><?php  echo $user->username ?></td>
                                    <td><?php  echo $user->first_name ?></td>
                                    <td><?php  echo $user->last_name ?></td>




                                </tr>
                                <?php endforeach; ?>


                            </tbody>




                        </table>




                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
<!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
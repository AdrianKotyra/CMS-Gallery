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
                        Photos
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <?php $photos = photo::find_all();
                            ?>
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>File Name</th>
                                    <th>type</th>
                                    <th>size</th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php

                                    foreach ($photos as $photo) :

                                ?>




                                <tr>
                                    <td><img width="120" height="120"src="<?php echo $photo->picture_path()?>" alt="">
                                        <div class="pictures_link">
                                            <a href="delete_photo.php/?id=<?php echo $photo->id?>">Delete</a>
                                            <a href="">Edit</a>
                                            <a href="">View</a>

                                        </div>

                                    </td>
                                    <td><?php  echo $photo->id ?></td>
                                    <td><?php  echo $photo->title ?></td>
                                    <td><?php  echo $photo->description ?></td>
                                    <td><?php  echo $photo->filename ?></td>
                                    <td><?php  echo $photo->type ?></td>
                                    <td><?php  echo $photo->size ?></td>



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
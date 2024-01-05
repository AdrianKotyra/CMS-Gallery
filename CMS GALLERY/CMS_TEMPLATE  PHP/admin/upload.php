<?php include("includes/header.php");
    $var = $session->is_signed_in();
    if($var === false) {
        redirect("login.php");
    }
    $message = "";
    if(isset($_POST["submit"])) {
        $photo = new Photo();
        $photo->title=$_POST["title"];

        $photo->set_file($_FILES["file_upload"]);


        if($photo->save()) {
            $message = "Upload was successful";
        } else {
            $message = join("<br>" , $message = $photo->errors);
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

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Uploads
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-6">
                        <?php echo $message;?>
                        <form action="upload.php" method=POST enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            <input type="submit" name="submit" >






                        </form>
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
<!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>
<?php
    $var = $session->is_signed_in();
  if($var === false) {
    redirect("login.php");
  }

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("./includes/nav.php")?>
            <?php include("./includes/sidebar.php")?>
        </nav>

        <div id="page-wrapper">
            <?php include("./includes/admin_content.php")?>


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
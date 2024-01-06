<?php include("../includes/init.php"); ?>
<?php
    $var = $session->is_signed_in();
  if($var === false) {
    redirect("login.php");
  }

?>
<?php

  if(empty($_GET['id'])) {
    redirect("../photos.php");
  }
  $photo = Photo::find_by_id($_GET['id']);
  if($photo) {
    $photo->delete_photo();
    redirect("../photos.php");
  } else {
    redirect("../photos.php");
  }



?>
<?php include("../includes/init.php"); ?>
<?php
    $var = $session->is_signed_in();
  if($var === false) {
    redirect("login.php");
  }

?>
<?php

  if(empty($_GET['id'])) {
    redirect("../users.php");
  }
  $user = users::find_by_id($_GET['id']);
  if($user) {
    $user->delete_user();
    redirect("users.php");
  } else {
    redirect("users.php");
  }



?>
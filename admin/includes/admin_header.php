<?php include "../includes/head.php"?>
<?php include "functions.php"?>


<?php ob_start(); ?>






<!-- SEND BACK TO INDEX.PHP IF USER DONT HAVE NOT ADMIN -->

<?php
  if(isset($_SESSION["fetched_user_role"])) {
    $_SESSION["fetched_user_role"];
    if($_SESSION["fetched_user_role"]!=="Admin") {
        header("Location: ../index.php?source=posts");
    }

  }



?>
<!-- SEND BACK TO INDEX.PHP IF USER NOT LOGGED IN -->
<?php
  if($_SESSION["fetched_firstname"]=="" || empty($_SESSION['fetched_firstname'])) {
    header("Location: ../index.php");
  }


?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS PROJECT</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stylesheet.css"rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">



  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</head>
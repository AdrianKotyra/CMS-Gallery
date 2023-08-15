<?php include "../includes/head.php"?>
<?php include "functions.php"?>

<?php session_start(); ?>
<?php ob_start(); ?>








<?php
  if(isset($_SESSION["fetched_user_role"])) {
    $_SESSION["fetched_user_role"];
    if($_SESSION["fetched_user_role"]!=="Admin") {
        header("Location: ../index.php");
    }




  }




?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS PROJECT</title>

    <link rel="stylesheet" href="../../css/stylesheet.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">



    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php include "admin_footer.php" ?>

</head>
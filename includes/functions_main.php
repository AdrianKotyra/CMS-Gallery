
<?php session_start(); ?>
<?php ob_start(); ?>
<?php
function start_session_default() {
    $_SESSION["fetched_password"] =  "";
    $_SESSION["fetched_login"] =  "";
  
}


function display_login() {
    if ($_SESSION["fetched_password"] !==  "" && $_SESSION["fetched_login"] !== "") {
        echo $_SESSION["fetched_login"];

    }
}
function logout_user_main() {
    if(isset($_GET["logout"])) {
        header("location:./index.php");
        $_SESSION["fetched_password"] =  "";
        $_SESSION["fetched_login"] =  "";
        $_SESSION["fetched_id"] =  "";
        $_SESSION["fetched_firstname"] =  "";
        $_SESSION["fetched_last_name"] =  "";
        $_SESSION["fetched_user_role"] =  "";

    }

}




?>
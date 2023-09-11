
<?php session_start(); ?>
<?php ob_start(); ?>
<?php
function start_session_default() {
    $_SESSION["fetched_password"] =  "";
    $_SESSION["fetched_login"] =  "";

}


function display_login() {
    if ($_SESSION["fetched_password"] !==  "" && $_SESSION["fetched_login"] !== "") {
        $user_name = $_SESSION["fetched_login"];
        echo "<p class='login_name' style='color:white; margin:0'>$user_name</p>";

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

function countMessages() {
    global $connection;
    $post_msg_sender = $_SESSION["fetched_login"];
    $query = "SELECT * FROM messages WHERE msg_reciever = '{$post_msg_sender}'";
    $select_msgs_query = mysqli_query($connection, $query);
    $count_messages = mysqli_num_rows($select_msgs_query);
    $_SESSION["messages_count"] = $count_messages;
    return  "Unreaded messages " . strval($count_messages-1);
}


?>
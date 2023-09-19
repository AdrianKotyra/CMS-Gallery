


<?php
       echo "fdsfdsfd";

    if(isset($_GET["source"]) && isset($_GET["user_chat"])  && !empty($_SESSION['fetched_password']) && !empty($_SESSION['fetched_login'])) {
        $user_chat_with = $_GET["user_chat"];
        include "./includes/messenger_get_message_chat_user.php";

    }




?>

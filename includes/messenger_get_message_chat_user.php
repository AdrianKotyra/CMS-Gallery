
<?php
    $user_logged_in = $_SESSION["fetched_login"];
    $query = "SELECT * FROM users where user_namee='{$user_logged_in}'";

    $select_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user)) {
        $user_img_logged = $row["user_image"];
    }






?>



<?php
if (isset($_GET["source"]) && isset($_GET["user_chat"])) {
    $user_logged_in = $_SESSION["fetched_login"];
    $user_chat_with = $_GET["user_chat"];
    $query = "SELECT * FROM users WHERE user_id='{$user_chat_with}'";
    $select_user = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user)) {
        $user_name = $row["user_namee"];
    }
}
?>

<div class="container_messenger_show_window_chat_user col-md-3">
    <a class="cross_exit_window_chat_user" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">
        <img id="chat_user_cross" src="../icons/cross.png" alt="">
    </a>

    <form action="" method="post">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header text-center">
                        <span><?php echo $user_name ?></span>
                    </div>

                    <div class="card-body chat-care">
                        <ul class="chat">

                            <?php
                            if (isset($_GET["source"]) && isset($_GET["user_chat"])) {
                                $user_chat_with = $_GET["user_chat"];
                                $query = "SELECT * FROM users WHERE user_id='{$user_chat_with}'";

                                $select_user = mysqli_query($connection, $query);
                            }
                            while ($row = mysqli_fetch_array($select_user)) {
                                $user_id = $row["user_id"];
                                $user_name = $row["user_namee"];
                                $user_firstname = $row["user_firstname"];
                                $user_lastname = $row["user_lastname"];
                                $user_image = $row["user_image"];
                                $user_role = $row["user_role"];
                                // SELECT MESSAGES SENT TO LOGGED USER;
                                $query = "SELECT * FROM messages WHERE (msg_sender = '{$user_name}' AND msg_reciever = '{$user_logged_in}') OR (msg_sender = '{$user_logged_in}' AND msg_reciever = '{$user_name}') ORDER BY msg_date DESC";
                                $select_msgs_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                                    $user_msg_content = $row["msg_content"];
                                    $user_msg_date = $row["msg_date"];
                                    $msg_sender = $row["msg_sender"];
                            ?>

                                    <li class="<?php echo ($msg_sender == $user_logged_in) ? 'right' : 'left'; ?> clearfix">
                                        <span class="chat-img">

                                            <img class="user_chat_img" src='<?php echo ($msg_sender === $user_logged_in) ? "./img/$user_img_logged" : "./img/$user_image"; ?>'>
                                        </span>

                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"><?php echo $msg_sender; ?></strong>
                                                <small class="text-muted"><i class="fa fa-clock-o"></i><?php echo $user_msg_date; ?></small>
                                            </div>
                                            <p>
                                                <?php echo $user_msg_content; ?>
                                            </p>
                                        </div>
                                    </li>

                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="card-footer message_input_sender">
                        <form action="" method="post">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" name="msg_content_form_chat_user" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="btn-chat" name="send_reply">Reply</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
    if(isset($_POST["send_reply"])) {

        $post_date         = date('Y-m-d H:i:s');;
        $post_content_msg = $_POST["msg_content_form_chat_user"];
        $post_msg_sender = $_SESSION["fetched_login"];
        $post_reciever_msg =$user_name;




        $query = "INSERT INTO messages(msg_content, msg_sender, msg_reciever, msg_date) ";

        $query .= "VALUES('{$post_content_msg}','{$post_msg_sender}','{$post_reciever_msg}','{$post_date}')";

        $send_msg_query = mysqli_query($connection, $query);
        header("Location:index.php?source=posts&user_chat=$user_chat_with");
    }
?>
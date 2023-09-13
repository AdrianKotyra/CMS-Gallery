<?php if(isset($_GET["source"]) && isset($_GET["user_chat"])) {

        $user_logged_in =   $_SESSION["fetched_login"];
        $user_chat_with = $_GET["user_chat"];
        $query = "SELECT * FROM users where user_id='{$user_chat_with}'";
        $select_user = mysqli_query($connection, $query);
        }
        while($row = mysqli_fetch_array($select_user)) {

            $user_name = $row["user_namee"];
        }
?>
<div class="container_messenger_show_window_chat_user col-md-3">
    <a class="cross_exit_window_chat_user" href="<?php echo $_SERVER['HTTP_REFERER']?>">
        <img id="chat_user_cross"src="../icons/cross.png" alt="">
    </a>

    <form action="" method="post">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header text-center">
                        <span><?php echo $user_name?></span>
                    </div>

                    <div class="card-body chat-care">
                        <ul class="chat">


<?php
    if(isset($_GET["source"]) && isset($_GET["user_chat"])) {
        $user_chat_with = $_GET["user_chat"];
        $query = "SELECT * FROM users where user_id='{$user_chat_with}'";

        $select_user = mysqli_query($connection, $query);
        }
        while($row = mysqli_fetch_array($select_user)) {
            $user_id = $row["user_id"];
            $user_name = $row["user_namee"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_image = $row["user_image"];
            $user_role = $row["user_role"];

            $query = "SELECT * FROM messages WHERE msg_sender = '{$user_name}' and msg_reciever = '{$user_logged_in}' ORDER BY msg_id DESC";
            $select_msgs_query = mysqli_query($connection, $query);


            while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                $user_msg_content = $row["msg_content"];
                $user_msg_date = $row["msg_date"];



    ?>
     <p><small><?php echo $user_msg_date?></small></p>

    <div class="user_chat_component_chat">


        <img class="user_chat_img" src='<?php echo "./img/$user_image" ?>' alt="">
        <p class="user_chat_message_content" src="" alt=""><?php echo $user_msg_content ?></p>



    </div>
    <hr>


    </ul>


<?php }} ?>

                    <div class="card-footer message_input_sender">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" name="msg_content_form_chat_user" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="btn-chat" name="send_reply">Reply</button>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>   </div>   </div>   </div>   </div>   </div>   </div>   </div>   </div>



<?php
    if(isset($_POST["send_reply"])) {
        $send_messages = $_POST["msg_content_form_chat_user"];

        $msg_sender =   $_SESSION["fetched_login"];
        $user_chat_with_user_id = $_GET["user_chat"];
        $msg_date =  date('Y-m-d H:i:s');;


        $query_select_reciever = "SELECT * from users where user_id='{$user_chat_with_user_id}'";
        $select_users_query = mysqli_query($connection, $query_select_reciever);
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $user_selected_name = $row["user_namee"];
        }

        $query = "INSERT INTO messages(msg_content, msg_sender, msg_reciever, msg_date) ";

        $query .= "VALUES('{$send_messages}','{$msg_sender}','{$user_selected_name}','{$msg_date}')";

        $send_msg_query = mysqli_query($connection, $query);
        header("Location:index.php?source=posts&user_chat=$user_chat_with");


}







?>
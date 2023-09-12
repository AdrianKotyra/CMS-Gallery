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
    <img class="cross_exit_window_chat_user" id="chat_user"src="../icons/cross.png" alt="">
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

            $query = "SELECT * FROM messages WHERE msg_sender = '{$user_name}' and msg_reciever = '{$user_logged_in}'";
            $select_msgs_query = mysqli_query($connection, $query);


            while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                $user_msg_content = $row["msg_content"];




    ?>

    <div class="user_chat_component">


        <img class="user_chat_img" src='<?php echo "./img/$user_image" ?>' alt="">
        <p class="user_chat_message_content" src="" alt=""><?php echo $user_msg_content ?></p>
        
        <hr>

    </div>


    </ul>


<?php }} ?>

<div class="card-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" name="msg_content_form" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="btn-chat" name="send_msg">Send</button>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
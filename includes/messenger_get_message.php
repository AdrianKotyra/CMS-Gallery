


<!------ Include the above in your HEAD tag ---------->
<?php




    if(isset($_POST["send_msg"])) {

        $post_date         = date('d-m-y');
        $post_content_msg = $_POST["msg_content_form"];
        $post_msg_sender = $_SESSION["fetched_login"];
        $post_reciever_msg = $_POST["msg_user_form"];




        $query = "INSERT INTO messages(msg_content, msg_sender, msg_reciever, msg_date) ";

        $query .= "VALUES('{$post_content_msg}','{$post_msg_sender}','{$post_reciever_msg}','{$post_date}')";

        $send_msg_query = mysqli_query($connection, $query);
    }






?>

<br>
<div class="container_messenger_show_window">
    <form action="" method="post">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header text-center">
                        <span>Your messages</span>
                    </div>

                    <div class="card-body chat-care">
                        <ul class="chat">
                            <select name="msg_user_form" id="">
                                <?php
                                    $post_msg_sender = $_SESSION["fetched_login"];
                                    $query = "SELECT * from messages where msg_reciever = '{$post_msg_sender}'";
                                    $select_msgs_query = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_msgs_query)) {
                                        $user_msg_content = $row["msg_content"];
                                        $user_msg_date = $row["msg_date"];
                                        $user_msg_sender = $row["msg_sender"];




                                    $querycc = "SELECT * from users where user_namee = '{$user_msg_sender}'";
                                    $select_users_query = mysqli_query($connection, $querycc);
                                    $select_users_number_cols = mysqli_num_rows($select_users_query);

                                    while($row = mysqli_fetch_assoc($select_users_query)) {

                                    $user_name = $row["user_namee"];









                                ?>

                                <option value=<?php echo $user_name?>><?php echo "$user_name"?></option>



                                <?php }}?>


                            </select>
                        </ul>
                    </div>
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
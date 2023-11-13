




<br>
<div class="container_messenger_show_window col-md-3">
    <img class="cross_exit_window_chat_user_get_message" id="get_message" src="../icons/cross.png" alt="">
    <form action="" method="post">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header text-center">
                        <span>Your messages</span>
                    </div>

                    <div class="card-body chat-care">
                        <ul class="chat">

                        <?php
                            $post_msg_sender = $_SESSION["fetched_login"];
                            $query = "SELECT DISTINCT msg_sender FROM messages WHERE msg_reciever = '{$post_msg_sender}'";
                            $select_msgs_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                                $user_msg_sender = $row["msg_sender"];

                                // Fetch user information
                                $querycc = "SELECT * FROM users WHERE user_namee = '{$user_msg_sender}'";
                                $select_users_query = mysqli_query($connection, $querycc);

                                if ($user_row = mysqli_fetch_assoc($select_users_query)) {
                                    $user_name = $user_row["user_namee"];
                                    $user_image = $user_row["user_image"];
                                    $user_id = $user_row["user_id"];

                                    // Count the messages from this user
                                    $count_query = "SELECT COUNT(*) AS message_count FROM messages WHERE msg_sender = '{$user_msg_sender}' AND msg_reciever = '{$post_msg_sender}'AND msg_status = 'Unreaded'";
                                    $count_result = mysqli_query($connection, $count_query);
                                    $message_count = mysqli_fetch_assoc($count_result)["message_count"];
                                    $messages_from_user =  $message_count;

                                    // Display user information and message count
                                    ?>

                                    <a href="index.php?source=posts&page=1&user_chat=<?php echo $user_id?>">
                                        <div class="user_chat_component">
                                            <div class="user_name_img">
                                                <img class="user_chat_img" src='<?php echo "./img/$user_image" ?>' alt="">
                                                <p class="user_chat_name"><?php echo $user_name ?></p>
                                            </div>

                                            <p class="user_chat_message_button" src="" alt=""><?php echo $messages_from_user ?></p>


                                        </div>
                                    </a>


                                    <?php
                                }
                            }
                            ?>



                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
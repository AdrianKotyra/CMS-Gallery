




<br>
<div class="container_messenger_show_window col-md-3">
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
                            $query = "SELECT * FROM messages WHERE msg_reciever = '{$post_msg_sender}'";
                            $select_msgs_query = mysqli_query($connection, $query);
                            $count_messages = mysqli_num_rows($select_msgs_query);
                            $_SESSION["messages_count"] = $count_messages;
                            $count_messages_number= $_SESSION["messages_count"];

                            $uniqueUsers = array(); // Create an array to store unique users

                            while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                                $user_msg_content = $row["msg_content"];
                                $user_msg_date = $row["msg_date"];
                                $user_msg_sender = $row["msg_sender"];

                                // Check if the user is already in the $uniqueUsers array
                                if (!isset($uniqueUsers[$user_msg_sender])) {
                                    // User is not in the array, fetch user information
                                    $querycc = "SELECT * FROM users WHERE user_namee = '{$user_msg_sender}'";
                                    $select_users_query = mysqli_query($connection, $querycc);

                                    // Assuming there's only one unique user with the given name
                                    $user_row = mysqli_fetch_assoc($select_users_query);

                                    $user_name = $user_row["user_namee"];
                                    $user_image = $user_row["user_image"];
                                    $user_id = $user_row["user_id"];

                                    // -----------USER MESSAGES COUNT ------------
                                    $messageCounts = array();

                                    while ($row = mysqli_fetch_assoc($select_msgs_query)) {
                                        $user_msg_sender = $row["msg_sender"];

                                        // Check if the sender already exists in the messageCounts array
                                        if (isset($messageCounts[$user_msg_sender])) {
                                            // If it exists, increment the count
                                            $messageCounts[$user_msg_sender]++;
                                        } else {
                                            // If it doesn't exist, initialize the count to 1
                                            $messageCounts[$user_msg_sender] = 1;
                                        }

                                    }
                                    foreach ($messageCounts as $sender => $count) {
                                         $count;



                                    // Store the user in the $uniqueUsers array
                                    $uniqueUsers[$user_msg_sender] = [
                                        "user_namee" => $user_name,
                                        "user_image" => $user_image,
                                        "user_id" => $user_id,
                                    ];

                                    // Now you can use $user_name, $user_image, $user_id for this message
                                    // ...


                            ?>

                                <div class="user_chat_component">
                                    <div class="user_name_img">
                                        <img class="user_chat_img" src='<?php echo "./img/$user_image"?>' alt="">
                                        <p class="user_chat_name"> <?php echo $sender?></p>
                                    </div>

                                    <p class="user_chat_message_button" src="" alt=""><?php echo "$count"?></p>




                                </div>





                                <?php        }}}?>



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
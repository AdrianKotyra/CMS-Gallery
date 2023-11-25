
<div class="col-md-4 sidebar_sticky_class">
    <div class="view_profile_main  right_widget_nav">
        <?php
        if(isset($_GET["profile"])) {
            $profile = $_GET["profile"];
        }
        else {
            $profile = "";
        }
        switch($profile) {
            case 'view';
            include "view_profile_main.php";
            break;


            default: include "login_search_widget_component.php";
            break;




        }
        ?>





    </div>

    <?php

        include "includes/messenger_get_message_chat_user.php";

    ?>

    <?php include "messenger_get_message.php";?>
    <?php include "messenger_send.php";?>



        <!-- ----------WINDOW MESSENGER---------- -->
    <script>


        const crossToExitMsgSender = document.querySelector("#send_message");
        const crossToExitMsgGeter = document.querySelector("#get_message");
        const displayMessengerSendButton = document.querySelector(".send_msg");
        const window_send_message = document.querySelector(".container_messenger_send_window");


        function closeSenderMsg() {
            window_send_message.style.display = "none";
        }
        crossToExitMsgSender.addEventListener("click", function() {
            closeSenderMsg()
        })

        function closegetterMsg() {
            window_show_message.style.display = "none";
        }
        crossToExitMsgGeter.addEventListener("click", function() {
            closegetterMsg()
        })


        function  display_sender() {
            if (window_send_message.style.display == "none") {
                window_send_message.style.display = "block";
                window_show_message.style.display = "none";

            } else {
                window_send_message.style.display = "none";

            }
        }

        displayMessengerSendButton.addEventListener("click", display_sender)
        display_sender()




        // ---------------------------MESSENGER SECTION---------------------------

        const displayMessengerShow = document.querySelector(".show_messages_button");
        const window_show_message = document.querySelector(".container_messenger_show_window");
        function showMessages() {
            if (window_show_message.style.display == "none") {
                window_show_message.style.display = "block";
                window_send_message.style.display = "none";
            } else {
                window_show_message.style.display == "block";
                window_show_message.style.display = "none";
            }
        }

        displayMessengerShow.addEventListener("click", showMessages);


        showMessages()



    </script>






</div>
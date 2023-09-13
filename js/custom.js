




const windowMessagesButtonClose = document.querySelector(".cross_exit_window_chat_user_get_message");
function closeMessageWindow() {
    if (window_show_message.style.display == "none") {
        window_show_message.style.display = "block";
        window_send_message.style.display = "none";
    } else {
        window_show_message.style.display == "block";
        window_show_message.style.display = "none";
    }
}


windowMessagesButtonClose.addEventListener("click", closeMessageWindow);






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






const displayMessengerSendButton = document.querySelector(".send_msg");
const window_send_message = document.querySelector(".container_messenger_send_window");


function  display_sender() {
    if (window_send_message.style.display == "none") {
        window_send_message.style.display = "block";
        window_show_message.style.display = "none";

    } else {
        window_send_message.style.display == "block";
        window_send_message.style.display = "none";
    }
}

displayMessengerSendButton.addEventListener("click", display_sender)











const nav_mobile = document.querySelector(".nav_mobile");
const nav_mobile_literal = `
    <a class="nav-link " href="index.php?source=posts">HOME</a>
    <a class="nav-link " href='index.php?source=register'>Sign Up</a>


`;

nav_mobile.insertAdjacentHTML("afterbegin",nav_mobile_literal);

const navMobileDisplayOff = function() {
    if (window.innerWidth > 400) {
        nav_mobile.style.display="none";
    }

}
window.addEventListener("resize", navMobileDisplayOff )

const navMobileDisplayOn = function() {
    if (nav_mobile.style.display=="none") {
        nav_mobile.style.display="flex";


        nav_mobile.style.animation="navMenuSlideDown 0.3s forwards";

        setTimeout(() => {
            nav_mobile.style.animation="";
        }, 1);

    }
    else {
        nav_mobile.style.animation="navMenuSlideDownBackwards 0.3s forwards";
        setTimeout(() => {

            nav_mobile.style.display="none";
        }, 111);

    }



}
navMobileDisplayOn()
const hambIcone = document.querySelector(".hamb");
hambIcone.addEventListener("click", navMobileDisplayOn);




const catContainer = document.querySelector(".cat_container");
const catButton = document.querySelector(".catButton");
const navMobileCategoriesOn = function() {
    if (catContainer.style.display=="none") {
        catContainer.style.animation="navMenuSlideDown 0.3s forwards";
        catContainer.style.display="flex";
        setTimeout(() => {
            catContainer.style.animation="";
        }, 1);

    }
    else {
        catContainer.style.animation="navMenuSlideDownBackwards 0.3s forwards";
        setTimeout(() => {

            catContainer.style.display="none";
        }, 111);

    }


}
navMobileCategoriesOn()
catButton.addEventListener("click", navMobileCategoriesOn);



function displayEditComments(event) {
    const commentContainer = event.target.closest(".media");
    const editCommentField = commentContainer.querySelector(".edit_comment_textarea");
    const contentComment = commentContainer.querySelector(".content_comment");

    if (editCommentField.style.display === "none" || editCommentField.style.display === "") {
        editCommentField.style.display = "block";
        contentComment.style.display = "none";
    } else {
        editCommentField.style.display = "none";
        contentComment.style.display = "block";
    }
}

const selectEditCommentButtons = document.querySelectorAll(".edit_comment_button");

for (let i = 0; i < selectEditCommentButtons.length; i++) {
    selectEditCommentButtons[i].addEventListener("click", displayEditComments);
}

function keepScrollPostion() {
    document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = localStorage.getItem("scrollpos");
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onscroll = function (e) {
        localStorage.setItem("scrollpos", window.scrollY);
    };
}
keepScrollPostion()
showMessages()
display_sender()

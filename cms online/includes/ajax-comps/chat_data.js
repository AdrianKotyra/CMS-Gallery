

$(document).ready(function refreshChat() {

    $(".chat-container").load("chat_data.php");



})




$(document).ready(function() {

    setInterval(refreshChat, 1000)

})


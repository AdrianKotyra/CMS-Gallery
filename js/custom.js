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

displayEditComments()
function displayEditComments() {
    const edit_comment_field = document.querySelector(".edit_comment_textarea");
    const content_comment = document.querySelector(".content_comment");
    if (edit_comment_field.style.display=="none") {
        edit_comment_field.style.display="block";
        content_comment.style.display="none"
    }
    else {
        edit_comment_field.style.display="none";
        content_comment.style.display="block"
    }

}
const selectEditCommentButton = document.querySelector(".edit_comment_button");
selectEditCommentButton.addEventListener("click",displayEditComments);
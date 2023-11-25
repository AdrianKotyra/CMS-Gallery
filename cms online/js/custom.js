


function preventDefaultFunction() {
    event.preventDefault();
    // Add your custom logic here if needed
}



function submitWindowTimed(text) {
    setTimeout(function () {
    submitWindow(text) },500)

}
function confirmationWindow(text) {

    const windowObjectLiteral = `
    <div class="confirmationWindow">
    <div class="confirmationWindowContainer col-md-6">
        <img class="crossConfWindow" src="../icons/cross.png" alt="">
        <div class="textAndButtons">
            <p>Are you sure you want to ${text} selected items?</p>
            <div class="buttonsContainer">


                <a class="btn btn-primary confNo">No</a>

                <a value="apply" name= "submit" type="submit" class="btn btn-primary confYes">Yes</a>


            </div>
        </div>


    </div>

    </div>
    `


    const body = document.querySelector("body");
    body.insertAdjacentHTML("afterbegin", windowObjectLiteral)

    // CREATE OBJECT LITERAL CONFIRMATION WINDOW CROSS TO CLOSE IT
    function closeConfimationWindow() {
        const ConfWidowContent = document.querySelector(".confirmationWindow");
        ConfWidowContent.remove()

    }


    const crossToCloseConfWindow = document.querySelector(".crossConfWindow");
    crossToCloseConfWindow.addEventListener("click", function() {
        closeConfimationWindow()
    })

    const NoButtonToCloseConfWindow = document.querySelector(".confNo");
    NoButtonToCloseConfWindow.addEventListener("click", function() {
        closeConfimationWindow()
    })

    // deleting slected posts by using dom delement in modal window which is equal to php form submit button
    const submitFormDeleteManyPosts = document.querySelector(".applyButton2");
    const yesButtonToCloseConfWindow = document.querySelector(".confYes");

    yesButtonToCloseConfWindow.addEventListener("click", function() {
        submitFormDeleteManyPosts.click()
    })


}

function submitWindow(text) {

    let windowSubmitLiteral = `
    <div class="confirmationWindow">
    <div class="confirmationWindowContainer col-md-6">
        <img class="crossConfWindow" src="../icons/cross.png" alt="">
        <div class="textAndButtons">
            <p>${text}</p>
            <div class="buttonsContainer">
                <a class="btn btn-primary confNo okCenterConfWindow">OK</a>
            </div>
        </div>
    </div>

    </div>
    `;
    const body = document.querySelector("body");
    body.insertAdjacentHTML("afterbegin", windowSubmitLiteral)

    // CREATE OBJECT LITERAL CONFIRMATION WINDOW CROSS TO CLOSE IT
    function closeConfimationWindow() {
        const ConfWidowContent = document.querySelector(".confirmationWindow");
        if(ConfWidowContent) {
            ConfWidowContent.remove()
        }


    }

    const crossToCloseConfWindow = document.querySelector(".crossConfWindow");
    crossToCloseConfWindow.addEventListener("click", function() {

        closeConfimationWindow()
    })

    const NoButtonToCloseConfWindow = document.querySelector(".confNo");
    NoButtonToCloseConfWindow.addEventListener("click", function() {
        closeConfimationWindow()
    })
    // CLOSE WINDOW IN TIME
    setTimeout(function () {
        const ConfWidowContent = document.querySelector(".confirmationWindow");

       if(ConfWidowContent) {
            ConfWidowContent.remove()
        }

    }, 5000);
}


// CONFIRMATION WINDOW ADD POST


// run the function to display confirmation window


function actionItemsBySelectionPost(text) {
    // INIT VARS MADE IN ORDER TO COMPARE WITH USERS CHANGES AND DISPALY PROPER WINDOW
    let postTitleInit = document.querySelector(".post_title_input");
    let postTitleValueInit = postTitleInit.value;
    let postContentInit = document.querySelector(".post_content_input");
    let postContentValueInit = postContentInit.value;

    function confirmationWindowPost() {
        let postTitle = document.querySelector(".post_title_input");
        let postTitleValue = postTitle.value;
        let postContent = document.querySelector(".post_content_input");
        let postContentValue = postContent.value;

        let windowObjectLiteral = `
        <div class="confirmationWindow">
        <div class="confirmationWindowContainer col-md-6">
            <img class="crossConfWindow" src="../icons/cross.png" alt="">
            <div class="textAndButtons">
                <p>Are you sure you want to ${text} post?</p>
                <div class="buttonsContainer">
                    <a class="btn btn-primary confNo">No</a>
                    <a value="apply" name= "submit" type="submit" class="btn btn-primary confYes">Yes</a>
                </div>
            </div>
        </div>

        </div>
        `;
        let windowObjectLiteralNoChanges = `
        <div class="confirmationWindow">
        <div class="confirmationWindowContainer col-md-6">
            <img class="crossConfWindow" src="../icons/cross.png" alt="">
            <div class="textAndButtons">
                <p>You need to make changes in order to ${text} post</p>
                <div class="buttonsContainer">
                    <a class="btn btn-primary confNo okCenterConfWindow">OK</a>
                </div>
            </div>
        </div>
        </div>
        `;

        // CHECKING IF ANY CHANGES TO INIT INPUTS BEEN MADE
        if(postTitleValue==postTitleValueInit && postContentValue ==postContentValueInit) {
            windowObjectLiteral =windowObjectLiteralNoChanges
        }


        const body = document.querySelector("body");
        body.insertAdjacentHTML("afterbegin", windowObjectLiteral)

        // CREATE OBJECT LITERAL CONFIRMATION WINDOW CROSS TO CLOSE IT
        function closeConfimationWindow() {
            const ConfWidowContent = document.querySelector(".confirmationWindow");
            ConfWidowContent.remove()

        }


        const crossToCloseConfWindow = document.querySelector(".crossConfWindow");
        crossToCloseConfWindow.addEventListener("click", function() {
            closeConfimationWindow()
        })

        const NoButtonToCloseConfWindow = document.querySelector(".confNo");
        NoButtonToCloseConfWindow.addEventListener("click", function() {
            closeConfimationWindow()
        })

        // deleting slected posts by using dom delement in modal window which is equal to php form submit button
        const submitFormDeleteManyPosts = document.querySelector(".publishPostButton");
        const yesButtonToCloseConfWindow = document.querySelector(".confYes");

        yesButtonToCloseConfWindow.addEventListener("click", function() {
            submitFormDeleteManyPosts.click()
        })


    }



    const applyButton = document.querySelector(".publishPostButtonAction");
    function checkSelectedOption() {

        let postTitle = document.querySelector(".post_title_input");
        let postTitleValue = postTitle.value;
        let postContent = document.querySelector(".post_content_input");
        let postContentValue = postContent.value;

        // Get the select element by its id
        const submitFormaddingPosts = document.querySelector(".publishPostButton");


        function applyChanges() {
            const yesButtonToCloseConfWindow = document.querySelector(".confYes");
            function acceptFormManyDeletion() {
                yesButtonToCloseConfWindow.addEventListener("click", function() {
                    submitFormaddingPosts.click();
                });
            }
        }

        if(postTitleValue!=="" &&postContentValue !=="") {

            confirmationWindowPost();
            applyChanges();

        }

    }


    applyButton.addEventListener("click", function() {
        checkSelectedOption()
    })

}

// -----------------------------------------------------------------------------------------------------------------------











const nav_mobile = document.querySelector(".nav_mobile");
const nav_mobile_literal = `
    <a class="nav-link " href="index.php?source=posts&page=1">HOME</a>
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
        nav_mobile.style.animation="navMenuSlideDownBackwards 0.3s forwards"
        setTimeout(() => {

            nav_mobile.style.display="none"
        }, 111);

    }



}
navMobileDisplayOn()
const hambIcone = document.querySelector(".hamb");
hambIcone.addEventListener("click", navMobileDisplayOn);




const catContainer = document.querySelector(".cat_container")
const catButton = document.querySelector(".catButton")
const navMobileCategoriesOn = function() {
    if (catContainer.style.display=="none") {
        catContainer.style.animation="navMenuSlideDown 0.3s forwards"
        catContainer.style.display="flex"
        setTimeout(() => {
            catContainer.style.animation=""
        }, 1);

    }
    else {
        catContainer.style.animation="navMenuSlideDownBackwards 0.3s forwards"
        setTimeout(() => {

            catContainer.style.display="none";
        }, 111);

    }


}
navMobileCategoriesOn()
catButton.addEventListener("click", navMobileCategoriesOn);



function displayEditComments(event) {
    const commentContainer = event.target.closest(".media");
    const editCommentField = commentContainer.querySelector(".edit_comment_textarea")
    const contentComment = commentContainer.querySelector(".content_comment")

    if (editCommentField.style.display === "none" || editCommentField.style.display === "") {
        editCommentField.style.display = "block";
        contentComment.style.display = "none";
    } else {
        editCommentField.style.display = "none";
        contentComment.style.display = "block";
    }
}

const selectEditCommentButtons = document.querySelectorAll(".edit_comment_button")

for (let i = 0; i < selectEditCommentButtons.length; i++) {
    selectEditCommentButtons[i].addEventListener("click", displayEditComments)
}

// function keepScrollPostion() {
//     document.addEventListener("DOMContentLoaded", function (event) {
//         var scrollpos = localStorage.getItem("scrollpos");
//         if (scrollpos) window.scrollTo(0, scrollpos);
//     });

//     window.onscroll = function (e) {
//         localStorage.setItem("scrollpos", window.scrollY);
//     };
// }
// keepScrollPostion()





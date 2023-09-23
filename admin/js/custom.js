$(document).ready(function() {
    $('#all_posts').click(function(event){
        if(this.checked) {
            $('.checkBoxes').each(function(){
                this.checked = true;
            })
        }
        else {
            $('.checkBoxes').each(function(){
                this.checked = false;;
            })
        }
    })

});


// CREATE OBJECT LITERAL CONFIRMATION WINDOW

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


// run the function to display confirmation window using argument "delete"

function actionItemsBySelection() {


    var selectElement = document.getElementById("select_post");
    let selectedValueOption = selectElement.value;


    selectElement.onchange = function() {
    selectedValueOption = selectElement.value;



    }
    const applyButton = document.querySelector(".applyButton");
    function checkSelectedOption() {



        // Get the select element by its id


        const submitFormDeleteManyPosts = document.querySelector(".applyButton2");
        const checkboxFromSelect = document.querySelector(".checkBoxes");

        function applyChanges() {
            const yesButtonToCloseConfWindow = document.querySelector(".confYes");
            function acceptFormManyDeletion() {
                yesButtonToCloseConfWindow.addEventListener("click", function() {
                    submitFormDeleteManyPosts.click();
                });
            }
        }
        if (selectedValueOption === "delete_post" && checkboxFromSelect.checked) {

            confirmationWindow("delete");
            applyChanges()
        }
        if (selectedValueOption === "publish_post" && checkboxFromSelect.checked) {

            confirmationWindow("publish");
            applyChanges()
        }
        if (selectedValueOption === "unpublish_post" && checkboxFromSelect.checked) {

            confirmationWindow("Unpublish");
            const yesButtonToCloseConfWindow = document.querySelector(".confYes");
            applyChanges()
        }

    }



    applyButton.addEventListener("click", function() {
        checkSelectedOption()
    })



}



function confirmationWindowPost(text) {

    const windowObjectLiteral = `
    <div class="confirmationWindow">
    <div class="confirmationWindowContainer col-md-6">
        <img class="crossConfWindow" src="../icons/cross.png" alt="">
        <div class="textAndButtons">
            <p>Are you sure you want to add post?</p>
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
    const submitFormDeleteManyPosts = document.querySelector(".publishPostButton");
    const yesButtonToCloseConfWindow = document.querySelector(".confYes");

    yesButtonToCloseConfWindow.addEventListener("click", function() {
        submitFormDeleteManyPosts.click()
    })


}


// run the function to display confirmation window using argument "delete"


function actionItemsBySelectionPost() {



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
        if(postTitleValue!==""||postContentValue !=="") {

            confirmationWindowPost();
            applyChanges();

        }

    }


    applyButton.addEventListener("click", function() {
        checkSelectedOption()
    })

}


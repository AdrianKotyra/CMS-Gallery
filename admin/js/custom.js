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


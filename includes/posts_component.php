<script><?php include "./js/custom.js"?> </script>

<?php

    if(isset($_GET['page'])) {
        $page = $_GET['page'];

    }
    if(!isset($_GET['page'])) {

        $page = "";

    }
    if($page === "" || $page === 1 ) {
        $page1 = 0;
    }
    else {
        $page_1 = ($page *5) -5;
    }





    if(isset($_GET['page'])) {
    $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, 5";
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["post_id"];
        $post_title = $row["post_title"];
        $post_author = $row["post_author"];
        $post_date = $row["post_date"];
        $post_content = substr($row["post_content"],0, 50);
        $post_image =  $row["post_image"];
        $post_status =  $row["post_status"];
        $post_views = $row["post_views"];
        $post_likes = $row["likes"];
        if($post_status !== "published") {
            echo "";
        }
        else {

        global $connection;
        // CHECKING IF POST AUTHOR === USER LOGGED USING SESSION LOGIN NAME
        $fetched_login = $_SESSION["fetched_login"];
        $query = "SELECT * FROM `posts` WHERE post_author = '{$fetched_login}'";
        $select_posts_LOGGED_user = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts_LOGGED_user)) {
            $post_author_logged = $row["post_author"];

        }
        $query_select_id_post_author = "SELECT * FROM users WHERE user_namee = '{$post_author}'";
        $query_select_id_post_author_query = mysqli_query($connection, $query_select_id_post_author);
        while ($row = mysqli_fetch_assoc($query_select_id_post_author_query)) {
        $author_id = $row["user_id"];
        }
        ?>




        <h2>
            <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <a href="display_user_from_posts.php?user=<?php echo $author_id?>"><?php echo $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>

        <?php

        // DISPLAYING EDIT AND DELETE POST IF USER IS THE CREATOR BY CHECKING SESSION LOGIN IF ITS EQUAL BY POST AUTHOR

        if ($post_author===$post_author_logged) {
            ?>

            <div class="nav-link">
            <div class="dropdown edit_drop" style="cursor:pointer";>
                <div href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   <button class="btn btn-success">Edit Post</button><b class="caret"></b></div>
                <ul class="dropdown-menu">
                <li><a class='nav-link' href='./edit_post_user.php?post_id=<?php echo $post_id?>'><p>Edit Post</p> </a> </li>
                <!-- create link with data-post-id to pass every indivudal id to js function -->
                <li><a class='nav-link publishPostButtonAction' data-post-id='<?php echo $post_id; ?>'><p>Delete Post</p></a></li>





                </ul>
            </div>


            </div>


        <?php } } ?>

    <hr>
    <a class="image_container_post" href="post.php?p_id=<?php echo $post_id?>" >
        <!-- IF THERE IS NOT IMAGE DO NOT DISPLAY IT -->
        <?php
            if($post_image!=="") {
                echo "<img class='img-responsive posts_img' src='img/$post_image'";


            }
        ?>

    </a> </a>
    <div class="main_post_likes_view_cont">
        <p class=views_main>Views: <?php echo $post_views  ?></p>
        <p class=views_main>Likes: <?php echo $post_likes  ?></p>
    </div>

    <p class="content_posts"><?php echo $post_content ?></p>



    <hr>




<?php }  } ?>
<ul class="pager">
    <?php
        if(isset($_GET['page'])) {
        $query_posts = "SELECT * from posts";

        $query_selects_all_posts = mysqli_query($connection, $query_posts);
        $post_count_sum = mysqli_num_rows($query_selects_all_posts);
        $post_count_sum = ceil($post_count_sum/5);
        for($i=1; $i<=$post_count_sum; $i++) {
            if ($i ==($_GET["page"])) {
                $active_page = "active_page";
            }
            else {
                $active_page = "inactive_page";
            }
            echo "<li> <a class=$active_page href='index.php?source=posts&page=$i'>$i</a></li>";

        }
    }



?>

</ul>


<!--
CREATING SCRIPT TO DELETE EACH POST INDIVIDUALLY BASED ON ITS POST ID LINK GET -->

<script>

    document.querySelectorAll(".publishPostButtonAction").forEach(button => {
        button.addEventListener('click', function() {
            // Get the post_id from the data attribute
            const post_id = this.getAttribute('data-post-id')

            // Display the confirmation window and pass post_id as an argument
            confirmationWindowPosts("delete", post_id)
        })
    })
</script>



<script>
function confirmationWindowPosts(text, post_id) {

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

// selecting corresponding post using passing variable post_id from link data-post-id
const confYesButton = document.querySelector(".confYes");
    confYesButton.addEventListener("click", function() {
        // Find the applyButton2 for the corresponding post_id

        closeConfimationWindow()
        submitWindowTimed("post has been deleted");

        setTimeout(() => {
            window.location.href = `./post.php?p_id=${post_id}&delete_post=post`
        }, 2000);




    });


}


</script>


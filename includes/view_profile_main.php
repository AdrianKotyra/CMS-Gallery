<script><?php include "./js/custom.js"?> </script>
<!--
SELECT USER BY USING FETCHED NAME FROM INDEX LOGIN FORM -->
<?php
    global $connection;
    $fetched_login = $_SESSION['fetched_login'];
    $query = "SELECT * from users where user_namee='{$fetched_login}'";
    $query_select_user = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($query_select_user)) {
        $user_id = $row["user_id"];
        $user_name_fetched = $row["user_namee"];
        $user_password_fetched = $row["user_password"];
        $user_firstname_fetched = $row["user_firstname"];
        $user_lastname_fetched = $row["user_lastname"];
        $user_email_fetched = $row["user_email"];
        $user_image_fetched = $row["user_image"];

        $user_randSalt = $row["randSalt"];
        $user_status = $row["user_status"];
    }





?>







<!-- --------Update user profile---------- -->
<?php
 if(isset($_POST["edit_user"])) {

    $user_name         =  $_POST['user_name'];
    $user_password          =  $_POST['user_password'];
    $user_firstname         =  $_POST['user_firstname'];
    $user_lastname         =  $_POST['user_lastname'];
    $user_email        =  $_POST['user_email'];
    $post_image          =  $_FILES['image']['name'];
    $post_image_temp     =  $_FILES['image']['tmp_name'];

    // setting up new session user password
    $_SESSION["fetched_password_original"] =$user_password;
    $user_password = crypt($user_password, $_SESSION["fetched_password"]);

    if(empty($post_image)) {

        $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $select_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_image)) {

        $post_image = $row['user_image'];

        }
    }
    if($user_name_fetched==$user_name&&$user_password_fetched== $user_password&&$user_firstname_fetched==$user_firstname&&
    $user_firstname_fetched==$user_firstname&&$user_email_fetched==$user_email&&$user_image_fetched==$post_image)
    {


        echo
        '<script>
            submitWindowTimed("You need to provide changes to your details")
        </script>';


    }
    else {
        $query_update = "UPDATE users SET ";
        $query_update .="user_namee  = '{$user_name}', ";
        $query_update .="user_password = '{$user_password}', ";
        $query_update .="user_firstname = '{$user_firstname}', ";
        $query_update .="user_lastname = '{$user_lastname}', ";
        $query_update .="user_email   = '{$user_email}', ";
        $query_update .="user_image  = '{$post_image}' ";
        $query_update .= "WHERE user_id = {$user_id} ";

        $update_user= mysqli_query($connection,$query_update);

        move_uploaded_file($post_image_temp, "./img/$post_image");

        echo
        '<script>
            submitWindowTimed("User details successfully updated")
            setTimeout(() => {
            window.location.href = "./index.php?source=posts";}, 2000);
        </script>';
    }


}


?>



<!-- UPDATE SESSION LOGIN DETAILS -->
<?php
    $query = "SELECT * FROM users WHERE user_namee = '{$user_name_fetched}'";
    $select_user_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_user_query)) {

        $fetched_password = $row["user_password"];

        $fetched_login = $row["user_namee"];
        $fetched_id = $row["user_id"];
        $fetched_firstname = $row["user_firstname"];
        $fetched_last_name = $row["user_lastname"];


        $_SESSION["fetched_password"] =  $fetched_password;
        $_SESSION["fetched_login"] =  $fetched_login;
        $_SESSION["fetched_firstname"] =  $fetched_firstname;
        $_SESSION["fetched_last_name"] =  $fetched_last_name;


    }
?>
<div>
    <form action="" method="post" enctype="multipart/form-data" class="form_sticky">


    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name" value=<?php echo "$user_name_fetched"?>>
    </div>


    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password" value=<?php echo  $_SESSION["fetched_password_original"]?>>
    </div>


    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value=<?php echo "$user_firstname_fetched"?>>
    </div>

    <div class="sticky_pointer">
        <div class="form-group">
            <label for="user_lastname">User Lastname</label>
            <input type="text" class="form-control" name="user_lastname" value=<?php echo "$user_lastname_fetched"?>>
        </div>

        <div class="form-group">
            <label for="user_email">User Email</label>
            <input type="text" class="form-control" name="user_email" value=<?php echo "$user_email_fetched"?>>
        </div>

        <div class="form-group">

            <img width=200 src="./img/<?php echo"$user_image_fetched" ?>" alt="">
        </div>

        <div class="form-group">
            <label for="image">User Image</label>
            <input type="file"  name="image">
        </div>




        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_user" value="Update User" >
        </div>

    </div>


</form>


</div>


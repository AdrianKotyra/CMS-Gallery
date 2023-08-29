


<!-- SELECT POSTS ABD DISPLAY IN FORM -->
<?php
    global $connection;
    if(isset($_GET["user_id"])) {
        $user_id_to_be_edited = $_GET["user_id"];
        $query = "SELECT * from users where user_id={$user_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {


            $user_id = $row["user_id"];
            $user_name = $row["user_namee"];
            $user_password = $row["user_password"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_email = $row["user_email"];
            $user_image = $row["user_image"];
            $user_role = $row["user_role"];
            $user_randSalt = $row["randSalt"];
            $user_status = $row["user_status"];
            $user_description = $row["user_desc"];


        }


    }




?>

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["user_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["user_id"];
    }
    if(isset($_POST["edit_user"])) {

        $user_name         =  $_POST['user_name'];
        $user_password          =  $_POST['user_password'];
        $user_firstname         =  $_POST['user_firstname'];
        $user_lastname         =  $_POST['user_lastname'];
        $user_email        =  $_POST['user_email'];
        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];
        $user_role           =  $_POST['user_role'];
        $user_desc           =  $_POST['user_content'];


        if(empty($post_image)) {

            $query = "SELECT * FROM users WHERE user_id = $user_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['user_image'];

            }
        }


        $query_update = "UPDATE users SET ";
        $query_update .="user_namee  = '{$user_name}', ";
        $query_update .="user_password = '{$user_password}', ";
        $query_update .="user_firstname = '{$user_firstname}', ";
        $query_update .="user_lastname = '{$user_lastname}', ";
        $query_update .="user_email   = '{$user_email}', ";
        $query_update .="user_role= '{$user_role}', ";
        $query_update .="user_image  = '{$post_image}', ";
        $query_update .="user_desc  = '{$user_desc}' ";
        $query_update .= "WHERE user_id = {$user_id_to_be_edited} ";

        $update_user= mysqli_query($connection,$query_update);

        move_uploaded_file($post_image_temp, "../img/$post_image");

        echo '<h2 class="text-center">User have been updated</h2>';









    }









?>
<!-- UPDATE SESSION LOGIN DETAILS -->
<?php
    $query = "SELECT * FROM users WHERE user_namee = '{$user_name}'";
    $select_user_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_user_query)) {
        $fetched_password = $row["user_password"];
        $fetched_login = $row["user_namee"];
        $fetched_id = $row["user_id"];
        $fetched_firstname = $row["user_firstname"];
        $fetched_last_name = $row["user_lastname"];
        $fetched_user_role = $row["user_role"];

        $_SESSION["fetched_password"] =  $fetched_password;
        $_SESSION["fetched_login"] =  $fetched_login;
        $_SESSION["fetched_firstname"] =  $fetched_firstname;
        $_SESSION["fetched_last_name"] =  $fetched_last_name;
        $_SESSION["fetched_user_role"] =  $fetched_user_role;

    }

?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name" value=<?php echo "$user_name"?>>
    </div>


    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password" value=<?php echo "$user_password"?>>
    </div>


    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value=<?php echo "$user_firstname"?>>
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value=<?php echo "$user_lastname"?>>
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="text" class="form-control" name="user_email" value=<?php echo "$user_email"?>>
    </div>

    <div class="form-group">

        <img width=200 src="../img/<?php echo"$user_image" ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
       <label for="user_role">User Role</label>
       <select name="user_role" id="">
            <option value='Admin'>Admin</option>
            <option value='Subscriber'>Subscriber</option>
        </select>

    </div>
    <div class="form-group">
        <label for="user_content">User Description</label>
        <textarea class="form-control "name="user_content" id="" cols="30" rows="10" placeholder="<?php echo "$user_description"?>"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>





<?php

if(isset($_POST['create_user'])) {
    echo '<h2 class="text-center">User have been created</h2>';


    $user_name        = $_POST['user_name'];
    $user_password    = $_POST['user_password'];
    $user_firstname   = $_POST['user_firstname'];
    $user_lastname    = $_POST['user_lastname'];

    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];


    $user_email        = $_POST['user_email'];
    $user_role         = $_POST['user_role'];



    move_uploaded_file($post_image_temp, "../img/$post_image" );


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role,user_namee,user_email,user_password, user_image) ";

    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_name}','{$user_email}', '{$user_password}', '{$post_image}') ";



    $create_user_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>


    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="text" class="form-control" name="user_email">
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
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>





















<?php

  if(isset($_POST["submit_registration"])) {
    global $connection;
    $login_name =$_POST["username"];
    $first_name =$_POST["Firstname"];
    $second_name =$_POST["Lastname"];
    $email_name =$_POST["email"];
    $password_name = $_POST["password"];
    $password_name_conf = $_POST["password_confirm"];


    $sql="SELECT * from users where (user_namee='$login_name' or user_email='$email_name')";

    $res=mysqli_query($connection,$sql);



    // ------form validation-------
    if(strlen($login_name)>16 || strlen($first_name)>16 || strlen($second_name)>16 || strlen($email_name)>16
      || strlen($password_name)>16 || strlen($password_name)<4)
    {
      echo "<h3>Provide correct details</h3><br>";
    }
    else if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);

      if($email_name==isset($row['user_email']))
      {
        echo "<h3>Username or email already exists</h3><br>";
      }
      else if($login_name==isset($row['user_namee']))
      {
        echo "<h3>Username or email already exists</h3><br>";
      }


    }
    else if ($password_name != $password_name_conf) {
      echo "<h3>Password does not match</h3>";
    }
    else {




      echo "<h3>User has been created</h3>";
      // encrypt info
      $login_name =mysqli_real_escape_string($connection, $login_name);
      $email_name =mysqli_real_escape_string($connection, $email_name);
      $password_name =mysqli_real_escape_string($connection, $password_name);
      $user_role = "user";
      $query = "SELECT randSalt from users";

      $query_select_randSalt = mysqli_query($connection, $query);
      $row=mysqli_fetch_array($query_select_randSalt);
      $randSalt =  $row["randSalt"];


      $password_crypted = crypt($password_name, $randSalt);

      $default_profile_img = "avatar-default.png";

      $query_new_user = "INSERT INTO users(user_namee, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
      $query_new_user.= "VALUES('{$login_name}','{$password_crypted}','{$first_name}','{$second_name}','{$email_name}','{$default_profile_img}','{$user_role}')";
      $query_create_new_user_registration = mysqli_query($connection, $query_new_user);
    }


  }



?>
<!------ Include the above in your HEAD tag ---------->

<form class="form-vertical" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers, without spaces up to 16 symbols</p>
      </div>
    </div>

    <div class="control-group">
      <!--Firstname -->
      <label class="control-label"  for="Firstname">Firstname</label>
      <div class="controls">
        <input type="text" id="Firstname" name="Firstname" placeholder="" class="input-xlarge">
        <p class="help-block">Firstname can contain only letters without spaces up to 16 symbols</p>
      </div>
    </div>


    <div class="control-group">
      <!--Lastname -->
      <label class="control-label"  for="Lastname">Lastname</label>
      <div class="controls">
        <input type="text" id="Lastname" name="Lastname" placeholder="" class="input-xlarge">
        <p class="help-block">Lastname can contain only letters without spaces up to 16 symbols</p>
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail up to 16 symbols</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters to 16</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button name="submit_registration" class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>


<!-- GET user registration details -->



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
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
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
<?php
  if(isset($_POST["submit_registration"])) {
    $login_name =$_POST["username"];
    $email_name =$_POST["email"];
    $password_name = $_POST["password"];

    // encrypt info


    $login_name =mysqli_real_escape_string($connection, $login_name);
    $email_name =mysqli_real_escape_string($connection, $email_name);
    $password_name =mysqli_real_escape_string($connection, $password_name);

    $query = "SELECT randSalt from users";

    $query_select_randSalt = mysqli_query($connection, $query);
    while($row=mysqli_fetch_array($query_select_randSalt)) {
      $randSalt =  $row["randSalt"];


      
    }


  }



?>

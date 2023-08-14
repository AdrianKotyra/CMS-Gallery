<?php include "dataBase.php";?>


<?php
    if(isset($_POST["password"])) {
       $password =  $_POST["password"];
       $login =  $_POST["username"];


       $username = mysqli_real_escape_string($connection, $username);
       $password = mysqli_real_escape_string($connection, $password);

       $query = "SELECT * FROM users where user_namee = {$username}";
       $select_user_quert = mysqli_query($connection, $query);



    }




?>
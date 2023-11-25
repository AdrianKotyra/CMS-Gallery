<?php ob_start(); ?>

<?php include "dataBase.php";?>
<?php include "functions_main.php";?>



<?php
    if(isset($_POST["login"])) {
        global $connection;
        $original_psw =  $_POST["password"];
        $_SESSION["fetched_password_original"] =$original_psw;
       $password =  $_POST["password"];
       $login =  $_POST["username"];


       $login = mysqli_real_escape_string($connection, $login);
       $password = mysqli_real_escape_string($connection, $password);

       $query = "SELECT * FROM users WHERE user_namee = '{$login}'";
       $select_user_query = mysqli_query($connection, $query);
       while($row = mysqli_fetch_array($select_user_query)) {
            $fetched_password = $row["user_password"];
            $fetched_login = $row["user_namee"];
            $fetched_id = $row["user_id"];
            $fetched_firstname = $row["user_firstname"];
            $fetched_last_name = $row["user_lastname"];
            $fetched_user_role = $row["user_role"];

        }
        // REVERSING CRYPTED PASSWORD IN ORDER TO LOG IN BY USER USING CREATED ORIGIN PASSWORD



       if($login !==$fetched_login||$password!==$fetched_password) {
        header("Location:../index.php?source=register_form");
       }
       else if ($login ==$fetched_login&&$password==$fetched_password) {
        $_SESSION["fetched_password"] =  $password;
        $_SESSION["fetched_login"] =  $fetched_login;
        $_SESSION["fetched_id"] =  $fetched_id;
        $_SESSION["fetched_firstname"] =  $fetched_firstname;
        $_SESSION["fetched_last_name"] =  $fetched_last_name;
        $_SESSION["fetched_user_role"] =  $fetched_user_role;
        countMessages();



        header("Location:login_search_widget_component.php");
        header("Location:../index.php?source=posts&page=1");
       }







    }



?>
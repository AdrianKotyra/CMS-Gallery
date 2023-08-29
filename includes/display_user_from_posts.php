
<!-- ------FETCHING DATA USERS FROM SQL------ -->


<?php
    if(isset($_GET["user"])){
        $user_name_fetched = $_GET["user"];
    }
    $query = "SELECT * FROM users where user_namee='{$user_name_fetched}'";

    $select_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user)) {
        $user_name = $row["user_namee"];
        $user_img = $row["user_image"];
        $user_email = $row["user_email"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_desc = $row["user_desc"];


?>


<div class="container">
    <div class="row row-user">

        <div class="col-md-8 user_content">
            <div class="user_col ">
                <img class="img-fluid user_picture" src="img/<?php echo $user_img;?>">
                <div class="user_info">
                    <p><b>Nickname:</b> <br><?php echo $user_name;?></p>
                    <p><b>Name:</b><br><?php echo $user_firstname;?></p>
                    <p><b>Lastname:</b><br><?php echo $user_lastname;?></p>
                    <p><b>Email:</b><br><?php echo $user_email;?></p>
                </div>


            </div>

            <div class="user_col">
                <p class="user_desc">
                    <?php echo $user_desc;?>
                </p>

            </div>


        </div>


    </div>
    <hr class="user_line col-md-6">

</div>


<?php } ?>


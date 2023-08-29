<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php



                if(isset($_POST['submit'])){

                $search = $_POST['search'];


                $query = "SELECT * FROM users WHERE user_namee LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query) {

                    die("QUERY FAILED" . mysqli_error($connection));

                }

                $count = mysqli_num_rows($search_query);

                if($count == 0) {

                    echo "<h1> NO RESULT</h1>";

                } else {

                while($row = mysqli_fetch_assoc($search_query)) {
                    $user_name = $row["user_namee"];
                    $user_img = $row["user_image"];
                    $user_email = $row["user_email"];
                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_desc = $row["user_desc"];

                ?>

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


                <?php }


                }



                }


                ?>











            </div>
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->


    <?php include "includes/footer.php";
    ?>


</body>

</html>

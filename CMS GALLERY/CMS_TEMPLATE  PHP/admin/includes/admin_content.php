
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>
        <?php


            // $all_user_query = Users::find_all_users();
            // while($row = mysqli_fetch_array($all_user_query)) {
            //     echo $row["first_name"]. "<br>";
            // }

            $find_user_query = Users::find_user_by_id(2);
            echo $find_user_query->username;

            // $run = Users::RunOnstart($find_user_query);
            // echo $run->username;

            // $all_user_query = Users::find_all_users();
            // foreach($all_user_query as $user) {
            //     echo $user->username . "<br>";
            // }





        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
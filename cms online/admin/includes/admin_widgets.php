
                <!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                        $query = "SELECT * FROM posts";
                        $select_all_posts = mysqli_query($connection, $query);
                        $post_counts = mysqli_num_rows( $select_all_posts)




                    ?>
                    <div class='huge'><?php echo $post_counts ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM comments";
                        $select_all_comments = mysqli_query($connection, $query);
                        $comments_counts = mysqli_num_rows( $select_all_comments)

                    ?>
                     <div class='huge'><?php echo $comments_counts ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($connection, $query);
                        $users_counts = mysqli_num_rows( $select_all_users)

                    ?>
                    <div class='huge'><?php echo $users_counts ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $query = "SELECT * FROM categories";
                            $select_all_cats = mysqli_query($connection, $query);
                            $cats_counts = mysqli_num_rows( $select_all_cats)

                        ?>
                        <div class='huge'><?php echo $cats_counts?> </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->


    <?php
        // SELECT UNPUBLISHED POSTS
        $query = "SELECT * FROM posts where post_status= 'unpublished'";
        $select_all_unpublished_posts = mysqli_query($connection, $query);
        $unpublished_post_counts = mysqli_num_rows($select_all_unpublished_posts);
        // SELECT UNAPPROVED COMMENTS
        $query = "SELECT * FROM comments where comment_status!= 'approved'";
        $select_all_unapproved_comments = mysqli_query($connection, $query);
        $unapproved_comments_counts = mysqli_num_rows($select_all_unapproved_comments);
        // SELECT All SUBSCRIBERS
        $query = "SELECT * FROM users where user_role= 'User'";
        $select_all_Subscribers = mysqli_query($connection, $query);
        $subscribers_counts = mysqli_num_rows($select_all_Subscribers);


    ?>
<div class="row">

    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
            <?php
                $tables = ["Active posts", "Unpublished posts", "Comments", "Unapproved comments", "Accounts", "Users", "Categories"];
                $tables_count = [$post_counts, $unpublished_post_counts, $comments_counts, $unapproved_comments_counts, $users_counts, $subscribers_counts, $cats_counts];

                for ($i=0; $i<count($tables); $i++ ) {
                    echo "['{$tables[$i]}'" . ",". "{$tables_count[$i]}],";

                }






            ?>








            ]);

            var options = {
            chart: {
                title: '',
                subtitle: '',
            }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
</div>
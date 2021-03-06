
<?php include "includes/header.php"; ?>

<div id="wrapper" >
  <!--  --><?php
/*    $session = session_id();
    $time =time();
    $time_out_in_seconds= 60;
    $time_out =$time - $time_out_in_seconds;

    $query ="SELECT * FROM users_online WHERE session ='$session'";
    $send_query=mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL){
        $create_user_online=mysqli_query($connection, "INSERT INTO users_online(session, time)VALUE ('$session', '$time')");
        confirm($create_user_online);
    }else{
        mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session ='$session'");
    }
    $user_online_query= mysqli_query($connection, "SELECT * FROM users_online WHERE time >'$time_out'");
    $user_count =mysqli_num_rows($user_online_query);

    */?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                   <!-- <h1>
                        <?php /*echo user_online(); */?>
                    </h1>-->

                </div>
            </div>
            <!-- /.row -->

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
                                    $select_post_count_query = mysqli_query($connection, $query);
                                    $post_count = mysqli_num_rows($select_post_count_query);

                                    echo "<div class='huge'>{$post_count}</div>";
                                    ?>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="post">
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
                                    $select_post_count_query = mysqli_query($connection, $query);
                                    $comment_count = mysqli_num_rows($select_post_count_query);

                                    echo "<div class='huge'>{$comment_count}</div>";

                                    ?>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comment">
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
                                    $select_post_count_query = mysqli_query($connection, $query);
                                    $usrs_count = mysqli_num_rows($select_post_count_query);

                                    echo "<div class='huge'>{$usrs_count}</div>";

                                    ?>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users">
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
                                    $select_post_count_query = mysqli_query($connection, $query);
                                    $categories_count = mysqli_num_rows($select_post_count_query);
                                    echo "<div class='huge'>{$categories_count}</div>";

                                    ?>
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

            $query = "SELECT * FROM posts WHERE post_status= 'published'";
            $select_all_published_post = mysqli_query($connection, $query);
            $post_published_count = mysqli_num_rows($select_all_published_post);

            $query = "SELECT * FROM posts WHERE post_status= 'draft'";
            $select_all_draft_post = mysqli_query($connection, $query);
            $post_draf_count = mysqli_num_rows($select_all_draft_post);

            $query = "SELECT * FROM comments WHERE comment_status= 'approved'";
            $select_all_approved_comment = mysqli_query($connection, $query);
            $comment_approved_count = mysqli_num_rows($select_all_approved_comment);

            $query = "SELECT * FROM comments WHERE comment_status= 'unapproved'";
            $select_all_unapproved_comment = mysqli_query($connection, $query);
            $comment_unapproved_count = mysqli_num_rows($select_all_unapproved_comment);

            $query = "SELECT * FROM users WHERE user_role= 'admin'";
            $select_all_admin_users = mysqli_query($connection, $query);
            $user_admin_count = mysqli_num_rows($select_all_admin_users);

            $query = "SELECT * FROM users WHERE user_role= 'subscriber'";
            $select_all_subscriber_users = mysqli_query($connection, $query);
            $user_subscriber_count = mysqli_num_rows($select_all_subscriber_users);

            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                            $element_text = ['All Post','Active Post', 'Draft Post', 'Comments', 'Approved','Pending comment', 'Users','Admin ', 'Subscriber', 'Categories'];
                            $element_count = [$post_count, $post_published_count, $post_draf_count, $comment_count, $comment_approved_count, $comment_unapproved_count, $usrs_count, $user_admin_count , $user_subscriber_count, $categories_count ];

                            for ($i = 0; $i <10 ; $i++) {

                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
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
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


    <?php include "includes/footer.php"; ?>


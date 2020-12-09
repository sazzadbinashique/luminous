<?php include ('Config/config.php'); ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php  include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {

                $the_post_id = $_GET['p_id'];

                $view_query = "UPDATE posts SET post_view_count = post_view_count +1 WHERE post_id = $the_post_id ";
                $send_query = mysqli_query($connection, $view_query);

//                print_r($send_query);die();

                if (!$send_query) {
                    die("query fialed" . mysqli_error($connection));
                }

                $query = "SELECT * FROM  posts WHERE post_id= $the_post_id ";
                $select_individual_post_query = mysqli_query($connection, $query);
                // print_r($select_individual_post_query) ;



                while ($row = mysqli_fetch_assoc($select_individual_post_query)) {

                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];



                    ?>


                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="lead">
                                by <a href="author_post?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author?></a>
                            </p>
                        </div>
                        <div class="col-lg-4" style="margin-top: 6px;">
                            <p class="flot-right"><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>

                        </div>
                    </div>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                    <hr>
                    <p><?php echo $post_content?></p>
                    <!--  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                    <hr>

                <?php  }

            }else{

                header ("Location: index.php");
            }

            ?>

            <!-- Blog Comments -->
            <?php

            if (isset($_POST['create_comment'])) {

                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];


                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

                    $query.= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now())";


                    $create_comment_query = mysqli_query($connection, $query);

                    if (!$create_comment_query) {
                        die( "Query Faild" .mysqli_error($connection));
                    }



                    // $query = "UPDATE posts SET post_comment_count = post_comment_count +1 "; 
                    // $query.= "WHERE post_id = $the_post_id ";
                    // $update_comment_count_query = mysqli_query($connection, $query);       


                }else{

                    echo "<script> alert('This field cannot be empty')</scirpt>";
                }

            }

            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="comment_author" >Author</label>
                        <input type="text" name="comment_author" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="email" name="comment_email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="comment_content">Your Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
            $query.= "AND comment_status = 'approved' ";
            $query.= "ORDER BY comment_id DESC ";


            $select_comment_query = mysqli_query($connection, $query);
            if (!$select_comment_query) {
                die( "Query Failed" .mysqli_error($connection));
            }
            // confirm($select_comment_query);

            while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];

                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

            <?php  } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->
    <hr>
<?php include "includes/footer.php"; ?>
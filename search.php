<?php include "Config/config.php"; ?>
<?php include "includes/header.php"; ?>


    <!-- Navigation -->

<?php  include "includes/db.php"; ?>
<?php  include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">

            <?php

            if (isset($_POST['submit'])) {

                $search= $_POST['search'] ;

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'";
                $search_query = mysqli_query($connection, $query);


                if (!$search_query) {

                    die( " Query failed" .mysqli_error($connection));

                }

                $count = mysqli_num_rows($search_query);

                if ($count == 0) {
                    echo "<h1>No Result</h1>";
                }else{

                    while ($row = mysqli_fetch_assoc($search_query)) {

                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        ?>
                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title?></a>
                        </h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="lead">
                                    by <a href="author_post?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author?></a>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <p class="flot-right"><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                            </div>
                        </div>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?> " alt="">
                        <hr>
                        <p><?php echo $post_content?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>

                    <?php }

                }

            }

            ?>







        </div>




        <!-- Blog Sidebar Widgets Column -->


        <?php include "includes/sidebar.php"; ?>


    </div>
    <!-- /.row -->

    <hr>

<?php include "includes/footer.php"; ?>
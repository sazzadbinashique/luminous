
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h3 class="text-center">Blog Search</h3>
        <form action="search" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
        </form> <!-- form -->
        <!-- /.input-group -->
    </div>

    <?php
    if (!isset($_SESSION['user_role'])){
    ?>
    <!-- Login -->
    <!--<div class="well">
        <h3 class="text-center">Login</h3>
        <form action="login" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Please Enter Your username.">
            </div>

            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Please Enter Your password">
                <span class="input-group-btn">
                <button name="login" class="btn btn-primary" type="submit">Submit
            </button>
            </span>
            </div>

        </form>
    </div-->
        <?php
        }
        ?>

            <!--        blog popular post -->
    <div class="well">
        <?php
        $query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_view_count DESC LIMIT 4;";
        $select_category_sidebar = mysqli_query($connection, $query);
        ?>
        <h4 class="text-center">Popular Posts</h4>
        <div class="row">
            <div class="col-lg-12 recent-post">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($select_category_sidebar)) {
                        $post_id = $row['post_id'];
                        $post_title = strtoupper($row['post_title']);

                        echo "<li><a href='post?p_id= $post_id'><span class='glyphicon glyphicon-chevron-right'></span> {$post_title}</a></li>";

                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <?php
        $query = "SELECT * FROM  categories";
        $select_category_sidebar = mysqli_query($connection, $query);
        ?>
        <h4 class="">Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12 category-post">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($select_category_sidebar)) {

                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        $cat_title = strtoupper($cat_title);

                        echo "<li><a href='category?category= $cat_id'><span class='glyphicon glyphicon-th'></span> {$cat_title}</a></li>";

                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="well">
        <?php
        $query = "SELECT * FROM  posts  ORDER BY post_id DESC LIMIT 4";
        $select_category_sidebar = mysqli_query($connection, $query);
        ?>
        <h4 class="text-center">Recent Post</h4>
        <div class="row">
            <div class="col-lg-12 recent-post">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($select_category_sidebar)) {
                        $post_id = $row['post_id'];
                        $post_title = strtoupper($row['post_title']);

                        echo "<li><a href='post?p_id= $post_id'><span class='glyphicon glyphicon-chevron-right'></span> {$post_title}</a></li>";

                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

</div>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= BASE_URL;?>"><?php echo strtoupper('Luminous'); ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


                <?php
                $query = "SELECT * FROM  categories";
                $select_all_category_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_category_query)) {

                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    $cat_title = strtoupper($cat_title);

                    echo "<li><a href='category?category= $cat_id'>{$cat_title}</a></li>";
                }

                ?>

                <li>
                    <a href="contact"><?php echo strtoupper('Contact'); ?></a>
                </li>

                <?php
                if (!isset($_SESSION['user_role'])){
                    ?>
                    <li>
                        <a href="registration"><?php echo strtoupper('Registration'); ?></a>
                    </li>
                    <?php
                }else{
                    ?>
                    <li>
                        <a href="admin"><?php echo strtoupper('admin'); ?></a>
                    </li>
                <?php
                }
                ?>

                <?php
                if (!isset($_SESSION['user_role'])) {
                    if (isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                        echo "<li><a href='admin/post?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                    }
                }
                ?>




            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
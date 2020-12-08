    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= ADMIN_URL;?>">SBA Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

<!--            <li><a href=""> Users Online: --><?php //echo user_online(); ?><!--</a></li>-->
            <li><a href=""> Users Online: <span class="usersonline btn-success" style="border-radius: 50%; padding: 1px 4px 1px 4px;"></span></a></li>
            <li><a href="<?= BASE_URL; ?>" target="_blank"><?php echo strtoupper('view blog'); ?></a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                <?php 
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                }
                ?>
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="<?= ADMIN_URL;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
               
                
               <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts-dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts-dropdown" class="collapse">
                        <li>
                            <a href="post">View all Post</a>
                        </li>
                        <li>
                            <a href="post?source=add_post">Add Post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="categories"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                </li>
                <li>
                    <a href="comment"><i class="fa fa-fw fa-file"></i> Comments</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="users">View All User</a>
                        </li>
                        <li>
                            <a href="users?source=add_user">Add User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="profile"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    
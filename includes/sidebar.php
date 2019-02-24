            
            <div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h3 class="text-center">Blog Search</h3>
                    <form action="search.php" method="post">    
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


                <!-- Login -->
                <div class="well">
                    <h3 class="text-center">Login</h3>
                    <form action="includes/login.php" method="post">    
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

                    </form> <!-- form -->
                    <!-- /.input-group -->
                </div









                <!-- Blog Categories Well -->
                <div class="well">

                <?php 
                    $query = "SELECT * FROM  category";
                $select_category_sidebar = mysqli_query($connection, $query);

               
                 ?>    



                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php 

                                while ($row = mysqli_fetch_assoc($select_category_sidebar)) {

                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                $cat_title = strtoupper($cat_title);

                                echo "<li><a href='category.php?category= $cat_id'>{$cat_title}</a></li>";

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

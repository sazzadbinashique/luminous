
<?php include "includes/header.php"; ?>


    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                           Welcome to Admin
                            <small>Author</small>
                        </h1>

                         <div class="col-xs-6">

                            <?php 

                            if (isset($_POST['submit'])) {
                                
                              $cat_title = $_POST['cat_title'];
                             

                             if ($cat_title == "" || empty($cat_title)) {
                                
                                    echo "This field should not be Empty";

                                }else{

                                    $query = "INSERT INTO category(cat_title) ";
                                    $query.= "VALUES('$cat_title') ";


                                    $create_categories = mysqli_query($connection, $query);

                                    if (!$create_categories) {
                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                }   

                            }

                             ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for= "cat-title">Add Category</label>
                                        <input type="text" name="cat_title" class="form-control">
                                    </div>    
                                    <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                    </div>
                                </form>



                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for= "cat-title">Edit Category</label>

                                        <?php 
                                        if (isset($_GET['edit'])) {
                                            $cat_id = $_GET['edit'];

                                            $query = "SELECT * FROM  category WHERE cat_id = {$cat_id}";
                                            $select_categories = mysqli_query($connection, $query);

                                            while ($row = mysqli_fetch_assoc($select_categories)) {

                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];}

                                            ?>
<input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" name="cat_title" class="form-control">


                                    <?php } ?>






                                        
                                    </div>    
                                    <div class="form-group">
                                    <input type="submit" name="submit" value="Update Category" class="btn btn-primary">
                                    </div>
                                </form>








                            </div> <!--- Add category -->

                            <div class="col-xs-6">

                                <table class="table table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Id </th>
                                            <th>Category Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php // All category qurey 
                                        $query = "SELECT * FROM  category";
                                        $select_categories = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_categories)) {

                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        // $cat_title = strtoupper($cat_title);

                                        echo "<tr>";    
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
                                        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>";
                                        echo "</tr>";    
                                        }

                                     ?>

                                     <?php 
                                
                                     if (isset($_GET['delete'])) {
                                         
                                         $the_cat_id = $_GET['delete'];
                                         $query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";

                                            // if(mysqli_query($connection, $query)){ 
                                            // echo "Record was deleted successfully."; 
                                            // }  
                                            // else{ 
                                            // echo "ERROR: Could not able to execute $sql. "  
                                            // . mysqli_error($connection); 
                                            // }                                          

                                        $delete_query = mysqli_query($connection, $query);

                                         if (!$delete_query) {
                                                die('QUERY FAILED' . mysqli_error($connection));
                                            }

                                         header("Location: categories.php");
                                     }

                                      ?>

                                    </tbody>
                                </table>

                            </div>  







                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->




 <?php include "includes/footer.php"; ?>
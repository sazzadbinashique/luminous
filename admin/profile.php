
<?php include "includes/header.php"; ?>

<?php
if (isset($_SESSION['username'])) {


    $username = $_SESSION['username'];


    $query  = " SELECT * FROM users WHERE username = '{$username}'";
    $select_profile_query = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_array($select_profile_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

    }


}

?>

<?php
if (isset($_POST['edit_user'])) {


    // $user_id= $_POST['user_id'];
    $user_firstname= $_POST['user_firstname'];
    $user_lastname= $_POST['user_lastname'];
    $user_role= $_POST['user_role'];


    // $post_image= $_FILES['post_image']['name'];
    // $post_image_temp= $_FILES['post_image']['tmp_name'];



    $username= $_POST['username'];
    $user_email= $_POST['user_email'];
    $user_password= $_POST['user_password'];



    // move_uploaded_file($post_image_temp, "../images/$post_image");


    // if (empty($post_image)) {
    //  $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    //  $slect_query_image = mysqli_query($connection, $query);

    //  while ($row = mysqli_fetch_array($slect_query_image)) {
    //    $post_image = $row['post_image'];
    //  }
    // }



    $query = "UPDATE users SET ";
    $query.="user_firstname = '{$user_firstname}',";
    $query.="user_lastname = '{$user_lastname}',";
    $query.="user_role = '{$user_role}',";
    $query.="username = '{$username}',";
    $query.="user_email = '{$user_email}',";
    $query.="user_password = '{$user_password}'";
    $query.="WHERE username = '{$username}'";


    $edit_query = mysqli_query($connection, $query);

    confirm($edit_query);


}


?>


<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h1 class="">Welcome to Profie of
                                <small><?= strtoupper($_SESSION['username']);?></small>
                            </h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-8 col-xs-offset-2">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <label for=""  class="col-xs-2  control-label">FirstName</label>
                                        <div class="col-xs-10">
                                            <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-xs-2  control-label">LastName</label>
                                        <div class="col-xs-10">
                                            <input type="text" value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="" class="col-xs-2  control-label">Post Category </label>
                                        <div class="col-xs-10">
                                            <select name="user_role" id="" class="form-control">
                                                <option value="subscriber"><?php echo $user_role; ?></option>
                                                <?php
                                                if ($user_role == 'admin') {

                                                    echo "<option value='subscriber'>subscriber</option>";

                                                }else{

                                                    echo "<option value='admin'>admin</option>";

                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-xs-2  control-label">Username</label>
                                        <div class="col-xs-10">
                                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-xs-2  control-label">Email</label>
                                        <div class="col-xs-10">
                                            <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                      <label for="">Post Image</label>
                                      <input type="file" class="form-control" name="post_image">
                                    </div>
                                     -->

                                    <div class="form-group">
                                        <label for="" class="col-xs-2  control-label">password</label>
                                        <div class="col-xs-10">
                                            <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-offset-8 col-xs-2">
                                            <input type="submit" class="btn btn-lg btn-primary"  name="edit_user" value="Update Profile">
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->




<?php include "includes/footer.php"; ?>
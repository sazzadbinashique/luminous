<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

    <!-- Navigation -->
 <?php  include "includes/navigation.php"; ?>




 <?php 
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $password = $_POST['user_password'];

        if (!empty($username) && !empty($user_email) && !empty($password)) {
            
        $username = mysqli_real_escape_string($connection, $username);
        $user_email = mysqli_real_escape_string($connection, $user_email);
        $password = mysqli_real_escape_string($connection, $password);


        $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=> 12));

        // $query = "SELECT randsalt FROM users"; 
        // $select_randsalt_query = mysqli_query($connection, $query); 
        // if (!$select_randsalt_query) {
        //     die("query Failed" .mysqli_error($connection));
        // }


        // $row = mysqli_fetch_array($select_randsalt_query);
        // $randsalt = $row['randsalt'];
        // $password = crypt($password, $randsalt);

        $query = "INSERT INTO users (Username,user_email, user_password, user_role) ";
        $query.= "VALUES ('{$username}', '{$user_email}', '{$password}','subscriber') ";
        $register_user_query = mysqli_query($connection, $query); 

        if (!$register_user_query) {
            die("Query Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }


            $message = "<h5 class='text-center alert alert-success' >Your Registration has been Submitted</h5>";

        }else{

            $message = "<h5 class='text-center alert alert-success'>Your Registration Failed, fill can not be empty !</h5>";
        }
    }else{

        $message = "";
    }


  ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <div class="well">
                <h1 class="text-center">Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <?php echo $message; ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="user_email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="user_password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div> 

                        
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                    </div>
                  </div>  
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

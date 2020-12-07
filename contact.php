
<?php  include "Config/config.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

    <!-- Navigation -->
 <?php  include "includes/navigation.php"; ?>

<?php
// $to = "sajjad.sumon36@gmail.com";
// $subject = "My subject";
// $txt = "Hello world!";
// $headers = "From: webmaster@example.com" . "\r\n" .
// "CC: somebodyelse@example.com";

// if (mail($to,$subject,$txt,$headers)){
//     echo "Mail sented";
// }else{
//     echo "Mail is not sent";
// }


?>



 <?php 
    if (isset($_POST['submit'])) {

        $to      ="sazzad.sumon35@gmail.com";
        $subject = wordwrap($_POST['subject'], 70);
        $body    = $_POST['body'];
        $header  = "From: " . $_POST['email'];


       if (mail($to, $subject, $body, $header)) {

            echo "<h3 class ='text-center'>Mail is sent succesfully</h3> ";
        } else{
            echo "<h3 class ='text-center'>Mail is not sent succesfully</h3>";
        }

    }


  ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="contact" style="margin-top: 40px;">
    
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <div class="well">
                <h1 class="text-center">Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">

                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required>
                        </div>

                          <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject" required>
                        </div>


                         <div class="form-group">
                            <label for="user_password">Message</label>
                            <textarea class="form-control" name="body" id="body" cols="50" rows="10"required></textarea>
                        </div> 

                        
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Submit">
                    </form>
                 
                    </div>
                  </div>  
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
</section>

        <hr>

<?php include "includes/footer.php";?>

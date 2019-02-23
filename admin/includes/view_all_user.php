
                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

<?php 



    $query = "SELECT * FROM  users";
    $select_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {

    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];



   echo "<tr>";
   echo "<td>$user_id</td>";
   echo "<td>$username</td>";
   echo "<td>$user_firstname</td>";
   echo "<td>$user_lastname</td>";
   echo "<td>$user_email</td>";
   echo "<td>$user_role</td>";

   // $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} "; 
   // $select_guery = mysqli_query($connection, $query);

   // while ($row = mysqli_fetch_assoc($select_guery)) {
   // 	 $post_id = $row['post_id'];
   // 	 $post_title =$row['post_title'];



   // }
   // echo "<td> <a href='../post.php?p_id=$post_id'> $post_title</a></td>";









   echo "<td><a href='comment.php?approve='>Approve</a></td>";
   echo "<td><a href='comment.php?unapprove='>Unapprove</a></td>";
   echo "<td><a href='comment.php?delete='>Delete</a></td>";
   echo "</tr>";
}


 ?>

                                </tr>
                            </tbody>

                        </table>



<?php  



if (isset($_GET['approve'])) {
  
  $the_comment_id = $_GET['approve'];


  $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id} ";
  $approve_comment_query = mysqli_query($connection, $query);

  confirm($approve_comment_query);

  header("Location: comment.php");
}






if (isset($_GET['unapprove'])) {
  
  $the_comment_id = $_GET['unapprove'];


  $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id} ";
  $unapprove_comment_query= mysqli_query($connection, $query);

  confirm($unapprove_comment_query);

  header("Location: comment.php");
}










if (isset($_GET['delete'])) {
  
  $the_comment_id = $_GET['delete'];


  $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
  $comment_delete_query = mysqli_query($connection, $query);

  confirm($comment_delete_query);

  header("Location: comment.php");
}




 ?>


                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>In Response to</th>
                                    <th>Approved</th>
                                    <th>Unapproved</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

<?php 



    $query = "SELECT * FROM  comments";
    $select_comment = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comment)) {

    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];



   echo "<tr>";
   echo "<td>$comment_id</td>";
   echo "<td>$comment_author</td>";
   echo "<td>$comment_content</td>";

  //   $query = "SELECT * FROM  category WHERE cat_id = {$post_category_id}";
  //   $select_categories_id = mysqli_query($connection, $query);

  //   while ($row = mysqli_fetch_assoc($select_categories_id)) {

  //   $cat_id = $row['cat_id'];
  //   $cat_title = $row['cat_title'];


  //  echo "<td>$cat_title</td>";
  // }



   echo "<td>$comment_email</td>";
   echo "<td>$comment_status</td>";
   echo "<td>$comment_date</td>";

   $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} "; 
   $select_guery = mysqli_query($connection, $query);

   while ($row = mysqli_fetch_assoc($select_guery)) {
   	 $post_id = $row['post_id'];
   	 $post_title =$row['post_title'];



   }
   echo "<td> <a href='../post.php?p_id=$post_id'> $post_title</a></td>";









   echo "<td><a href='post.php?source=edit_post&p_id='>Approved</a></td>";
   echo "<td><a href='post.php?delete='>Unapproved</a></td>";
   echo "<td><a href='post.php?source=edit_post&p_id='>Edit</a></td>";
   echo "<td><a href='post.php?delete='>Delete</a></td>";
   echo "</tr>";
}


 ?>

                                </tr>
                            </tbody>

                        </table>



<?php   

if (isset($_GET['delete'])) {
  
  $the_post_id = $_GET['delete'];


  $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
  $post_delete_query = mysqli_query($connection, $query);

  confirm($post_delete_query);

  header("Location: post.php");
}




 ?>

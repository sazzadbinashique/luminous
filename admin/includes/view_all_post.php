                       <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

<?php 



    $query = "SELECT * FROM  posts";
    $select_post = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post)) {

    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_date = $row['post_date'];



   echo "<tr>";
   echo "<td>$post_id</td>";
   echo "<td>$post_author</td>";
   echo "<td>$post_title</td>";
   echo "<td>$post_comment_count</td>";
   echo "<td>$post_content</td>";
   echo "<td><img src='../images/{$post_image}' alt='Image' class ='img-responsive'></td>";
   echo "<td>$post_tags</td>";
   echo "<td>$post_comment_count</td>";
   echo "<td>$post_status</td>";
   echo "<td>$post_date</td>";
   echo "</tr>";
}


 ?>


                                    <td>10</td>
                                    <td>Sazzad Bin Ashique</td>
                                    <td>Bootstrap FrameWork</td>
                                    <td>Bootstrap</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Tags</td>
                                    <td>Comment</td>
                                    <td>Date</td>
                                </tr>
                            </tbody>

                        </table>

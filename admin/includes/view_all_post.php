
<?php
if (isset($_POST['checkBoxArray'])) {


    foreach ($_POST['checkBoxArray'] as $postValuID) {

        $bulk_option = $_POST['bulk_option'];


        switch ($bulk_option) {
            case 'published':
                $query ="UPDATE posts SET post_status ='{$bulk_option}' WHERE post_id ={$postValuID} ";
                $update_published_query = mysqli_query($connection, $query);
                confirm($update_published_query);

                break;

            case 'draft':
                $query ="UPDATE posts SET post_status ='{$bulk_option}' WHERE post_id ={$postValuID} ";
                $update_draft_query = mysqli_query($connection, $query);
                // print_r($update_draft_query);
                confirm($update_draft_query);

                break;

            case 'delete':
                $query ="DELETE FROM posts WHERE post_id ={$postValuID} ";
                $update_delete_query = mysqli_query($connection, $query);
                confirm($update_delete_query);

                break;

            case 'clone':
                $query ="SELECT * FROM posts WHERE post_id = {$postValuID} ";
                $clone_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($clone_post_query)) {

                    $post_title=$row['post_title'];
                    $post_category_id=$row['post_category_id'];
                    $post_author= $row['post_author'];
                    $post_image=$row['post_image'];
                    $post_tags= $row['post_tags'];
                    $post_content= $row['post_content'];
                    $post_date= date('post_date');
                    $post_status= $row['post_status'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query.= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";
                $copy_post_query = mysqli_query($connection, $query);

                if (!$copy_post_query) {
                    die("Query failed" .mysqli_error($connection));
                }

                break;

        }
    }
}
?>


<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h4 class="">Manage Posts</h4>
    </div>
    <div class="panel-body">
        <form action="" method="post">
            <table class="table table-bordered table-hover">
                <div class="col-xs-3" id="bulkOptionContainer">
                    <select name="bulk_option" id="" class="form-control">
                        <option value="">Select Option</option>
                        <option value="published">Publish</option>
                        <option value="draft">Draft</option>
                        <option  value="delete">Delete</option>
                        <option  value="clone">Clone</option>
                    </select>
                </div>
                <div class="col-xs-1">
                    <input type="submit" name="submit" value="Apply " class="btn btn-success">
                </div>

                <div class="col-xs-4">
                    <a href="post?source=add_post" class="btn btn-primary">Add New</a>
                </div>


                <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllBoxes"></th>
                    <th>ID</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>View Post</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Views</th>
                </tr>
                </thead>

                <tbody>
                <tr>

                    <?php

                    $query = "SELECT * FROM  posts ORDER BY post_id DESC";
                    $select_post = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_post)) {


                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 25);
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];
                        $post_date = $row['post_date'];
                        $post_view_count = $row['post_view_count'];


                        echo "<tr>";
                        ?>

                        <td><input type='checkbox' name='checkBoxArray[]' class='checkBoxes' value='<?php echo $post_id; ?>'></td>


                        <?php


                        echo "<td>$post_id</td>";
                        if (!empty($post_user)) {

                            echo "<td>$post_user</td>";

                        }elseif (!empty($post_author)) {

                            echo "<td>$post_author</td>";
                        }


                        echo "<td>$post_title</td>";

                        $query = "SELECT * FROM  categories WHERE cat_id = {$post_category_id}";
                        $select_categories_id = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_categories_id)) {

                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];


                        }
                        echo (!empty($cat_title)) ? "<td>$cat_title</td>" : "<td>Null</td>";
                        echo "<td>$post_content</td>";
                        echo "<td><img src='../images/{$post_image}' alt='Image' width =100 ></td>";
                        echo "<td>$post_tags</td>";


                        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                        $comment_count_query= mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($comment_count_query)){
                            $comment_id = $row ['comment_id'];
                            $post_comment_count = mysqli_num_rows($comment_count_query);
                        };
                        echo "<td><a href ='post_comment?id={$post_id}'>$post_comment_count</a></td>";



                        echo "<td>$post_status</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><a href='../post?p_id={$post_id}'>View Post</a></td>";
                        echo "<td><a href='post?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "<td><a onclick=\"javascript: return confirm('Are you sure you want to delete'); \" href='post?delete={$post_id}'>Delete</a></td>";
                        echo "<td><a href ='#'>{$post_view_count}</a></td>";
                        /*echo "<td><a href ='post?reset={$post_id}'>{ $post_view_count}</a></td>";*/
                        echo "</tr>";
                    }


                    ?>

                </tr>
                </tbody>

            </table>

        </form>
    </div>
</div>



<?php

if (isset($_GET['delete'])) {


    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {


            $the_post_id =mysqli_real_escape_string($connection, $_GET['delete']);

            $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
            $post_delete_query = mysqli_query($connection, $query);
            confirm($post_delete_query);

            header("Location: post");
        }

    }

}


if (isset($_GET['reset'])) {

    $the_post_id = $_GET['reset'];

    $query = "UPDATE posts SET post_view_count = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $_GET['reset']) . "";
    $post_reset_query = mysqli_query($connection, $query);
    confirm($post_reset_query);

    header("Location: post");
}






?>


<?php


if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}


$query = "SELECT * FROM  posts INNER JOIN categories ON posts.post_category_id=categories.cat_id WHERE post_id= $the_post_id ";
$select_post = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_post)) {

    $post_id = $row['post_id'];
    $post_user = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_date = $row['post_date'];
    $cat_title = $row['cat_title'];

}


if (isset($_POST['update_post'])) {

    $post_category_id= $_POST['post_category'];
    $post_title= mysqli_real_escape_string($connection, $_POST['post_title']);
    $post_user= mysqli_real_escape_string($connection, $_POST['post_author']);

    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];

    $post_tags= mysqli_real_escape_string($connection, $_POST['post_tags']);
    $post_content= mysqli_real_escape_string($connection, strip_tags($_POST['post_content']));
    $post_status= $_POST['post_status'];

    move_uploaded_file($post_image_temp, "../images/$post_image");


    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $slect_query_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($slect_query_image)) {
            $post_image = $row['post_image'];
        }
    }



    $query = "UPDATE posts SET ";
    $query.="post_title = '{$post_title}',";
    $query.="post_category_id = '{$post_category_id}',";
    $query.="post_date = now(),";
    $query.="post_tags = '{$post_tags}',";
    $query.="post_author = '{$post_user}',";
    $query.="post_status = '{$post_status}',";
    $query.="post_content = '{$post_content}',";
    $query.="post_image = '{$post_image}'";
    $query.="WHERE post_id = '{$the_post_id}'";
    $update_query = mysqli_query($connection, $query);

    confirm($update_query);
    echo "<h4 class ='alert alert-success' >Post Updated Succesfully <a href ='../post?p_id={$the_post_id}' > View post </a> OR <a href='post'>View More post</a></h4>";

}

?>

<div class="panel panel-default">
    <div class="panel-heading text-center"><h4 class="">Update post</h4></div>
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Post Title</label>
                        <div class="col-xs-10">
                            <input  value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Post Image</label>
                        <div class="col-xs-10">
                            <img width = "100" src="../images/<?php echo $post_image ?>" alt="Image">
                            <input type="file" name="post_image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Post Date</label>
                        <div class="col-xs-10">
                            <input value="<?php echo $post_date; ?>" type="date" class="form-control" name="post_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Post Tags</label>
                        <div class="col-xs-10">
                            <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Post Content</label>
                        <div class="col-xs-10">
                            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="" class="col-xs-3 control-label">Category </label>
                        <div class="col-xs-9">
                            <select name="post_category" id="" class="form-control">
                                <?php
                                echo "<option value='$post_category_id'>{$cat_title}</option>";
                                ?>
                                <?php
                                $query = "SELECT * FROM  categories ";
                                $select_categories = mysqli_query($connection, $query);

                                confirm($select_categories);

                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="post_user" class="control-label col-xs-3">Author</label>
                        <div class="col-xs-9">
                            <select name="post_author" id="" class="form-control">
                                <?php
                                echo "<option value='$post_user'>{$post_user}</option>";
                                ?>
                                <?php
                                $query = "SELECT * FROM  users ";
                                $select_users = mysqli_query($connection, $query);

                                confirm($select_users);

                                while ($row = mysqli_fetch_assoc($select_users)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    echo "<option value='$username'>{$username}</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-3">Status</label>
                        <div class="col-xs-9">
                            <select name="post_status" id="" class="form-control">
                                <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
                                <?php
                                if ($post_status == 'published') {
                                    echo "<option value='draft'>Draft</option>";
                                }else{
                                    echo "<option value='published'>Publish</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-offset-10 col-xs-2">
                        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<?php

function pr($var){
    echo "<pre>";
    if (is_array($var)){
        print_r($var);
    }
    var_dump($var);
    echo "</pre>";
}

if (isset($_POST['create_post'])) {

    $post_category_id= $_POST['post_category'];
    $post_title= mysqli_real_escape_string($connection, $_POST['post_title']);
    $post_user= mysqli_real_escape_string($connection, $_POST['post_author']);
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];
    $post_tags= mysqli_real_escape_string($connection, $_POST['post_tags']);
    $post_content= mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_date= date('d-m-y');
    $post_status= $_POST['post_status'];
    $post_view_count= 0;
    $post_comment_count= 0;


    move_uploaded_file($post_image_temp, "../images/$post_image");

    if ($post_title == "" || empty($post_title)) {
        echo "This Title field should not be Empty";
    }elseif ($post_user == "" || empty($post_user)) {
        echo "This  author field should not be Empty";
    }elseif ($post_tags == "" || empty($post_tags)) {
        echo "This  tags field should not be Empty";
    }elseif ($post_content == "" || empty($post_content)) {
        echo "This content field should not be Empty";
    }elseif ($post_status == "" || empty($post_status)) {
        echo "This Status field should not be Empty";
    }else{


        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_view_count,post_comment_count)";
        $query.= "VALUES ({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}','{$post_view_count}','{$post_comment_count}') ";

//        pr($query);die();
        $create_post_query = mysqli_query($connection, $query);


        confirm($create_post_query);

        echo "<h4 class ='alert alert-success float-right' >Add Post Create Succesfully:" . " " . "<a href = 'post' > View Posts</a></h4>";

    }

}


?>


<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h4>Add New Post</h4>
    </div>
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Title</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="post_title">
                        </div>
                    </div>
                    <div class="form-group" >
                        <label for="" class="col-xs-2 control-label">Image</label>
                        <div class="col-xs-10">
                            <input style="padding: 0px;" type="file" class="form-control" name="post_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label"> Date</label>
                        <div class="col-xs-10">
                            <input type="date" class="form-control" name="post_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Tags</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="post_tags">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label">Content</label>
                        <div class="col-xs-10">
                            <textarea  class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12">
                    <div class="form-group">
                        <label for="" class="col-xs-3 control-label">Category</label>
                        <div class="col-xs-9">
                            <select name="post_category" id="" class="form-control" >
                                <?php

                                $query = "SELECT * FROM  categories ";
                                $select_categories = mysqli_query($connection, $query);

                                confirm($select_categories);

                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>{$cat_title}</option>";
                                }

                                ?>

                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="post_author" class="col-xs-3 control-label">Author</label>
                        <div class="col-xs-9">
                            <select name="post_author" id="" class="form-control">
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
                        <label for="" class="col-xs-3 control-label">Status</label>
                        <div class="col-xs-9">
                            <select name="post_status" id="" class="form-control">
                                <option value="draft">Select Option</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-xs-offset-10 col-xs-2">
                        <input type="submit" class="btn btn-primary " name="create_post" value="Publish Post">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>




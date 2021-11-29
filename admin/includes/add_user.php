<?php

if (isset($_POST['create_user'])) {

    // $user_id= $_POST['user_id'];
    $user_firstname= $_POST['user_firstname'];
    $user_lastname= $_POST['user_lastname'];
    $user_role= $_POST['user_role'];


    $username= $_POST['username'];
    $user_email= $_POST['user_email'];
    $user_password= $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 12));


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password)";
    $query.= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);
    confirm($create_user_query);

    echo "<h4 class ='alert alert-success float-right' >User Created Succesfully:" . " " . "<a href = 'users.php' > View Users</a></h4>";


}




?>




<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h4 class="">Add New User</h4>
    </div>
    <div class="panel-body">
        <div class="col-xs-8 col-xs-offset-2">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">FirstName</label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type="text" class="form-control" name="user_firstname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">LastName</label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type="text" class="form-control" name="user_lastname">
                    </div>
                </div>


                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">Post Category </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <select name="user_role" id="" class="form-control" >
                            <!--  --><?php
                            /*
                                        $query = "SELECT * FROM  users ";
                                        $select_users = mysqli_query($connection, $query);
                                        confirm($select_users);
                                        while ($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $user_role = $row['user_role'];

                                            echo "<option value='$user_id'>{$user_role}</option>";
                                        }
                                        */?>
                            <option value="subscriber">Select Option</option>
                            <option value="admin">Admin</option>
                            <option value="subscriber">Subscriber</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">Username</label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">Email</label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type="email" class="form-control" name="user_email">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="">Post Image</label>
                    <input type="file" class="form-control" name="post_image">
                </div>
                 -->

                <div class="form-group">
                    <label for="" class="col-xs-2 control-label">password</label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type="password" class="form-control" name="user_password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-10 col-xs-3">
                        <input type="submit" class="btn btn-lg btn-primary " type="submit" name="create_user" value="Add user">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


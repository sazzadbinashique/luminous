<?php include "includes/header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

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


                            $query = "SELECT * FROM  comments WHERE comment_post_id = " . mysqli_real_escape_string($connection, $_GET['id']) . "";
                            $select_comment = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_comment)) {


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


                                echo "<td>$comment_email</td>";
                                echo "<td>$comment_status</td>";
                                echo "<td>$comment_date</td>";

                                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
                                $select_guery = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_guery)) {
                                    $post_id = $row['post_id'];
                                    $post_title =$row['post_title'];


                                }
                                echo "<td> <a href='../post?p_id=$post_id'> $post_title</a></td>";
                                echo "<td><a href='comment?approve={$comment_id}'>Approve</a></td>";
                                echo "<td><a href='comment?unapprove={$comment_id}'>Unapprove</a></td>";
                                echo "<td><a href='post_comment?delete=$comment_id'>Delete</a></td>";
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

                        header("Location: post_comment.php?id =" . isset($_GET['id']) . " ");
                    }




                    ?>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->




    <?php include "includes/footer.php"; ?>

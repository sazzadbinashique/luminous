
<?php 


	if (isset($_GET['p_id'])) {
		$the_post_id = $_GET['p_id'];
	}


    $query = "SELECT * FROM  posts WHERE post_id= $the_post_id ";
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

}


   	if (isset($_POST['update_post'])) {
   	 

	$post_category_id= $_POST['post_category'];
	$post_title= $_POST['post_title'];
	$post_author= $_POST['post_author'];


	$post_image= $_FILES['post_image']['name'];
	$post_image_temp= $_FILES['post_image']['tmp_name'];

	$post_tags= $_POST['post_tags'];
	$post_content= $_POST['post_content'];
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
	$query.="post_author = '{$post_author}',";
	$query.="post_status = '{$post_status}',";
	$query.="post_content = '{$post_content}',";
	$query.="post_image = '{$post_image}'";
	$query.="WHERE post_id = '{$the_post_id}'";


	$update_query = mysqli_query($connection, $query);

	confirm($update_query);
	echo "<h4 class ='alert alert-success' >Post Created Succesfully <a href ='../post.php?p_id={$the_post_id}' >View post</a>OR<a href='post.php'>View More post</a></h4>";

   	}

 ?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="">Post Title</label>
		<input  value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
	</div>	
	<div class="form-group">
		<!-- <label for="">Post Category </label> -->
		<select name="post_category" id="">

			

			<?php 

			$query = "SELECT * FROM  category ";
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

	<div class="form-group">
		<label for="">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
	</div>	

	<div class="form-group">
	<select name="post_status" id="">
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







	<div class="form-group">
		<!-- <label for="">Post Image</label> -->
		<img width = "100" src="../images/<?php echo $post_image ?>" alt="Image">
		<input type="file" name="post_image" class="form-control">
	</div>
	

	<div class="form-group">
		<label for="">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
	</div>	
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
	</div>	
	<div class="form-group">
		<label for="">Post Date</label>
		<input value="<?php echo $post_date; ?>" type="date" class="form-control" name="post_date">
	</div>	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="update_post" value="Update Post">
	</div>	

</form>
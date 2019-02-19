
<?php 


	if (isset($_GET['p_id'])) {
		$the_post_id = $_GET['p_id'];
	}


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

}



 ?>








<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="">Post Title</label>
		<input  value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
	</div>	
	<div class="form-group">
		<!-- <label for="">Post Category </label> -->
		<select name="" id="">
			<?php 

			$query = "SELECT * FROM  category ";
            $select_categories = mysqli_query($connection, $query);

            confirm($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];




            echo "<option value=''>{$cat_title}</option>";
       		 }

			 ?>

		</select>
	</div>	

	<div class="form-group">
		<label for="">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
	</div>	
	<div class="form-group">
		<label for="">Post Status</label>
		<input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
	</div>	
	<div class="form-group">
		<!-- <label for="">Post Image</label> -->
		<img width = "100" src="../images/<?php echo $post_image ?>" alt="Image">
	</div>
	

	<div class="form-group">
		<label for="">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
	</div>	
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_title; ?></textarea>
	</div>	
	<div class="form-group">
		<label for="">Post Date</label>
		<input value="<?php echo $post_date; ?>" type="date" class="form-control" name="post_date">
	</div>	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>	

</form>
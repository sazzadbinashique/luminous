<?php 

if (isset($_POST['create_post'])) {

	$post_category_id= $_POST['post_category'];
	$post_title= $_POST['post_title'];
	$post_user= $_POST['post_user'];
	$post_image= $_FILES['post_image']['name'];
	$post_image_temp= $_FILES['post_image']['tmp_name'];
	$post_tags= $_POST['post_tags'];
	$post_content= $_POST['post_content'];
	$post_date= date('d-m-y');
	$post_status= $_POST['post_status'];
 

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


	 $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status)";
	 $query.= "VALUES ({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";


	 $create_post_query = mysqli_query($connection, $query);


		confirm($create_post_query);
		    
        echo "<h4 class ='alert alert-success float-right' >Add Post Create Succesfully:" . " " . "<a href = 'post.php' > View Posts</a></h4>";
                         
}

}




 ?>






<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="">Post Title</label>
		<input type="text" class="form-control" name="post_title">
	</div>	

		<div class="form-group">
		<label for="">Category </label>
		<select name="post_category" id="" >
			<?php 

			$query = "SELECT * FROM  category ";
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


	<div class="form-group">
		<label for="post_author">Author</label>
			<select name="post_user" id="">
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


	<div class="form-group">
		<select name="post_status" id="">
			<option value="draft">Select Option</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>

	
	<div class="form-group" >
		<label for="">Post Image</label>
		<input style="padding: 0px;" type="file" class="form-control" name="post_image">
	</div>
	

	<div class="form-group">
		<label for="">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>	
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea  class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>	
	<div class="form-group">
		<label for="">Post Date</label>
		<input type="date" class="form-control" name="post_date">
	</div>	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>	

</form>
<?php 

if (isset($_POST['create_user'])) {

	$user_id= $_POST['user_id'];
	$user_firstname= $_POST['user_firstname'];
	$user_lastname= $_POST['user_lastname'];
	$user_role= $_POST['user_role'];

	// $post_image= $_FILES['post_image']['name'];
	// $post_image_temp= $_FILES['post_image']['tmp_name'];

	$username= $_POST['username'];
	$user_email= $_POST['user_email'];
	$user_password= $_POST['user_password'];
	// $post_date= date('d-m-y');

	// move_uploaded_file($post_image_temp, "../images/$post_image");
	
	 $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password)";
	 $query.= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}') ";

	 $create_user_query = mysqli_query($connection, $query);
	 confirm($create_user_query);

	echo "<h4 class ='alert alert-success float-right' >User Created Succesfully:" . " " . "<a href = 'users.php' > View Users</a></h4>";


}




 ?>






<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="">FirstName</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>	

	<div class="form-group">
		<label for="">LastName</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>
	

	<div class="form-group">
		<!-- <label for="">Post Category </label> -->
		<select name="user_role" id="" >
			<?php 

			// $query = "SELECT * FROM  users ";
   //          $select_users = mysqli_query($connection, $query);

   //          confirm($select_users);

   //          while ($row = mysqli_fetch_assoc($select_users)) {
   //          $user_id = $row['user_id'];
   //          $user_role = $row['user_role'];

   //          echo "<option value='$user_id'>{$user_role}</option>";
   //     		 }

			 ?>

			 <option value="subscriber">Select Option</option>
			 <option value="admin">Admin</option>
			 <option value="subscriber">Subscriber</option>

		</select>
	</div>
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" name="username">
	</div>	

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>	

	<!-- <div class="form-group">
		<label for="">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div>
	 -->

	<div class="form-group">
		<label for="">password</label>
		<input type="password" class="form-control" name="user_password">
	</div>	
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Add user">
	</div>	

</form>
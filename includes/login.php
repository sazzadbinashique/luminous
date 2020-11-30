<?php  include "db.php"; ?>
<?php session_start(); ?>

<?php 
	
	if (isset($_POST['login'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);


		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);
		// print_r($select_user_query);

		if (!$select_user_query) {
			die("Query Failed". mysqli_error($connection));

	 	} 

		while ($row = mysqli_fetch_array($select_user_query)) {
			
		 	 $user_id = $row['user_id'];
		 	 $user_username = $row['username'];
		 	 $user_password = $row['user_password'];
		 	 $user_firstname = $row['user_firstname'];
		 	 $user_lastname = $row['user_lastname'];
		 	 $user_role = $row['user_role'];
		}

		//$password = crypt($password, $user_password);




		// if ($username !== $user_username && $password !== $user_password) {
		// 	header("Location: ../index.php");

		// }elseif ($username == $user_username && $password ==$user_password )

		
		if(password_verify($password, $user_password)) {
			
			$_SESSION['username'] = $user_username;	
			$_SESSION['user_firstname'] = $user_firstname;	
			$_SESSION['user_lastname'] = $user_lastname;	
			$_SESSION['user_role'] = $user_role;	

			header("Location: ../admin");
		}else{

			header( "Location: ../");
		}

}

 ?>

	
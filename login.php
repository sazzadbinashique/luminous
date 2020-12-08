<?php //session_start(); ?>
<?php include ('Config/config.php'); ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<?php
if (isset($_SESSION['user_role'])) {
    header("Location: admin");
}
?>

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

		header("Location: admin");
	}else{

		header( "Location: login");
	}

}

?>

<div class="container">
	<section id="login" style="margin-top: 40px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							Login Form
						</div>
						<div class="panel-body">
							<form action="login" method="post" class="form-horizontal">
								<div class="form-group">
									<label for="username" class="col-xs-3 control-label">User Name</label>
									<div class="col-xs-9">
										<input name="username" type="text" class="form-control" placeholder="Please Enter Your username.">
									</div>
								</div>

								<div class="form-group">
									<label for="username" class="col-xs-3 control-label">Password</label>
									<div class="col-xs-9">
										<input name="password" type="password" class="form-control" placeholder="Please Enter Your password">
									</div>

								</div>

								<div class="form-group">
									<div class="col-xs-offset-9 col-xs-3">
										<button name="login" class="btn btn-primary" type="submit">Submit</button>
									</div>
								</div>

							</form> <!-- form -->
						</div>
					</div>
				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>

	<?php include "includes/footer.php";?>


	
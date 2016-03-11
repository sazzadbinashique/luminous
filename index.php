<!DOCTYPE html>
<html>
<head>
	<title>Luminous Community</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
		include 'connect.php';
	?>

	<div id="box">
		<form method="post" enctype="multipart/form-data">		
		<?php
			if (isset($_FILES['video'])) {
				# video upload part

				$name = $_FILES['video']['name'];
				$type = explode('.', $name);
				$type = end($type);
				$size = $_FILES['video']['size'];
				$random_name = rand();
				$tmp = $_FILES['video']['tmp_name'];

				if ($type != 'mp4' && $type != 'MP4' && $type != 'flv' ) {
					# condition video upload
					$message = "Oops This Video Format Not Supported !";
				    }
					else{
						move_uploaded_file($tmp,'videos/'.$random_name.'.'.$type);
						mysql_query("INSERT INTO videos VALUES('', '$name', 'videos/$random_name .$type')");
						$message = "Video Uploaded Successfully";
					}

					echo"$message <br/><br/>";
			}	
		?>
		 	Select Video : <br/>
		 	<input type="file" name="video"/>
		 	<br/><br/>
		 	<input type="submit" name="Upload"/>
		 </form>	
	</div>

	<div id="box"> 
		<?php
			$query = mysql_query("SELECT 'id', 'name', 'url' FROM videos");
			while ($run = mysql_fetch_array($query)) {
				# vidos list
				$video_id = $run['id'];
				$video_name = $run['name'];
				$video_url = $run['url'];
			
		?>
			<a href="view.php?video=<?php echo $video_url; ?>">
			<div id="url">
				<?php echo $video_name; ?>
			</div>
			</a>

		<?php	
			}
		?>	
		
	</div>

</body>
</html>